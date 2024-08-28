<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;   
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
class Profile extends Component
{
    use WithFileUploads;

	
#[Validate('required|min:3')] 
    public $gmail;
#[Validate('required|min:5')]
    public $name;
	#[Validate('required|min:3')]
    public $password;
    
  #[Validate('image')]	
    public $image;
    public function update()
    {
        $validator= $this->validate();
        $user = User::find(auth()->user()->id);
        $user->email = $this->gmail;
        $user->name = $this->name;
        $user->password = Hash::make($this->password);
        $user->note = $this->password;
        if($this->image)
        {
		//dd($this->image);
            $validator['image'] = $this->image->store('upload','public');
            $user->avatar_url = 'storage/'. $validator['image'];
        };
        $user->save();
        //dd($user->avatar_url);
        $this->reset();
    }

    public function delete()
    {
        $user = User::find(auth()->user()->id);
        $user->delete();
        return redirect()->route('Home');
    }
    public function render()
    {
        return view('livewire.profile');
    }
}
