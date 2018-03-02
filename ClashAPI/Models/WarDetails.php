<?php

namespace ClashApi\Models
{
    use ClashApi\Helpers\TimeConverter;
    use ClashApi\Models\WarDetailsClan;

    class WarDetails
    {
        /**
         * Value can be: warEnded / preparation /
         * 
         * @var string
         */
        public $state;

        /**
         * @var int
         */
        public $teamSize;

        /**
         * @var DateTime
         */
        public $preparationStartTime;

        /**
         * @var DateTime
         */
        public $startTime;

        /**
         * @var DateTime
         */
        public $endTime;

        public $clan;

        public $opponent;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->state                = $stdClass->state;
            $this->teamSize             = $stdClass->teamSize;
            $this->preparationStartTime = TimeConverter::dateTimeConverter( $stdClass->preparationStartTime );
            $this->startTime            = TimeConverter::dateTimeConverter( $stdClass->startTime );
            $this->endTime              = TimeConverter::dateTimeConverter( $stdClass->endTime );
            $this->clan                 = new WarDetailsClan( $stdClass->clan );
            $this->opponent             = new WarDetailsClan( $stdClass->opponent );
        }
    }
}