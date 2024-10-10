<?php

namespace App\Models\Competex;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Casts\StatusCast;
use App\Casts\StatusIconCast;
use App\Casts\TimeZoneCast;
use App\Casts\TitleCast;
use App\Casts\UserNameCast;
use App\Models\Address;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseRegistration extends Model
{
    use HasFactory, LogsActivity, SoftDeletes;


    protected $fillable = ['name', 'application_status', 'application_update', 'updated_by'];

    protected $casts = [
        'created_at' => TimeZoneCast::class,
        'updated_at' => TimeZoneCast::class,
        'created_by' => UserNameCast::class,
        'updated_by' => UserNameCast::class,
        'local_name' => TitleCast::class,
        'name' => TitleCast::class,
    ];



    public function getActivitylogOptions(): LogOptions
    {
        $useLogName = 'CourseRegistration';
        $run_seeder_disable = env('RUN_SEEDER_DISABLE');

        if ($run_seeder_disable == 'Y') {

            return LogOptions::defaults()
                ->logOnly(['application_status', 'application_update', 'updated_by', 'created_at'])
                ->setDescriptionForEvent(fn(string $eventName) => "$useLogName {$eventName}")
                ->useLogName($useLogName)
                ->logOnlyDirty();
        }
        if ($run_seeder_disable == 'N') {

            return LogOptions::defaults()
                ->logOnly(['name'])
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

    public function courseName()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function cityName()
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }
}
