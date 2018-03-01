<?php

namespace ClashApi\Models
{
    class LocationVersusPlayer
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
         * @var SeasonPlayerClan
         */
        public $clan;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->tag                = $stdClass->tag;
            $this->name               = $stdClass->name;
            $this->expLevel           = $stdClass->expLevel;
            $this->clan               = new SeasonPlayerClan($stdClass->clan);

            if ( isset($stdClass->legendStatistics) )
                $this->legendStatistics = new LegendStatistics($stdClass->legendStatistics);
        }
    }
}