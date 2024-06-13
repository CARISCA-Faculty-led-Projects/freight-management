<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewOrganisations extends Component
{
    public function render()
    {
        return view('organization.overview')->extends('layout.app')->section('content');
    }
}
