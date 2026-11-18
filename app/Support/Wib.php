<?php

namespace App\Support;

use Carbon\Carbon;
use Throwable;

/**
 * The app runs in UTC (config/app.php), so stored date-times are UTC. Admins read them in
 * WIB, so convert only for display/export; the stored values stay UTC.
 */
final class Wib
{
    public const TIMEZONE = 'Asia/Jakarta';

    /** "2024-06-10 07:21:47" (UTC) => "2024-06-10 14:21:47". Date-only or unparsable values pass through. */
    public static function format($value): mixed
    {
        if ($value === null || $value === '') {
            return $value;
        }

        if (is_string($value) && ! preg_match('/\d{1,2}:\d{2}/', $value)) {
            return $value;
        }

        try {
            return Carbon::parse($value, 'UTC')->setTimezone(self::TIMEZONE)->format('Y-m-d H:i:s');
        } catch (Throwable) {
            return $value;
        }
    }
}
