<?php

namespace ClashApi\Models
{
    use ClashApi\Models\LeagueIcon;

    class League
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
         * @var LeagueIcon
         */
        public $icon;

        /**
         * @param stdClass
         */
        public function __construct($stdClass)
        {
            $this->id = $stdClass->id;
            $this->name = $stdClass->name;
            $this->icon = new LeagueIcon($stdClass->iconUrls);
        }
    }
}