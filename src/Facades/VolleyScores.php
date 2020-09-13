<?php

namespace TDM\VolleyScores\Facades;

use Illuminate\Support\Facades\Facade;
use TDM\VolleyScores\Endpoints\CalendarEndpoint;
use TDM\VolleyScores\Endpoints\CompetitionEndpoint;
use TDM\VolleyScores\Endpoints\SeriesEndpoint;
use TDM\VolleyScores\VolleyScores as VolleyScoresService;

/**
 * Class LaravelFacade
 *
 * @method SeriesEndpoint series()
 * @method CalendarEndpoint calendar()
 * @method CompetitionEndpoint competition()
 *
 * @package TDM\VolleyScores\VolleyScores
 */
class VolleyScores extends Facade
{

    protected static function getFacadeAccessor()
    {
        return VolleyScoresService::class;
    }
}
