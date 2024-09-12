<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use PHPUnit\Framework\Attributes\DependsOnClassUsingShallowClone;

class NavBar extends Component
{


    #[On('AddToCart')]
    public function ResetThisCoppent()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.nav-bar');
    }
}
