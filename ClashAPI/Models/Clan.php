<?php

namespace ClashApi\Models
{
    class Clan
    {
        /**
         * The clan's name without hashtag (#)
         * @var string
         */
        public $tag;

        /**
         * @var string
         */
        public $name;

        /**
         * @var int
         */
        public $clanLevel;

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
            $this->clanLevel = $stdClass->clanLevel;
            $this->badge = new ClanBadge($stdClass->badgeUrls);
        }
    }
}