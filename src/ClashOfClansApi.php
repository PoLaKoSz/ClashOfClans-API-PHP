<?php

namespace PoLaKoSz\CoC_API
{
    use PoLaKoSz\CoC_API\DataAccessLayer\WebClient;
    use PoLaKoSz\CoC_API\Models\DetailedClan;
    use PoLaKoSz\CoC_API\Models\DetailedClanPlayer;    
    use PoLaKoSz\CoC_API\Models\League;
    use PoLaKoSz\CoC_API\Models\Location;
    use PoLaKoSz\CoC_API\Models\LocationClan;
    use PoLaKoSz\CoC_API\Models\LocationPlayer;
    use PoLaKoSz\CoC_API\Models\LocationVersusClan;
    use PoLaKoSz\CoC_API\Models\LocationVersusPlayer;
    use PoLaKoSz\CoC_API\Models\Paging;
    use PoLaKoSz\CoC_API\Models\Player;
    use PoLaKoSz\CoC_API\Models\SearchClan;
    use PoLaKoSz\CoC_API\Models\SearchFilter;
    use PoLaKoSz\CoC_API\Models\Season;
    use PoLaKoSz\CoC_API\Models\SeasonPlayer;
    use PoLaKoSz\CoC_API\Models\SeasonPeriod;
    use PoLaKoSz\CoC_API\Models\Warlog;
    use PoLaKoSz\CoC_API\Models\WarDetails;
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
        public function __construct(string $apiKey)
        {
            if ( strlen($apiKey) == 0 )
                throw new Exception('$apiKey cannot be null!');

            $this->webClient = new WebClient($apiKey);
        }

