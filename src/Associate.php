<?php

/**
 * This class is used to represent a standard associate.
 */

class Associate
{
    /**
     * The name of the Associate
     *
     * @var string
     */
    public $name;

    /**
     * The image representing the Associate
     *
     * @var string
     */
    public $photo;

    /**
     * A short description of the Associate
     *
     * @var string
     */
    public $description;

    /**
     * The number of other Associate connected to the Associate
     *
     * @var int
     */
    public $count;

    /**
     * The email of the Associate
     *
     * @var string
     */
    public $email;

    /**
     * Constructor for Associate class.
     *
     * @param string $name The name of the Associate
     * @param string $photo The image representing the Associate
     * @param string $description A short description of the Associate
     * @param int $count The number of other Associate connected to the Associate
     * @param string $email The email of the Associate
     */
    public function __construct($name, $photo, $description, $count, $email)
    {
        $this->name = $name;
        $this->photo = $photo;
        $this->description = $description;
        $this->count = $count;
        $this->email = $email;
    }
}
