<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\Clan;

    class WarlogOpponentClan extends Clan
    {
        /**
         * @var int
         */
        public $starsCount;
        
        /**
         * @var float
         */
        public $destructionPercentage;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct($stdClass);
            
            $this->starsCount            = $stdClass->stars;
            $this->destructionPercentage = $stdClass->destructionPercentage;
        }
    }
}