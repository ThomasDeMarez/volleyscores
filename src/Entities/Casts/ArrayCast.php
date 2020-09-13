<?php

namespace TDM\VolleyScores\Entities\Casts;

class ArrayCast implements CastInterface
{

    public static function cast($value)
    {
        return explode(', ', $value);
    }
}
