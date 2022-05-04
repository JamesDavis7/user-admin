<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AdminUser;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditUserForm extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $job_title;
    public $image;

    public function mount($user){
        $this->user = null;

        if($user){
            $this->user = $user;
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->job_title = $this->user->job_title;
            $this->image = $this->user->image;
        }
    }

    public function update(){

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'job_title' => 'required',
            'image' => 'required|image|max:1024|mimes:jpeg,jpg,png',
        ];

        $this->validate($rules);

        $user = [
            'name' => $this->name,
            'email' => $this->email,
            'job_title' => $this->job_title,
        ];

        if($this->image){
            $user['image'] = $this->image->store('uploads', 's3');
        }

        $this->handleImageUpload($user);

        AdminUser::find($this->user->id)->update($user);

        $this->dispatchBrowserEvent('updated');
    }

    public function render()
    {
        return view('livewire.edit-user-form');
    }

    private function handleImageUpload($user){
        
        if($user['image']){
            Storage::disk('s3')->delete($this->user->image);
        }
        
        AdminUser::find($this->user->id)->update($user);
    }
}
