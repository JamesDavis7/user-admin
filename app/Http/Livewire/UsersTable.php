<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AdminUser;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class UsersTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $perPage = 5;
    public $search = '';

    protected $listeners = ['delete'];
    
    public function index()
    {
        $users = AdminUser::all();
        return view('admin.home', compact('users'));
    }
    
    public function deleteConfirm($id){
        $this->dispatchBrowserEvent('confirm', [
            'id' => $id
        ]);
    }
    
    public function delete($id){
        $user = AdminUser::find($id);
        Storage::disk('s3')->delete($user->image);
        $user->delete();

        $this->dispatchBrowserEvent('deleted');
    }

    public function render()
    {
        $users = AdminUser::search('name', $this->search)->orderBy('id', 'desc')->paginate($this->perPage);
        return view('livewire.users-table', compact('users'));
    }

}
