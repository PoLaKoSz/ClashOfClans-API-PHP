<?php

namespace ClashApi\Models
{
    class Achievement
    {
        /**
         * @var string
         */
        public $name;

        /**
         * @var int
         */
        public $stars;

        /**
         * @var int
         */
        public $completedValue;

        /**
         * @var int
         */
        public $targetValue;

        /**
         * @var string
         */
        public $description;

        /**
         * @var string
         */
        public $completionInfo;

        /**
         * @var string
         */
        public $villageType;


        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->name = $stdClass->name;
            $this->stars = $stdClass->stars;
            $this->completedValue = $stdClass->value;
            $this->targetValue = $stdClass->target;
            $this->description = $stdClass->info;

            if ( !empty($stdClass->completionInfo) )
                $this->completionInfo = $stdClass->completionInfo;
            
            $this->villageType = $stdClass->village;
        }
    }
}