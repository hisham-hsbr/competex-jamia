<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'last_name', 'dob', 'phone1', 'phone2', 'gender', 'avatar', 'email', 'status', 'cityName.city', 'timeZone.time_zone', 'created_at', 'updated_at'])
            ->setDescriptionForEvent(fn(string $eventName) => "This User has been {$eventName}")
            ->useLogName('User')
            ->logOnlyDirty();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'settings' => 'array'
    ];

    protected $attributes = [
        'settings' => '{"personal_settings":"1","card_header":1,"card_footer":1, "sidebar_collapse":null,"dark_mode":null,"default_status":1,"default_time_zone":1,"permission_view":"list","purchase_edit_days":1,"sale_edit_days":1}'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getCreatedAtAttribute()
    {

        if (Auth::check() && Auth::user()->timeZone) {
            $time_zone = Auth::user()->timeZone->time_zone;
            return Carbon::parse($this->attributes['created_at'])->setTimezone($time_zone);
        }

        // Fallback if the user is not authenticated or timeZone is null
        return $this->attributes['created_at'];
    }

    public function getUpdatedAtAttribute()
    {
        if (Auth::check() && Auth::user()->timeZone) {
            $time_zone = Auth::user()->timeZone->time_zone;
            return Carbon::parse($this->attributes['updated_at'])->setTimezone($time_zone);
        }

        // Fallback if the user is not authenticated or timeZone is null
        return $this->attributes['created_at'];
    }

    public function getStatusTextAttribute()
    {
        if ($this->status == 1) return "Active";
        else return "In Active";
    }


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function timeZone()
    {
        return $this->belongsTo(TimeZone::class, 'time_zone_id', 'id');
    }

    public function cityName()
    {
        return $this->belongsTo(Address::class, 'city_id', 'id');
    }

    public function userSettings()
    {
        return $this->hasMany(UserSettings::class);
    }
    protected $appends = ['status_text'];
}
