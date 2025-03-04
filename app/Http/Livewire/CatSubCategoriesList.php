<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class CatSubCategoriesList extends Component
{

    use WithPagination;
    public $categoryperpage = 5;
    public $subcategoryperpage = 3;
    protected $listeners = [
        'updateCategoriesOrdering',
        'deleteCategories',
        'updateSubCategoriesOrdering',
        'updateChildSubCategoriesOrdering',
        'deleteSubCategory',

    ];

    public function deleteCategories($category_id)
    {
        $categories = Category::FindOrFail($category_id);

        //check if category has subcategory


        if ($categories->subcategories->count() > 0) {
            foreach ($categories->subcategories as $subcategory) {
                $subcategories = SubCategory::FindOrFail($subcategory->id);

                $subcategories->delete();
            }
        }
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
    public function updateChildSubCategoriesOrdering($positions)
    {


        foreach ($positions as $position) {
            $index = $position[0];
            $newposition = $position[1];
            SubCategory::where('id', $index)->update([
                'ordering' => $newposition,
            ]);
        }
        $this->showToastr('success', 'ordering ChildSubCategoriesOrdering  succefuly');
    }
    public function updateSubCategoriesOrdering($positions)
    {


        foreach ($positions as $position) {
            $index = $position[0];
            $newposition = $position[1];
            SubCategory::where('id', $index)->update([
                'ordering' => $newposition,
            ]);
        }
        $this->showToastr('success', 'ordering subcategories succefuly');
    }

    public function deleteSubCategory($subcategory_id)
    {
        $subcategories = SubCategory::findOrFail($subcategory_id);
        //when this sub categories has child subcategories
        if ($subcategories->childSubCategory->count() > 0) {
            //check is there is product(s) related to one of child subcategories


            //if no product(s) related to child subcategories
            foreach ($subcategories->childSubCategory as $child) {
                SubCategory::where('id', $child->id)->delete();
            }
            //delete sub categories

            $subcategories->delete();
            $this->showToastr('success', 'delete sub categories successfully');
        } else {
            //check if this sub category has product(s) related to it


            //delete sub categories

            $subcategories->delete();
            $this->showToastr('success', 'delete sub categories successfully');
        }
    }

    public function showToastr($type, $message)
    {
        $this->dispatchBrowserEvent('toastr', ['type' => $type, 'message' => $message]);
    }

    public function render()
    {
        return view('livewire.cat-sub-categories-list', [
            'categories' => Category::orderBy('ordering', 'asc')->paginate($this->categoryperpage, ['*'], 'categoryperpage'),
            'subcategories' => SubCategory::where('Is_Child_Category', 0)->orderBy('ordering', 'asc')->paginate($this->subcategoryperpage, ['*'], 'subcategoryperpage'),
        ]);
    }
}