<?php

namespace ClashApi\Models
{
    use ClashApi\Models\Clan;
    use ClashApi\Models\Location;

    class LocationVersusClan extends Clan
    {
        /**
         * @var Location
         */
        public $location;
        
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
         * @var int
         */
        public $clanVersusPoints;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct($stdClass);

            $this->location = new Location($stdClass->location);
            $this->members = $stdClass->members;
            $this->rank = $stdClass->rank;
            $this->previousRank = $stdClass->previousRank;
            $this->clanVersusPoints = $stdClass->clanVersusPoints;
        }
    }
}