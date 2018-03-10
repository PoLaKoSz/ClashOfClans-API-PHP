<?php

namespace ClashApi\Models
{
    abstract class MinimalPlayer
    {
        /**
         * @var string
         */
        public $tag;

        /**
         * @var string
         */
        public $name;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->tag  = $stdClass->tag;
            $this->name = $stdClass->name;
        }
    }
}