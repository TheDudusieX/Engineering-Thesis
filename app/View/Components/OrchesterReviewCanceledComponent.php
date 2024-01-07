<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OrchesterReviewCanceledComponent extends Component
{
    public $review;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($review)
    {
        $this->review = $review;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.orchester-review-canceled-component');
    }
}
