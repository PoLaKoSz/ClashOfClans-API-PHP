<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\Clan;
    use PoLaKoSz\CoC_API\Models\WarPlayer;

    class WarDetailsClan extends Clan
    {        
        /**
         * @var int
         */
        public $clanLevel;
        
        /**
         * @var int
         */
        public $attacksCount;
        
        /**
         * @var int
         */
        public $starsCount;
        
        /**
         * @var float
         */
        public $destructionPercentage;

        /**
         * @var array  of WarPlayer objects
         */
        public $members = array();

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct($stdClass);

            $this->clanLevel             = $stdClass->clanLevel;
            $this->attacksCount          = $stdClass->attacks;
            $this->starsCount            = $stdClass->stars;
            $this->destructionPercentage = $stdClass->destructionPercentage;
            
            foreach ($stdClass->members as $member)
                array_push($this->members, new WarPlayer($member));
        }
    }
}