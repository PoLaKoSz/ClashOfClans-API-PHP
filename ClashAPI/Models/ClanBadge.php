<?php

namespace ClashApi\Models
{
    use ClashApi\Models\Image;
    use ClashApi\Models\Url;

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