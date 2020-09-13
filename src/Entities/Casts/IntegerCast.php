<?php

namespace TDM\VolleyScores\Entities\Casts;

class IntegerCast implements CastInterface
{

    public static function cast($value)
    {
        return (int) $value;
    }
}
