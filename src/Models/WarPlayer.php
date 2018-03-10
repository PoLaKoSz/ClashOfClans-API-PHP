<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\MinimalPlayer;

    class WarPlayer extends MinimalPlayer
    {
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
            parent::__construct( $stdClass );
            
            $this->townhallLevel   = $stdClass->townhallLevel;
            $this->mapPosition     = $stdClass->mapPosition;
            $this->opponentAttacks = $stdClass->opponentAttacks;
        }
    }
}