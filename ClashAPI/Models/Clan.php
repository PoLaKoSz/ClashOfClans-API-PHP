<?php

namespace ClashApi\Models
{
    use ClashApi\Models\SeasonPlayerClan;

    class Clan extends SeasonPlayerClan
    {
        /**
         * @var int
         */
        public $clanLevel;

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