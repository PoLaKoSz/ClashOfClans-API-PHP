<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\SearchClan;

    class LocationClan extends SearchClan
    {
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
            parent::__construct( $stdClass );

            $this->rank = $stdClass->rank;
            $this->previousRank = $stdClass->previousRank;
        }
    }
}