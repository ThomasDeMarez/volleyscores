<?php

namespace TDM\VolleyScores\Entities\Casts;

class BooleanCast implements CastInterface
{

    public static function cast($value)
    {
        return boolval($value);
    }
}
