<?php

namespace ClashApi\Models
{
    use ClashApi\Models\Image;
    use ClashApi\Models\Url;

    class LeagueIcon extends Image
    {
        /**
         * @var Url Tiny size image's url
         */
        public $tiny;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->tiny = new Url($stdClass->tiny);
            $this->small = new Url($stdClass->small);
            $this->medium = new Url($stdClass->medium);
        }
    }
}