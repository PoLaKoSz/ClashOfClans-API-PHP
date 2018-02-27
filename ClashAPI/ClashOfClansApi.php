<?php

namespace ClashApi
{
    use ClashApi\DataAccessLayer\WebClient;
    use ClashApi\Models\League;
    use ClashApi\Models\Paging;
    use ClashApi\Models\Player;
    use ClashApi\Models\SearchFilter;
    use ClashApi\Models\Season;
    use ClashApi\Models\SeasonPlayer;
    use \Exception;

    class ClashOfClansApi
    {
        /**
         * @var WebClient to perform requests to the Clash Of Clans API
         */
        protected $webClient;

        /**
         * @var string  $apikey  Every call to the Clash Of Clans API needs to contain an Api Key
         */
        public function __construct($apiKey)
        {
            if ( strlen($apiKey) == 0 )
                throw new Exception('$apiKey cannot be null!');

            $this->webClient = new WebClient($apiKey);
        }

        /**
         * @var string  The player's tag (with the hasttag)
         */
        public function getPlayerByTag($tag)
        {
            $response = $this->webClient->sendRequest('/players/' . $tag);

            return new Player($response);
        }

        /**
         * The method return all existing league from the game
         * 
         * @param  SearchFilter  $filter
         * @return array         of League objects
         */
        public function getLeagues($filter = null)
        {
            $response = $this->webClient->sendRequest('/leagues' .  $this->filterAppendToUrl($filter));

            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new League($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Get every information about the given league
         * 
         * @var    int     $leagueId  id of the League
         * @return League  object
         */
        public function getLeagueById($leagueId)
        {
            $response = $this->webClient->sendRequest('/leagues/' . $leagueId);

            return new League($response);
        }

        /**
         * Get a league seasons. Note that league season information is available only for Legend League
         * 
         * @var    int           $leagueId  id of the League
         * @param  SearchFilter  $filter
         * @return array         of League objects
         */
        public function getLeagueSeasons($leagueId, $filter = null)
        {
            $response = $this->webClient->sendRequest('/leagues/' . $leagueId . '/seasons' .  $this->filterAppendToUrl($filter));            

            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new Season($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Get a league season rankings. Note that league season information is available only for Legend League
         * 
         * @param  int           $leagueId
         * @param  string        $seasonTime
         * @param  SearchFilter  $filter
         * @return array         of Player objects
         */
        public function getLeagueSeason($leagueId, $seasonTime, $filter = null)
        {
            $url = '/leagues/' . $leagueId . '/seasons/' . $seasonTime .  $this->filterAppendToUrl($filter);

            $response = $this->webClient->sendRequest($url);
            
            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new SeasonPlayer($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * @param  SearchFilter  $filter
         * @return string
         */
        private function filterAppendToUrl($filter = null)
        {
            if ( $filter == null )
                return '';
            
            if ( $filter->before != null && $filter->after != null)
                throw new Exception('SearchFilter class fields\'s (Before and After) value cannot be specified at the same time!');

            $appendable = '';

            $filter = (array) $filter;

            foreach ( $filter as $key => $value ) {
                if ( $value != null ) {
                    if ( strlen($appendable) != 0 )
                        $appendable .= '&';
                    else
                        $appendable .= '?';

                    $appendable .= $key . '=' . $value;
                }
            }

            return $appendable;
        }
    }
}