<?php

namespace PoLaKoSz\CoC_API\Models
{
    class SeasonPlayerClan
    {
        /**
         * @var string
         */
        public $tag;

        /**
         * @var string
         */
        public $name;

        /**
         * @var ClanBadge
         */
        public $badge;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->tag = $stdClass->tag;
            $this->name = $stdClass->name;
            $this->badge = new ClanBadge($stdClass->badgeUrls);
        }
    }
}