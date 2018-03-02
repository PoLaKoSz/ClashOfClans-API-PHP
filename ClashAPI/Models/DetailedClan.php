<?php

namespace ClashApi\Models
{
    use ClashApi\Models\SearchClan;
    use ClashApi\Models\DetailedClanPlayer;    

    class DetailedClan extends SearchClan
    {
        /**
         * @var int
         */
        public $clanLevel;
        public $clanVersusPoints;
        public $type;
        public $requiredTrophies;
        public $warFrequency;
        public $warWinStreak;
        public $warWins;
        public $warTies;
        public $warLosses;
        public $isWarLogPublic;
        public $description;
        public $memberList = array();

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct($stdClass);

            $this->clanLevel        = $stdClass->clanLevel;
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