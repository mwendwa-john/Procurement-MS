<?php

namespace App\Helpers;

use Spatie\Valuestore\Valuestore;

class GlobalHelpers
{
    public static function getPerPage()
    {
        return Valuestore::make(config_path('global_settings.json'))->get('pagination');
    }
}
