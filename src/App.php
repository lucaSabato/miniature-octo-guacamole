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
        $this->renderAssiociates($this->normaliseAssiociates($this->friends));
        echo '<br/><br/>';
        $this->renderAssiociates($this->normaliseAssiociates($this->followers));
    }

    /**
     * The function normalise the result from the API request
     *
     * @param ojbect $apiresults
     * @return object
     */
    public function normaliseAssiociates($apiresults)
    {
        $assiociates = [];
        foreach ($apiresults as $array) {
            foreach ($array as $result) {
                $assiociate = new stdClass();
                if (isset($result->name)) {
                    $assiociate->name = $result->name;
                    $assiociate->photo = $result->photo;
                    $assiociate->description = $result->description;
                    $assiociate->email = $result->email;
                    $assiociate->count = $result->follower_count;
                } else {
                    $assiociate->name = $result->friend_name;
                    $assiociate->photo = $result->friend_image;
                    $assiociate->description = $result->friend_bio;
                    $assiociate->email = $result->email;
                    $assiociate->count = $result->number_of_friends;
                }

                $assiociates[] = $assiociate;
            }
        }
        return $assiociates;
    }

    /**
     * Render the friend using a list-group.
     *
     * @param object $assiociates Object that contains Followers or Friends
     * @return void
     *
     */
    public function renderAssiociates($associates)
    {
        $html = '<div class="list-group">';

        foreach ($associates as $associate) {
            $html .= '<span class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">';
            $html .= '<img src="' . $associate->photo . '" alt="" width="100" height="100" class="rounded-circle flex-shrink-0">';
            $html .= '<div class="d-flex gap-2 w-100 justify-content-between">';
            $html .= '<div>';
            $html .= '<h6 class="mb-0">' . $associate->name . '</h6>';
            $html .= '<p class="mb-0 opacity-75">' . $associate->description . '</p>';
            $html .= '<p class="mb-0 opacity-75"><a href="' . $associate->email . '">' . $associate->email . ' </a></p>';
            $html .= '</div>';
            $html .= '<small class="opacity-50 text-nowrap">' . $associate->count . '</small>';
            $html .= '</div>';
            $html .= '</span>';
        }

        $html .= '</div>';

        echo $html;
    }
}
