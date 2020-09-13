<?php

namespace TDM\VolleyScores\Entities;

use TDM\VolleyScores\Entities\Casts\IntegerCast;
use TDM\VolleyScores\Entities\Casts\TextCast;

class Serie extends AbstractEntity
{

    protected $mappings = [
        'parentid'  => 'parent_id',
        'serietype' => 'type',
    ];

    protected $casts = [
        'id'        => IntegerCast::class,
        'name'      => TextCast::class,
        'sortorder' => IntegerCast::class,
    ];
}
