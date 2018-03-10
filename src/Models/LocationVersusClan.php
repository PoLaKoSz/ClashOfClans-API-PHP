<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\LocationClan;

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