<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Whislist;
use Illuminate\Support\Facades\Auth;

class WhislistCount extends Component
{
    public $whislistCount;
    protected $listeners = ['whislistAddedUpdated' => 'checkWhislistCount'];
    public function checkWhislistCount()
    {
        if (Auth::check()) {
            return $this->whislistCount = Whislist::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->whislistCount = 0;
        }
    }
    public function render()
    {
        $this->whislistCount = $this->checkWhislistCount();
        return view('livewire.frontend.whislist-count', [
            'whislistCount' => $this->whislistCount
        ]);
    }
}
