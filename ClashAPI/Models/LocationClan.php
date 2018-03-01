<?php

namespace ClashApi\Models
{
    use ClashApi\Models\Clan;
    use ClashApi\Models\Location;

    class LocationClan extends Clan
    {
        /**
         * @var Location
         */
        public $location;

        /**
         * @var int
         */
        public $points;
        
        /**
         * @var int
         */
        public $members;
        
        /**
         * @var int
         */
        public $rank;
        
        /**
         * @var int
         */
        public $previousRank;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->tag = $stdClass->tag;
            $this->name = $stdClass->name;
            $this->location = new Location($stdClass->location);
            $this->badge = new ClanBadge($stdClass->badgeUrls);
            $this->clanLevel = $stdClass->clanLevel;
            $this->points = $stdClass->clanPoints;
            $this->members = $stdClass->members;
            $this->rank = $stdClass->rank;
            $this->previousRank = $stdClass->previousRank;
        }
    }
}