<?php

namespace ClashApi\Models
{
    class Cursors
    {
        /**
         * @var string
         */
        public $before;

        /**
         * @var string
         */
        public $after;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            if ( isset($stdClass->before) )
                $this->before = $stdClass->before;

            if ( isset($stdClass->after) )
                $this->after = $stdClass->after;
        }
    }
}