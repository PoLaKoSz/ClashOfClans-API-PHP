<?php

namespace ClashApi\Models
{
    class WarPlayer
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
        public $townhallLevel;
        
        /**
         * @var int
         */
        public $mapPosition;
        
        public $opponentAttacks;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->tag             = $stdClass->tag;
            $this->name            = $stdClass->name;
            $this->townhallLevel   = $stdClass->townhallLevel;
            $this->mapPosition     = $stdClass->mapPosition;
            $this->opponentAttacks = $stdClass->opponentAttacks;
        }
    }
}