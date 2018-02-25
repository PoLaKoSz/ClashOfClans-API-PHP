<?php

namespace ClashApi\Models;
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
        public function __construct($url)
        {
            $this->url = $url;
        }
    }
}