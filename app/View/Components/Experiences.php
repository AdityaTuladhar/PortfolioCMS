<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Experiences extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $experiences = [];

    public function __construct($experiences)
    {
        $this->experiences = $experiences;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.experiences');
    }
}
