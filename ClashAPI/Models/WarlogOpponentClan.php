<?php

namespace ClashApi\Models
{
    use ClashApi\Models\Clan;

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