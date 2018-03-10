<?php

namespace PoLaKoSz\CoC_API\Models
{
    class Location
    {
        /**
         * @var int
         */
        public $id;

        /**
         * @var string
         */
        public $name;

        /**
         * @var bool
         */
        public $isCountry;

        /**
         * Empty string if this location is not a country
         * 
         * @var string
         */
        public $countryCode;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->id = $stdClass->id;
            $this->name = $stdClass->name;
            $this->isCountry = $stdClass->isCountry;

            if ( isset($stdClass->countryCode) )
                $this->countryCode = $stdClass->countryCode;
            else
                $this->countryCode = '';
        }
    }
}