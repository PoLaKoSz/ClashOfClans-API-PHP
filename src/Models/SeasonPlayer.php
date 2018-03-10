<?php

namespace ClashApi\Models
{
    use ClashApi\Models\LocationVersusPlayer;

    class SeasonPlayer extends LocationVersusPlayer
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
         * @var int
         */
        public $rank;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct( $stdClass );
            
            $this->trophies    = $stdClass->trophies;            
            $this->attackWins  = $stdClass->attackWins;
            $this->defenseWins = $stdClass->defenseWins;
            $this->rank        = $stdClass->rank;
        }
    }
}