<?php

/**
 * This Class is used for normalising the result of the CritterAPI.
 */

class CritterWrapper implements APIWrapper
{
    public CritterAPI $critter;

    /**
     * Constructor of the Wrapper Class
     *
     * @param string $apiKey Key used for authentication
     */
    public function __construct(string $apiKey)
    {
        $this->critter = new CritterAPI($apiKey);
    }

    /**
     * Thi method convert the result from the CritterAPI in a AssociateGroup Object.
     *
     * @return AssociateGroup
     */
    public function normalise(): AssociateGroup
    {
        $assiociates = [];
        foreach ($this->critter->getFollowers() as $key => $array) {
            $label = ucfirst($key);
            foreach ($array as $result) {
                $assiociates[] = new Associate(
                    $result->name,
                    $result->photo,
                    $result->description,
                    $result->follower_count,
                    $result->email
                );
            }
        }

        return new AssociateGroup($label, $assiociates);
    }
}
