<?php

namespace ClashApi\Models
{
    use ClashApi\Models\MinimalPlayer;
    
    class DetailedClanPlayer extends MinimalPlayer
    {
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
        public $versusTrophies;

        /**
         * @var string
         */
        public $role;
        
        /**
         * @var int
         */
        public $donations;
        
        /**
         * @var int
         */
        public $donationsReceived;

        /**
         * @var League
         */
        public $league;
        
        /**
         * @var int
         */
        public $clanRank;
        
        /**
         * @var int
         */
        public $previousClanRank;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct( $stdClass );
            
            $this->expLevel           = $stdClass->expLevel;
            $this->league             = new League($stdClass->league);
            $this->trophies           = $stdClass->trophies;
            $this->versusTrophies     = $stdClass->versusTrophies;
            $this->donations          = $stdClass->donations;
            $this->donationsReceived  = $stdClass->donationsReceived;
            $this->role               = $stdClass->role;
            $this->clanRank           = $stdClass->clanRank;
            $this->previousClanRank   = $stdClass->previousClanRank;
        }
    }
}