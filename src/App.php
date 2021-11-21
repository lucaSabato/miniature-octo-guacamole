<?php

/**
 * This Class is used for rendering in html the array of AssociateGroup generated from different API.
 */

class App
{
    /**
     * Array of AssiocateGroup.
     * @var AssiocateGroup[]
     */
    public $associateGroups = [];

    /**
     * Constructor for App Class.
     *
     * @param AssiocateGroup[] $associateGroups Array of AssociateGroup.
     */
    public function __construct($associateGroups)
    {
        $this->associateGroups = $associateGroups;
    }
    /**
     * Convert the AssociateGroups array in formatted html.
     *
     * @return void
     *
     */
    public function render()
    {
        $html = '';
        foreach ($this->associateGroups as $associateGroup) {
            $html .= '<div class="card mb-3"><div class="card-header"><h3 class="card-title">' . $associateGroup->label . '</h3></div>';
            $html .= '<div class="list-group">';

            foreach ($associateGroup->associates as $associate) {
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
            $html .= '</div>';
        }

        echo $html;
    }
}
