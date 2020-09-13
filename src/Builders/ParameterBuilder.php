<?php

namespace TDM\VolleyScores\Builders;

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Validation;

class ParameterBuilder
{

    public static function verify(array $input, array $rules)
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($input, new Collection($rules));

        if(count($violations) !== 0) {
            dd($violations);
        }

        return $input;
    }
}
