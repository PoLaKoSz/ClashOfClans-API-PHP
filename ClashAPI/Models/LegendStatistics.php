<?php

namespace ClashApi\Models
{
    use ClashApi\Models\LegendLeagueTournamentSeasonResult;
    
    class LegendStatistics
    {
        public $legendTrophies;

        /**
         * @var LegendLeagueTournamentSeasonResult
         */
        public $currentSeason;

        /**
         * @var LegendLeagueTournamentSeasonResult
         */
        public $previousSeason;

        /**
         * @var LegendLeagueTournamentSeasonResult
         */
        public $bestSeason;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->legendTrophies = $stdClass->legendTrophies;
            $this->currentSeason  = new LegendLeagueTournamentSeasonResult($stdClass->currentSeason);
            $this->previousSeason = new LegendLeagueTournamentSeasonResult($stdClass->previousSeason);
            $this->bestSeason     = new LegendLeagueTournamentSeasonResult($stdClass->bestSeason);
        }
    }
}