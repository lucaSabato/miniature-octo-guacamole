<?php

/**
 * This Class is used for normalising the result of the LgramAPI.
 */

class LgramWrapper implements APIWrapper
{
    public LgramAPI $lgram;

    /**
     * Constructor of the Wrapper Class
     *
     * @param string $apiClientKey Client Key used for authentication
     * @param string $apiClientSecret Client Secret used for authentication
     */
    public function __construct(string $apiClientKey, string $apiClientSecret)
    {
        $this->lgram = new LgramAPI($apiClientKey, $apiClientSecret);
    }

    /**
     * Thi method convert the result from the LgramAPI in a AssociateGroup Object.
     *
     * @return AssociateGroup
     */
    public function normalise(): AssociateGroup
    {
        $assiociates = [];
        foreach ($this->lgram->getBuddies() as $key => $array) {
            $label = ucfirst($key);
            foreach ($array as $result) {
                $assiociates[] = new Associate(
                    $result->buddy_name,
                    $result->buddy_image,
                    $result->buddy_bio,
                    $result->buddies_count,
                    $result->email
                );
            }
        }

        return new AssociateGroup($label, $assiociates);
    }
}
