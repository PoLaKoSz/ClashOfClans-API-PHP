<?php

namespace PoLaKoSz\CoC_API\Models;
{
    class Url
    {
        /**
         * @var string
         */
        public $url;

        /**
         * @param string
         */
        public function __construct(string $url)
        {
            $this->url = $url;
        }
    }
}