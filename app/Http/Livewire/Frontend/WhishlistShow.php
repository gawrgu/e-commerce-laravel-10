<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Whislist;
use Livewire\Component;

class WhishlistShow extends Component
{
    public function removeWishlistItem(Int $whishlistId)
    {
        Whislist::where('user_id', auth()->user()->id)->where('id', $whishlistId)->delete();
        $this->emit('whislistAddedUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'whishlist has been deleted',
            'type' => 'success',
            'detail' => 200
        ]);
    }

    public function render()
    {
        $whishlist = Whislist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.whishlist-show', compact('whishlist'));
    }
}
