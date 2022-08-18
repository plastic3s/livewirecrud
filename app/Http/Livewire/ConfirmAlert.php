<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ConfirmAlert extends Component
{
    /**
     * User Id
     *
     * @var [inf]
     */
    public $userId;

    /**
     * Render the confirm-alert button
     * @return view
     * @author Rashid Ali <realrashid05@gmail.com>
     */
    public function render()
    {
        return view('livewire.confirm-alert');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @author Rashid Ali <realrashid05@gmail.com>
     */
    public function destroy($userId)
    {
        User::find($userId)->delete();
    }
}
