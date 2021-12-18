<?php

namespace App\Library;

class Translator implements \Illuminate\Contracts\Translation\Translator
{

    /**
     * @inheritDoc
     */
    public function get($key, array $replace = [], $locale = null)
    {
        // TODO: Implement get() method.
    }

    /**
     * @inheritDoc
     */
    public function choice($key, $number, array $replace = [], $locale = null)
    {
        // TODO: Implement choice() method.
    }

    /**
     * @inheritDoc
     */
    public function getLocale()
    {
        // TODO: Implement getLocale() method.
    }

    /**
     * @inheritDoc
     */
    public function setLocale($locale)
    {
        // TODO: Implement setLocale() method.
    }
}