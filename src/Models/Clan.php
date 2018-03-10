<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\SeasonPlayerClan;

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
            parent::__construct( $stdClass );
            
            $this->clanLevel = $stdClass->clanLevel;
        }
    }
}