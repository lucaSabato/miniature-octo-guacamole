<?php

/**
 * This Class is used for normalising the result of the CBookAPI.
 */

class CBookWrapper implements APIWrapper
{
    /**
     * CBookAPI object
     *
     * @var CBookAPI
     */
    public CBookAPI $cbook;

    /**
     * Constructor of the Wrapper Class
     *
     * @param string $apiClientKey Client Key used for authentication
     * @param string $apiClientSecret Client Secret used for authentication
     */
    public function __construct(string $apiClientKey, string $apiClientSecret)
    {
        $this->cbook = new CBookAPI($apiClientKey, $apiClientSecret);
    }

    /**
     * Thi method convert the result from the CBookAPI in a AssociateGroup Object.
     *
     * @return AssociateGroup
     */
    public function normalise(): AssociateGroup
    {
        $assiociates = [];
        foreach ($this->cbook->getFriends() as $key => $array) {
            $label = ucfirst($key);
            foreach ($array as $result) {
                $assiociates[] = new Associate(
                    $result->friend_name,
                    $result->friend_image,
                    $result->friend_bio,
                    $result->number_of_friends,
                    $result->email
                );
            }
        }

        return new AssociateGroup($label, $assiociates);
    }
}
