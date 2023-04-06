<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class Index extends Component
{

    public $category_id;
    public function deleteCategory($category_id)
    {
        dd($category_id);
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        $path = 'storage/uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        session()->flash('success', 'Category has been deleted');
        return redirect('livewire.admin.category.index');
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(1);
        return view('livewire.admin.category.index', compact('categories'));
    }
}
