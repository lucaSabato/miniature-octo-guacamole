<?php

interface APIWrapper
{
    /**
     * This Method is used for normalise/convert an API Result in a AsscosiateGroup object.
     * @return AssociateGroup
     */
    public function normalise(): AssociateGroup;
}
