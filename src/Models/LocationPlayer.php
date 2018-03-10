<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\LocationVersusPlayer;
    
    class LocationPlayer extends LocationVersusPlayer
    {
        /**
         * @var int
         */
        public $trophies;
        
        /**
         * @var int
         */
        public $attackWins;
        
        /**
         * @var int
         */
        public $defenseWins;

        /**
         * @var League
         */
        public $league;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct( $stdClass );
            
            $this->league             = new League($stdClass->league);
            $this->trophies           = $stdClass->trophies;
            $this->attackWins         = $stdClass->attackWins;
            $this->defenseWins        = $stdClass->defenseWins;

            if ( isset($stdClass->legendStatistics) )
                $this->legendStatistics = new LegendStatistics($stdClass->legendStatistics);
        }
    }
}