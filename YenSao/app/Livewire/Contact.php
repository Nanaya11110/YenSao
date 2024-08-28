<?php

namespace App\Livewire;

use App\Mail\FirstMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{

    public $name;
    public $content;
    public $email;
    public function SendEmail()
    {
       $data['name'] = $this->name;
       $data['content'] = $this->content;
       $data['email'] = $this->email;
       Mail::to('hieupront4560@gmail.com')->send(new FirstMail($data));
    }
    public function render()
    {
        return view('livewire.contact');
    }
}
