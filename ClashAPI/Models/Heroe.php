<?php

namespace ClashApi\Models
{
    class Heroe
    {
        /**
         * @var string
         */
        public $name;

        /**
         * @var int
         */
        public $level;

        /**
         * @var int
         */
        public $maxLevel;
        
        /**
         * @var string
         */
        public $village;
        
        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->name = $stdClass->name;
            $this->level = $stdClass->level;
            $this->maxLevel = $stdClass->maxLevel;
            $this->village = $stdClass->village;
        }
    }
}