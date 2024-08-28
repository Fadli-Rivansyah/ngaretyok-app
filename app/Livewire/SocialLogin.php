<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class SocialLogin extends Component
{
    public $text;

    public function redirectToGoogle()
    {
        return redirect()->to('/auth/google');
    }
    
    public function render()
    {
        return view('livewire.social-login', [
            // 'text' => $text
        ]);
    }
}
