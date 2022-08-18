<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public $users, $name, $email, $user_id, $password;
    //public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }

    public function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->resetValidation();
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create($validatedData);

        $this->alertSuccess();
        $this->resetInputFields();

        $this->emit('actionSuccess'); // Close model to using to jquery
    }

    public function edit($id)
    {
        //$this->updateMode = true;
        $user = User::where('id',$id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;

        $this->resetValidation();
    }

    public function cancel()
    {
        //$this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user_id,
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            //$this->updateMode = false;

            $this->alertUpdateSuccess();
            $this->resetInputFields();

            $this->emit('actionSuccess'); // Close model to using to jquery
        }
    }

    public function delete($id)
    {
        if($id){
            User::find($id)->delete();
            $this->alertRemove();
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertSuccess()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'User Created Successfully!',
            'text' => 'It will list on users table soon.'
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertUpdateSuccess()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'User Updated Successfully!',
            'text' => 'It will list on users table soon.'
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!',
            'userId' => $id
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertCancel()
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'Operation Cancelled!',
//            'text' => 'It will list on users table soon.'
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertRemove()
    {
        /* Write Delete Logic */
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'message' => 'User Delete Successfully!',
            'text' => 'It will not list on users table soon.'
        ]);
    }
}
