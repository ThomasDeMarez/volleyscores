<?php

namespace TDM\VolleyScores\Entities\Casts;

class TrimCast implements CastInterface
{

    static public function cast($value)
    {
        if(is_string($value)) {
            if(empty($value)) {
                return null;
            }

            return trim($value);
        }

        return $value;
    }
}
