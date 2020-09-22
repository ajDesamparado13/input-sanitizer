<?php

namespace Freedom\Sanitizer\Contracts;

interface Sanitization 
{

    public function sanitize(array $attributes) : array;
    public function getSanitizedValue($key,$value);

}
