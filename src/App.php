<?php

class App
{
    /**
     * Critter API Key used for authentication.
     *
     * @var string
     */
    private $_apiKey;

    /**
     * CBook API Client Key used for authentication.
     *
     * @var string
     */
    private $_apiClientKey;

    /**
     * CBook Secret Key used for authentication.
     *
     * @var string
     */
    private $_apiClientSecret;

    /**
     * CBook Friends
     *
     * @var array
     */
    public $friends;

    /**
     * Critter Followers
     *
     * @var array
     */
    public $followers;

    public function __construct(string $apiClientKey, string $apiClientSecret, string $apiKey)
    {
        $this->_apiClientKey = $apiClientKey;
        $this->_apiClientSecret = $apiClientSecret;
        $this->_apiKey = $apiKey;
    }

    /**
     * Render the page.
     *
     * @return void
     *
     */
    public function render()
    {
        echo('It workds!');
    }
}
