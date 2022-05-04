<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use App\Models\AdminUser;

class CreateUserForm extends Component

{
    use WithFileUploads;
    public $name;
    public $email;
    public $job_title;
    public $image;
    public $user;


    public function create()
    {
        return view('admin.create');
    }

    public function store()
    {
        $data = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'job_title' => 'required',
            'image' => 'required|image|max:1024|mimes:jpeg,jpg,png',
        ]);

        $image = $this->image->store('uploads', 's3');

        $data['image'] = $image;
        
        AdminUser::create($data);

        $this->dispatchBrowserEvent('created');

    }


    public function render()
    {
        return view('livewire.create-user-form');
    }
}
