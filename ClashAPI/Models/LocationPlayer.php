<?php

namespace ClashApi\Models
{
    class LocationPlayer
    {
        /**
         * @var string
         */
        public $tag;

        /**
         * @var string
         */
        public $name;
        
        /**
         * @var int
         */
        public $expLevel;
        
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
         * @var SeasonPlayerClan
         */
        public $clan;

        /**
         * @var League
         */
        public $league;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->tag                = $stdClass->tag;
            $this->name               = $stdClass->name;
            $this->expLevel           = $stdClass->expLevel;
            $this->league             = new League($stdClass->league);
            $this->trophies           = $stdClass->trophies;
            $this->attackWins         = $stdClass->attackWins;
            $this->defenseWins        = $stdClass->defenseWins;
            $this->clan               = new SeasonPlayerClan($stdClass->clan);

            if ( isset($stdClass->legendStatistics) )
                $this->legendStatistics = new LegendStatistics($stdClass->legendStatistics);
        }
    }
}