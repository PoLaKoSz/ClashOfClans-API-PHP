<?php

namespace ClashApi\Models
{
    use ClashApi\Models\LocationClan;

    class LocationVersusClan extends LocationClan
    {
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
            
            $this->clanVersusPoints = $stdClass->clanVersusPoints;
        }
    }
}