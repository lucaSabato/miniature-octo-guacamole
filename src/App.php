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

    /**
     * Constructor for App Class.
     *
     * @param string $apiClientKey API Key used for authentication.
     * @param string $apiClientSecret Secret Key used when authenticating.
     * @param string $apiKey API Key used for authentication.
     */
    public function __construct(string $apiClientKey, string $apiClientSecret, string $apiKey)
    {
        $this->_apiClientKey = $apiClientKey;
        $this->_apiClientSecret = $apiClientSecret;
        $this->_apiKey = $apiKey;

        $cbook = new CBookAPI($this->_apiClientKey, $this->_apiClientSecret);
        $this->friends = $cbook->getFriends();

        $critter =  new CritterAPI($this->_apiKey);
        $this->followers = $critter->getFollowers();
    }

    /**
     * Render the page.
     *
     * @return void
     *
     */
    public function render()
    {
        echo "<p>it Works!</p>"
    }
}
