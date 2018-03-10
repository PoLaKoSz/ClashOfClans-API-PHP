<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\Image;
    use PoLaKoSz\CoC_API\Models\Url;

    class ClanBadge extends Image
    {
        /**
         * @var Url Large size image's url
         */
        public $large;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->small  = new Url($stdClass->small);
            $this->medium = new Url($stdClass->medium);
            $this->large  = new Url($stdClass->large);
        }
    }
}