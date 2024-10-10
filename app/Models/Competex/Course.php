<?php

namespace App\Models\Competex;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Casts\StatusCast;
use App\Casts\StatusIconCast;
use App\Casts\TimeZoneCast;
use App\Casts\TitleCast;
use App\Casts\UserNameCast;

class Course extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;

    protected $fillable = [
        'name',
        'status'
    ];

    protected $casts = [
        'course_features' => 'array',
        'created_at' => TimeZoneCast::class,
        'updated_at' => TimeZoneCast::class,
        'created_by' => UserNameCast::class,
        'updated_by' => UserNameCast::class,
        'local_name' => TitleCast::class,
        'name' => TitleCast::class,
        'status' => StatusCast::class,
        'status_with_icon' => StatusIconCast::class,
    ];
    protected $appends = ['status_with_icon'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getActivitylogOptions(): LogOptions
    {
        $useLogName = 'Course';
        $run_seeder_disable = env('RUN_SEEDER_DISABLE');

        if ($run_seeder_disable == 'Y') {

            return LogOptions::defaults()
                ->logOnly(['name', 'local_name', 'description', 'status', 'created_at', 'updated_at'])
                ->setDescriptionForEvent(fn(string $eventName) => "$useLogName {$eventName}")
                ->useLogName($useLogName)
                ->logOnlyDirty();
        }
        if ($run_seeder_disable == 'N') {

            return LogOptions::defaults()
                ->logOnly(['code', 'name'])
                ->setDescriptionForEvent(fn(string $eventName) => "$useLogName {$eventName}")
                ->useLogName($useLogName)
                ->logOnlyDirty();
        }
    }



    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
    public function updatedBy()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }
}
