<?php

namespace ClashApi\Models
{
    class SeasonPlayer
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
         * @var int
         */
        public $rank;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->tag         = $stdClass->tag;
            $this->name        = $stdClass->name;
            $this->expLevel    = $stdClass->expLevel;
            $this->trophies    = $stdClass->trophies;            
            $this->attackWins  = $stdClass->attackWins;
            $this->defenseWins = $stdClass->defenseWins;
            $this->clan        = new SeasonPlayerClan($stdClass->clan);
            $this->rank        = $stdClass->rank;
        }
    }
}