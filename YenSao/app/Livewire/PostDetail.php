<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Parsedown;

class PostDetail extends Component
{

    public $post;

    public function mount($id)
    {
        $this->post = Post::find($id); 
        $parsedown = new Parsedown();
        $this->post->content = $parsedown->text($this->post->content);
    }
    public function render()
    {
        return view('livewire.post-detail');
    }
}
