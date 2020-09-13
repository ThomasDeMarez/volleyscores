<?php

namespace TDM\VolleyScores\Entities;

use TDM\VolleyScores\Entities\Casts\BooleanCast;
use TDM\VolleyScores\Entities\Casts\DateCast;
use TDM\VolleyScores\Entities\Casts\IntegerCast;
use TDM\VolleyScores\Entities\Casts\TextCast;

class Calendar extends AbstractEntity
{

    protected $mappings = [
        'Reeks'                  => 'series',
        'ReeksId'                => 'series_id',
        'Wedstrijdnr'            => 'game_number',
        'DagTekst'               => 'day_text',
        't'                      => 'day_date',
        'Aanvangsuur'            => 'day_time',
        'Thuis'                  => 'home_team_name',
        'Bezoekers'              => 'visitors_team_name',
        'SporthalNaam'           => 'sportshall_code',
        'ForfaitHoofd'           => 'main_forfait',
        'UitslagHoofd'           => 'main_result',
        'UitslagHoofd_set1'      => 'main_result_set1',
        'UitslagHoofd_set2'      => 'main_result_set2',
        'UitslagHoofd_set3'      => 'main_result_set3',
        'UitslagHoofd_set4'      => 'main_result_set4',
        'UitslagHoofd_set5'      => 'main_result_set5',
        'ForfaitRes'             => 'reserve_forfait',
        'UitslagRes'             => 'reserve_result',
        'UitslagRes_set1'        => 'reserve_result_set1',
        'UitslagRes_set2'        => 'reserve_result_set2',
        'UitslagRes_set3'        => 'reserve_result_set3',
        'GewijzigdDatum'         => 'updated_date',
        'GewijzigdUur'           => 'updated_time',
        'GewijzigdSporthall'     => 'updated_sporshall_code',
        'match_home_team_id'     => 'home_team_id',
        'stnr_home'              => 'home_team_number',
        'match_visitors_team_id' => 'visitors_team_id',
        'stnr_visitors'          => 'visitors_team_number',
    ];

    protected $casts = [
        'ReeksId'                => IntegerCast::class,
        'date'                   => DateCast::class,
        'Thuis'                  => TextCast::class,
        'Bezoekers'              => TextCast::class,
        'ForfaitHoofd'           => BooleanCast::class,
        'ForfaitRes'             => BooleanCast::class,
        'match_home_team_id'     => IntegerCast::class,
        'match_visitors_team_id' => IntegerCast::class,
    ];
}
