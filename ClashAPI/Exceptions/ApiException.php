<?php

namespace ClashApi\Exceptions
{
    use Exception;

    class ApiException extends Exception
    {
        public $httpStatusCode;
        public $apiResponse;

        public function __construct($message, $httpStatusCode, $apiResponse) {
            $this->httpStatusCode = $httpStatusCode;
            $this->apiResponse = $apiResponse;

            parent::__construct($message, 0, null);
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return $this->message . '.HTTP: ' . $this->httpStatusCode . '. Response: ' . $this->apiResponse;
        }
    }
}