<?php

namespace ClashApi\Models
{
    use ClashApi\Models\Achievement;
    use ClashApi\Models\MinimalPlayer;
    use ClashApi\Models\Heroe;
    use ClashApi\Models\Troop;
    use ClashApi\Models\Spell;

    class Player extends MinimalPlayer
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
        public $bestTrophies;
        
        /**
         * @var int
         */
        public $warStars;
        
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
        public $builderHallLevel;
        
        /**
         * @var int
         */
        public $versusTrophies;
        
        /**
         * @var int
         */
        public $bestVersusTrophies;
        
        /**
         * @var int
         */
        public $versusBattleWins;

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
        public $townHallLevel;
        
        /**
         * @var int
         */
        public $donationsReceived;
        
        /**
         * @var Clan
         */
        public $clan;

        /**
         * @var League
         */
        public $league;

        /**
         * @var array of Achievement objects
         */
        public $achievements = array();

        /**
         * @var int
         */
        public $versusBattleWinCount;

        /**
         * @var array of Troop objects
         */
        public $troops = array();

        /**
         * @var array of Heroe objects
         */
        public $heroes = array();

        /**
         * @var array of Spell objects
         */
        public $spells = array();

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
            $this->attackWins         = $stdClass->attackWins;
            $this->defenseWins        = $stdClass->defenseWins;
            $this->clan               = new Clan($stdClass->clan);
            $this->bestTrophies       = $stdClass->bestTrophies;
            $this->donations          = $stdClass->donations;
            $this->donationsReceived  = $stdClass->donationsReceived;
            $this->warStars           = $stdClass->warStars;
            $this->role               = $stdClass->role;
            $this->townHallLevel      = $stdClass->townHallLevel;
            $this->builderHallLevel   = $stdClass->builderHallLevel;
            $this->bestVersusTrophies = $stdClass->bestVersusTrophies;
            $this->versusBattleWins   = $stdClass->versusBattleWins;

            if ( isset($stdClass->legendStatistics) )
                $this->legendStatistics = new LegendStatistics($stdClass->legendStatistics);
            
            foreach ($stdClass->achievements as $achievement)
                array_push($this->achievements, new Achievement($achievement));
            
            $this->versusBattleWinCount = $stdClass->versusBattleWinCount;
            
            foreach ($stdClass->troops as $troop)
                array_push($this->troops, new Troop($troop));

            foreach ($stdClass->heroes as $heroe)
                array_push($this->heroes, new Heroe($heroe));

            foreach ($stdClass->spells as $spell)
                array_push($this->spells, new Spell($spell));
        }
    }
}