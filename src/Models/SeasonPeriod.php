<?php

namespace PoLaKoSz\CoC_API\Models
{
    use \DateTime;

    class SeasonPeriod
    {
        /**
         * @var int
         */
        public $year;

        /**
         * @var int
         */
        public $month;
        
        public function __toString()
        {
            $date = new DateTime();
            $date = $date->setDate($this->year, $this->month, 1);

            return $date->format('Y-m');
        }
    }
}