<?php

namespace Freedom\Sanitizer\Abstracts;

use Freedom\Sanitizer\Contracts\Sanitization;

abstract class BaseSanitizer  implements Sanitization {

    public function sanitize(array $attributes) : array{
        foreach($attributes as $key => $value){
            $attributes[$key] = $this->getSanitizedValue($key,$value);
        }
        return $attributes;
    }

    public abstract function getSanitizedValue($key,$value);

}
