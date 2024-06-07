<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $nama;
    public $route;
    public $type;
    public function __construct($id = null, $nama = null, $route = null, $type = null)
    {
        //
        $this->id = $id;
        $this->nama = $nama;
        $this->route = $route;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
