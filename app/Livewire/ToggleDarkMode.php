<?php

namespace App\Livewire;

use Livewire\Component;

class ToggleDarkMode extends Component
{
    public $isdarkMode = false;
    public function mount()
    {
        $this->isdarkMode = session()->get('darkMode', false);
    }
    public function darkmode()
    {
        $this->isdarkMode = !$this->isdarkMode;
        session()->put('darkMode', $this->isdarkMode);
    }
    public function render()
    {
        return view('livewire.toggle-dark-mode');
    }
}
