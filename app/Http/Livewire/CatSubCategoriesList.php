<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class CatSubCategoriesList extends Component
{

    protected $listeners = [
        'updateCategoriesOrdering',
        'deleteCategories',
    ];

    public function deleteCategories($category_id)
    {
        $categories = Category::FindOrFail($category_id);
        $path = '/images/categories/';
        $category_image = $categories->category_image;

        if (File::exists(public_path($path . $category_image))) {
            File::delete(public_path($path . $category_image));
        }
        $delete = $categories->delete();
        if ($delete) {
            $this->showToastr('success', 'Successfully deleted category');
        } else {
            $this->showToastr('fail', 'Failed to delete category');
        }
    }

    public function updateCategoriesOrdering($positions)
    {


        foreach ($positions as $position) {
            $index = $position[0];
            $newposition = $position[1];
            Category::where('id', $index)->update([
                'ordering' => $newposition,
            ]);
        }
        $this->showToastr('success', 'ordering categories succefuly');
    }

    public function showToastr($type, $message)
    {
        $this->dispatchBrowserEvent('toastr', ['type' => $type, 'message' => $message]);
    }

    public function render()
    {
        return view('livewire.cat-sub-categories-list', [
            'categories' => Category::orderBy('ordering', 'asc')->get(),
            'subcategories'=>SubCategory::orderBy('ordering','asc')->get(),
        ]);
    }
}