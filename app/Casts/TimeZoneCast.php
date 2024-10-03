<?php

namespace App\Casts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TimeZoneCast implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $user = Auth::user();
        $timeZone = $user && $user->timeZone ? $user->timeZone->time_zone : 'UTC'; // Default to 'UTC' or any other fallback

        return Carbon::parse($value)->setTimezone($timeZone)->format('d-M-Y h:i A');
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return $value;
    }
}
