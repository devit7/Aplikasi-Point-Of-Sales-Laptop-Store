<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modals_transaksi extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $totalAll;

    public function __construct($totalAll = null)
    {
        $this->totalAll = $totalAll;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals_transaksi');
    }
}
