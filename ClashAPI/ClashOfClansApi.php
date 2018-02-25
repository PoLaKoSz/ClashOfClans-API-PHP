<?php

namespace ClashApi
{
    use ClashApi\DataAccessLayer\WebClient;
    use \Exception;
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
            if ( strlen($apiKey) == 0 )
                throw new Exception('$apiKey cannot be null!');

            $this->webClient = new WebClient($apiKey);
        }

        /**
         * 
         * @var string  The player's tag (with the hasttag)
         */
        public function getPlayerByTag($tag)
        {
            $response = $this->webClient->sendRequest('/players/' . $tag);

            return new Player($response);
        }
    }
}