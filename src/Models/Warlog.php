<?php

namespace ClashApi\Models
{
    use ClashApi\Helpers\TimeConverter;
    use ClashApi\Models\WarlogClan;
    use ClashApi\Models\WarlogOpponentClan;    

    class Warlog
    {
        /**
         * @var int
         */
        public $result;

        /**
         * @var DateTime
         */
        public $endTime;

        /**
         * @var int
         */
        public $teamSize;

        /**
         * @var WarlogClan
         */
        public $clan;

        /**
         * @var WarlogClan
         */
        public $opponent;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->result   = $stdClass->result;

            // TODO: [Help wanted] Maybe this is not the best solution for this
            $this->endTime  = TimeConverter::dateTimeConverter( $stdClass->endTime );

            $this->teamSize = $stdClass->teamSize;
            $this->clan     = new WarlogClan($stdClass->clan);
            $this->opponent = new WarlogOpponentClan($stdClass->opponent);
        }

        
    }
}