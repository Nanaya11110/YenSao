<?php

namespace App\Livewire;

use App\Mail\FirstMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
class Contact extends Component
{

    public $name;
    public $content;
    public $email;
    public function SendEmail()
    {
       $data['title'] = $this->name;
       $data['content'] = $this->content;
       $data['email'] = $this->email;
       Mail::to(users: 'hieupront4560@gmail.com')->send(new FirstMail($data));
       $this->reset();
       $this->dispatch('SendEmail');
    }
    public function render()
    {
        return view('livewire.contact');
    }
}