        /**
         * @var    string  $tag  The player's tag (with the hasttag)
         * @return Player
         */
        public function getPlayerByTag(string $tag)
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
        public function getLeagues(SearchFilter $filter = null)
        {
            $response = $this->webClient->sendRequest('/leagues' . $this->filterAppendToUrl($filter));

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
        public function getLeagueById(int $leagueId)
        {
            $response = $this->webClient->sendRequest('/leagues/' . $leagueId);

            return new League($response);
        }

        /**
         * Get a league seasons. Note that league season information is available only for Legend League
         * 
         * @var    int           $leagueId  id of the League
         * @param  SearchFilter  $filter
         * @return array         of Season objects
         */
        public function getLeagueSeasons(int $leagueId, SearchFilter $filter = null)
        {
            $response = $this->webClient->sendRequest('/leagues/' . $leagueId . '/seasons' . $this->filterAppendToUrl($filter));

            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new Season($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Get a league season rankings. Note that league season information is available only for Legend League (ID: 29000022)
         * 
         * @param  int           $leagueId
         * @param  SeasonPeriod  $seasonId
         * @param  SearchFilter  $filter
         * @return array         of SeasonPlayer objects
         */
        public function getLeagueSeason(int $leagueId, SeasonPeriod $seasonId, SearchFilter $filter = null)
        {
            $url = '/leagues/' . $leagueId . '/seasons/' . $seasonId . $this->filterAppendToUrl($filter);

            $response = $this->webClient->sendRequest($url);
            
            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new SeasonPlayer($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * List all available locations
         * 
         * @param  SearchFilter  $filter
         * @return array         of Location objects
         */
        public function getLocations(SearchFilter $filter = null)
        {
            $url = '/locations' . $this->filterAppendToUrl($filter);

            $response = $this->webClient->sendRequest($url);
            
            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new Location($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Get information about specific location
         * 
         * @param  int       $locationId
         * @return Location
         */
        public function getLocationById(int $locationId)
        {
            $url = '/locations/' . $locationId;

            $response = $this->webClient->sendRequest($url);

            return new Location($response);
        }

        /**
         * Get clan rankings for a specific location
         * 
         * @param  int           $locationId
         * @param  SearchFilter  $filter
         * @return array         of LocationClan objects
         */
        public function getLocationClanRankings(int $locationId, SearchFilter $filter = null)
        {
            $url = '/locations/' . $locationId . '/rankings/clans' . $this->filterAppendToUrl($filter);

            $response = $this->webClient->sendRequest($url);
            
            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new LocationClan($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Get player rankings for a specific location
         * 
         * @param  int           $locationId
         * @param  SearchFilter  $filter
         * @return array         of LocationPlayer objects
         */
        public function getLocationPlayerRankings(int $locationId, SearchFilter $filter = null)
        {
            $url = '/locations/' . $locationId . '/rankings/players' . $this->filterAppendToUrl($filter);

            $response = $this->webClient->sendRequest($url);
            
            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new LocationPlayer($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Get clan versus rankings for a specific location
         * 
         * @param  int           $locationId
         * @param  SearchFilter  $filter
         * @return array         of LocationVersusClan objects
         */
        public function getLocationClanVersusRankings(int $locationId, SearchFilter $filter = null)
        {
            $url = '/locations/' . $locationId . '/rankings/clans-versus' . $this->filterAppendToUrl($filter);

            $response = $this->webClient->sendRequest($url);
            
            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new LocationVersusClan($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Get player rankings for a specific location
         * 
         * @param  int           $locationId
         * @param  SearchFilter  $filter
         * @return array         of LocationVersusPlayer objects
         */
        public function getLocationPlayerVersusRankings(int $locationId, SearchFilter $filter = null)
        {
            $url = '/locations/' . $locationId . '/rankings/players-versus' . $this->filterAppendToUrl($filter);

            $response = $this->webClient->sendRequest($url);
            
            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new LocationVersusPlayer($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Search all clans by name and/or filtering the results using various criteria
         * 
         * @param  ClanSearchFilter  $filter
         * @return array             of SearchClan objects
         */
        public function getClans(ClanSearchFilter $filter = null)
        {
            $url = '/clans' . $this->filterAppendToUrl($filter);
            
            $response = $this->webClient->sendRequest($url);
            
            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new SearchClan($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Get information about a single clan by clan tag
         * 
         * @param  string        $clanTag
         * @return DetailedClan
         */
        public function getClanyByTag(string $clanTag)
        {
            $url = '/clans/' . $clanTag;
            
            $response = $this->webClient->sendRequest($url);

            return new DetailedClan($response);
        }

        /**
         * Get information about a single clan by clan tag
         * 
         * @param  string        $clanTag
         * @param  SearchFilter  $filter
         * @return array         of DetailedClanPlayer objects
         */
        public function getClanMembers(string $clanTag, SearchFilter $filter = null)
        {
            $url = '/clans/' . $clanTag . '/members' . $this->filterAppendToUrl($filter);
            
            $response = $this->webClient->sendRequest($url);

            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new DetailedClanPlayer($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Get information about a single clan by clan tag
         * 
         * @param  string        $clanTag
         * @param  SearchFilter  $filter
         * @return array         of DetailedClanPlayer objects
         */
        public function getClanWarlog(string $clanTag, SearchFilter $filter = null)
        {
            $url = '/clans/' . $clanTag . '/warlog' . $this->filterAppendToUrl($filter);
            
            $response = $this->webClient->sendRequest($url);

            for ($index = 0; $index < count($response->items); $index++)
                $response->items[$index] = new Warlog($response->items[$index]);

            $response->paging = new Paging($response->paging);

            return $response;
        }

        /**
         * Get information about a single clan by clan tag
         * 
         * @param  string  $clanTag
         * @return array   of DetailedClanPlayer objects
         */
        public function getClanCurrentWar(string $clanTag)
        {
            $url = '/clans/' . $clanTag . '/currentwar';
            
            $response = $this->webClient->sendRequest($url);

            return new WarDetails( $response );
        }

        /**
         * @param  SearchFilter or ClanSearchFilter  $filter
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

                    $appendable .= $key . '=' . urlencode($value);
                }
            }

            return $appendable;
        }
    }
}