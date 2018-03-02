<?php

namespace ClashApi\Models
{
    use ClashApi\Models\SearchFilter;

    class ClanSearchFilter extends SearchFilter
    {
        /**
         * Use the setName function to initialize this variable
         * 
         * @var string
         */
        public $name;

        /**
         * @var int
         */
        public $locationId;

        /**
         * @var int
         */
        public $minMembers;

        /**
         * @var int
         */
        public $maxMembers;

        /**
         * @var int
         */
        public $minClanPoints;

        /**
         * @var int
         */
        public $minClanLevel;

        public function setName(string $name)
        {
            if (strlen($name) < 3)
                throw new Exception('Clan name must be at least 3 character long!');

            $this->name = $name;
        }
    }
}