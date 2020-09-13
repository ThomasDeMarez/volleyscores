<?php

namespace TDM\VolleyScores\Entities\Casts;

use Carbon\Carbon;

class DateCast implements CastInterface
{

    public static function cast($value)
    {
        return Carbon::createFromFormat('d/m/Y H:i', $value, 'Europe/Brussels');
    }
}
