<?php

namespace ClashApi\Models
{
    use ClashApi\Models\MinimalPlayer;

    class LocationVersusPlayer extends MinimalPlayer
    {
        /**
         * @var int
         */
        public $expLevel;
        
        /**
         * @var SeasonPlayerClan
         */
        public $clan;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct( $stdClass );
            
            $this->expLevel           = $stdClass->expLevel;
            $this->clan               = new SeasonPlayerClan($stdClass->clan);

            if ( isset($stdClass->legendStatistics) )
                $this->legendStatistics = new LegendStatistics($stdClass->legendStatistics);
        }
    }
}