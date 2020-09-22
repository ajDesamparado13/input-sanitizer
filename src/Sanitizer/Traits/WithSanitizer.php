<?php

namespace Freedom\Sanitizer\Traits;

use Freedom\Sanitizer\Contracts\Sanitization;

trait WithSanitizer {

    protected $sanitizer;

    public abstract function sanitizer() : string;

    public function sanitize(array $attributes) : array {
        if(!$this->sanitizer){
            $this->makeSanitizer();
        }
        return $this->sanitizer->sanitize($attributes);
    }

    public function getSanitizedValue($key,$value){
        if(!$this->sanitizer){
            $this->makeSanitizer();
        }
        return $this->sanitizer->getSanitizedValue($key,$value);
    }

    public function makeSanitizer(){
        $sanitizer = app()->make($this->sanitizer());
        if (!$sanitizer instanceof Sanitization) {
            throw new \Freedom\Sanitizer\Exceptions\SanitizerException(
                "Class {$this->sanitizer()} must be an instance of Freedom\Sanitizer\Contracts\Sanitization"
            );
        }
        return $this->sanitizer = $sanitizer;;
    }
}

