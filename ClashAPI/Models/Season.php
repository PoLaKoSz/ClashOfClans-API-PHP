<?php

namespace ClashApi\Models
{
    class Season
    {
        /**
         * @var string
         */
        public $time;
        
        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->time = $stdClass->id;
        }
    }
}