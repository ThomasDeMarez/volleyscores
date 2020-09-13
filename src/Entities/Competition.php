<?php

namespace TDM\VolleyScores\Entities;

use TDM\VolleyScores\Entities\Casts\IntegerCast;
use TDM\VolleyScores\Entities\Casts\TextCast;

class Competition extends AbstractEntity
{

    protected $casts = [
        'rank'     => IntegerCast::class,
        'team'     => TextCast::class,
        'points'   => IntegerCast::class,
        'games'    => IntegerCast::class,
        'forfaits' => IntegerCast::class,
    ];
}
