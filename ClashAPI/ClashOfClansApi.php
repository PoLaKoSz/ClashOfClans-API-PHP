<?php

namespace ClashApi
{
    use ClashApi\DataAccessLayer\WebClient;
    use ClashApi\Models\Player;

    class ClashOfClansApi
    {
        /**
         * @var WebClient to perform requests to the Clash Of Clans API
         */
        protected $webClient;

        /**
         * @var string  apikey  Every call to the Clash Of Clans API needs to contain an Api Key
         */
        public function __construct($apiKey)
        {
            $this->webClient = new WebClient($apiKey);
        }
    }
}