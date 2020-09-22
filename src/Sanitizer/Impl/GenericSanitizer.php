<?php

namespace Freedom\Sanitizer\Impl;
use Freedom\Sanitizer\Contracts\Sanitization;

class GenericSanitizer {

    public function sanitize(array $attributes, $sanitizer) : array {
        if (!$sanitizer instanceof Sanitization) {
            $sanitizer = $this->makeSanitizer($sanitizer);
        }
        return $sanitizer->sanitize($attributes);
    }

    public function makeSanitizer($sanitizer_class)
    {
        $sanitizer = is_string($sanitizer_class) ? app()->make($sanitizer_class) : $sanitizer_class;
        if (!$sanitizer instanceof Sanitization) {
            throw new \Freedom\Sanitizer\Exceptions\SanitizerException(
                "Class {$sanitizer_class} must be an instance of Freedom\Sanitizer\Contracts\Sanitization"
            );
        }
        return $sanitizer;
    }


}
