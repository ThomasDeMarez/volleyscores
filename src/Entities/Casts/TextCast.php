<?php

namespace TDM\VolleyScores\Entities\Casts;

class TextCast implements CastInterface
{

    public static function cast($value)
    {
        return ucwords(strtolower($value));
    }
}
