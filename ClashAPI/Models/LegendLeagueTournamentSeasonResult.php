<?php

namespace ClashApi\Models
{
    use \DateTime;
    use \DateTimeZone;

    class LegendLeagueTournamentSeasonResult
    {
        /**
         * @var int
         */
        public $seasonId;
        
        /**
         * @var int
         */
        public $rank;
        
        /**
         * @var string
         */
        public $trophies;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            if ( isset($stdClass->id) )
                $this->seasonId = $stdClass->id;

            $this->rank     = $stdClass->rank;
            $this->trophies = $stdClass->trophies;
        }
    }
}