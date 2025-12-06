<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableSortableHeader extends Component
{
    public $label;
    public $sortField;

    public function __construct($label, $sortField)
    {
        $this->label = $label;
        $this->sortField = $sortField;
    }

    public function render()
    {
        return view('components.table-sortable-header');
    }
}
