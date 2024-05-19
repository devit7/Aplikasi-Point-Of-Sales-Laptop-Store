<?php

namespace App\View\Components\admin;

use Illuminate\View\Component;

class modal_hapus_supplier extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.modal_hapus_supplier');
    }
}
