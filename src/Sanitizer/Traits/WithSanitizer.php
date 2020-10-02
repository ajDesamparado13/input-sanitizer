<?php

namespace Freedom\Sanitizer\Traits;

use Freedom\Sanitizer\Contracts\Sanitization;

trait WithSanitizer {

    protected $sanitizer;

    public function sanitize(array $attributes) : array {
        return $this->sanitizer->sanitize($attributes);
    }

    public function getSanitizedValue($key,$value){
        return $this->sanitizer->getSanitizedValue($key,$value);
    }

    public function getSanitizer(){
        return $this->hasSanitizer() ? $this->sanitizer : $this->makeSanitizer();
    }

    protected function makeSanitizer(){
        if(empty($this->sanitizer())){
            return null;
        }
        $sanitizer = app()->make($this->sanitizer());
        if (!$sanitizer instanceof Sanitization) {
            throw new \Freedom\Sanitizer\Exceptions\SanitizerException(
                "Class {$this->sanitizer()} must be an instance of " . Sanitization::class
            );
        }
        return $this->sanitizer = $sanitizer;;
    }
    
    protected function hasSanitizer() : bool
    {
        return !empty($this->sanitizer) && $this->sanitizer instanceof Sanitization;
    }

    public abstract function sanitizer();
}
