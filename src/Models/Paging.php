<?php

namespace PoLaKoSz\CoC_API\Models
{
    class Paging
    {
        /**
         * @var Cursors
         */
        public $cursors;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->cursors = new Cursors($stdClass->cursors);
        }
    }
}