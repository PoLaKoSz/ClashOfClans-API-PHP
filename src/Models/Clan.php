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
            parent::__construct( $stdClass );
            
            $this->clanLevel = $stdClass->clanLevel;
        }
    }
}