<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\Clan;
    use PoLaKoSz\CoC_API\Models\Location;

    class SearchClan extends Clan
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
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct($stdClass);

            if ( isset($stdClass->location) )
                $this->location = new Location($stdClass->location);
            
            $this->points = $stdClass->clanPoints;
            $this->members = $stdClass->members;
        }
    }
}