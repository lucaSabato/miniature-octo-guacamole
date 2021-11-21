<?php

/**
 * This Class is used for grouping associates, contain also a label that identify them.
 */
class AssociateGroup
{
    /**
     * Label used to identify the Associate Group
     *
     * @var string
     */
    public string $label;

    /**
     * Array of Associate component of the group.
     *
     * @var Associate[]
     */
    public $associates = [];

    /**
     * @param string $label Label identify the type of associates
     * @param Associate[] $associates Array of Associates component of the group.
     */
    public function __construct(string $label, $associates)
    {
        $this->label = $label;
        $this->associates = $associates;
    }
}
