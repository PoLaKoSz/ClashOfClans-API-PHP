<?php

namespace PoLaKoSz\CoC_API\Models
{
    abstract class Image
    {        
        /**
         * @var Url  Medium size image's url
         */
        public $medium;

        /**
         * @var Url  Small size image's url
         */
        public $small;
    }
}