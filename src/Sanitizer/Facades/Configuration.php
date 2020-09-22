<?php

namespace Freedom\Sanitizer\Facade;

use Illuminate\Support\Facades\Facade;

class Sanitizer extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'sanitizer';
    }

}


