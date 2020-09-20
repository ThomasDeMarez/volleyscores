<?php

namespace TDM\VolleyScores\Entities;

use TDM\VolleyScores\Entities\Casts\IntegerCast;
use TDM\VolleyScores\Entities\Casts\TextCast;

class Competition extends AbstractEntity
{

    protected $mappings = [
        'RangschikkingID'           => 'id',
        'Reeks'                     => 'series',
        'ReeksId'                   => 'series_id',
        'Wedstrijd'                 => 'type',
        'Ploegnaam'                 => 'team',
        'AantalWedstrijden'         => 'games',
        'AantalWedstrijdenGewonnen' => 'games_won',
        'AantalWedstrijdenVerloren' => 'games_lost',
        'AantalSetsGewonnen'        => 'sets_won',
        'AantalSetsVerloren'        => 'sets_lost',
        'AantalPunten'              => 'points',
        'Gewonnen30_31'             => 'won_30_31',
        'Gewonnen32'                => 'won_32',
        'Verloren30_31'             => 'lost_30_31',
        'Verloren32'                => 'lost_32',
        'Forfait'                   => 'forfaits',
        'WedstrijdType'             => 'game_type',
        'Volgorde'                  => 'sort_order',
        'Omschrijving'              => 'description',
    ];

    protected $casts = [
        'RangschikkingID'           => IntegerCast::class,
        'ReeksId'                   => IntegerCast::class,
        'Ploegnaam'                 => TextCast::class,
        'AantalWedstrijden'         => IntegerCast::class,
        'AantalWedstrijdenGewonnen' => IntegerCast::class,
        'AantalWedstrijdenVerloren' => IntegerCast::class,
        'AantalSetsGewonnen'        => IntegerCast::class,
        'AantalSetsVerloren'        => IntegerCast::class,
        'AantalPunten'              => IntegerCast::class,
        'Gewonnen30_31'             => IntegerCast::class,
        'Gewonnen32'                => IntegerCast::class,
        'Verloren30_31'             => IntegerCast::class,
        'Verloren32'                => IntegerCast::class,
        'Forfait'                   => IntegerCast::class,
        'Omschrijving'              => TextCast::class,
    ];
}
