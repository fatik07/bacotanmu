<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ALink extends Component
{
    public $url;
    public $color;

    /**
     * Create a new component instance.
     */
    public function __construct($url = '', $color = 'bg-gray-800 text-white hover:bg-gray-700')
    {
        $this->url = $url;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.a-link');
    }
}
