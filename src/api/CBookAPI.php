<?php

class CBookAPI {
    /**
     * API Key used for authentication.
     *
     * @var string
     */
    private $_apiClientKey;

    /**
     * Secret Key used when authenticating.
     *
     * @var string
     */
    private $_apiClientSecret;

    /**
     * String returned when we aren't authenticated.
     *
     * @var string
     */
    private $_unauthorisedString = '{ "status": "Unauthorised" }';

    /**
     * Constructor for CBookAPI class.
     *
     * @param string $apiClientKey API Key used for authentication.
     * @param string $apiClientSecret Secret Key used when authenticating.
     */
    public function __construct(string $apiClientKey, string $apiClientSecret) {
        $this->_apiClientKey = $apiClientKey;
        $this->_apiClientSecret = $apiClientSecret;
    }

    /**
     * Get a JSON String of CBook Friends
     *
     * @return string JSON Data from mocked API.
     */
    public function getFriends() {
        if ($this->_apiClientKey !== '8XWr1Hp5xbhSM6u0') {
            return json_decode($this->_unauthorisedString);
        }

        if ($this->_apiClientSecret !== '07xdHM9OA8ULaBeC') {
            return json_decode($this->_unauthorisedString);
        }

        return json_decode(file_get_contents(__DIR__ . "/data/cbook.json"));
    }
}
