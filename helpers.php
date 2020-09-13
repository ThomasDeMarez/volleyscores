<?php

if(! function_exists('volleyscores')) {
    function volleyscores($crawler, $team)
    {
        if($crawler && $team) {
            return app('volleyscores')
                ->crawler($crawler)
                ->team($team);
        }

        return app('volleyscores');
    }
}
