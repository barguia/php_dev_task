<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $style;
    public $message;

    public function __construct($style = "", $message = "")
    {
        $this->style = $style ?? '';
        $this->mensagem = $message ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }

    public function boot()
    {
        Blade::component('alert', Alert::class);
    }
}
