<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\Image;
    use PoLaKoSz\CoC_API\Models\Url;

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

            // Unranked League doesn't have medium icon
            if ( isset($stdClass->medium) )
                $this->medium = new Url($stdClass->medium);
        }
    }
}