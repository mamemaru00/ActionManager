<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datetime extends Component
{
    public $datetime;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($datetime)
    {
        $this->datetime = date('Y年m月d日', strtotime($datetime));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datetime');
    }
}
