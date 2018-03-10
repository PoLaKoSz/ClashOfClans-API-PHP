<?php

namespace PoLaKoSz\CoC_API\Models
{
    use PoLaKoSz\CoC_API\Models\WarlogOpponentClan;

    class WarlogClan extends WarlogOpponentClan
    {
        /**
         * @var int
         */
        public $attacksCount;

        /**
         * @var int
         */
        public $expEarned;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            parent::__construct($stdClass);

            $this->attacksCount          = $stdClass->attacks;
            $this->expEarned             = $stdClass->expEarned;
        }
    }
}