<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\SearchClan;
    use PoLaKoSz\CoC_API\Models\DetailedClanPlayer;    

    class DetailedClan extends SearchClan
    {
        /**
         * @var int
         */
        public $clanVersusPoints;
        public $type;

        /**
         * @var int
         */
        public $requiredTrophies;
        public $warFrequency;
        
        /**
         * @var int
         */
        public $warWinStreak;
        
        /**
         * @var int
         */
        public $warWins;
        
        /**
         * @var int
         */
        public $warTies;
        
        /**
         * @var int
         */
        public $warLosses;
        
        /**
         * @var boolean
         */
        public $isWarLogPublic;
        
        /**
         * @var string
         */
        public $description;

        /**
         * @var array  of DetailedClanPlayer objects
         */
        public $memberList = array();

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct($stdClass);

            $this->clanVersusPoints = $stdClass->clanVersusPoints;
            $this->type             = $stdClass->type;
            $this->requiredTrophies = $stdClass->requiredTrophies;
            $this->warFrequency     = $stdClass->warFrequency;
            $this->warWinStreak     = $stdClass->warWinStreak;
            $this->warWins          = $stdClass->warWins;
            $this->warTies          = $stdClass->warTies;
            $this->warLosses        = $stdClass->warLosses;
            $this->isWarLogPublic   = $stdClass->isWarLogPublic;
            $this->description      = $stdClass->description;

            for ($index = 0; $index < count($stdClass->memberList); $index++)
                $this->memberList[$index] = new DetailedClanPlayer($stdClass->memberList[$index]);
        }
    }
}