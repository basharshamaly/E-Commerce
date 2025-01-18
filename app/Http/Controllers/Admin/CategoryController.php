<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use \Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{


    public function catSubCatList(Request $request)
    {
        $data = [
            'PageTitle' => 'category && subcategory list',
        ];

        return view('back.pages.admin.cats-subcats-list', $data);
    }
    public function addCategory(Request $request, $id = null)
    {
        $categories = $id ? Category::find($id) : null; // Load category if ID is provided

        $data = [
            'title' => 'page create category',
            'categories' => $categories

        ];

        return view('back.pages.admin.add-category', $data);
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:5|unique:categories,category_name',
            'category_image' => 'required|image|mimes:png,jpg,svg,jpeg',
        ], [
            'category_name.required' => ':Attribute must be required',
            'category_name.min' => ':Attribute must be at least 5 characters',
            'category_name.unique' => ':Attribute must be unique dont apper most one time',
            'category_image.required' => ':Attribute must be required',
            'category_image.image' => ':Attribute must be image',
            'category_image.mimes' => ':Attribute must be image from type png,jpg,jpeg,svg',
        ]);

        if ($request->hasFile('category_image')) {
            $path = '/images/categories';
            $file = $request->file('category_image');
            $filename = time() . '_' . $file->getClientOriginalName();

            // إنشاء المجلد إذا لم يكن موجودًا
            if (!File::exists(public_path($path))) {
                File::makeDirectory(public_path($path), 0777, true);
            }

            // نقل الملف
            $upload = $file->move(public_path($path), $filename);
            if ($upload) {
                // إنشاء الكائن وتخزين البيانات
                $categories = new Category();
                $categories->category_name = $request->input('category_name');
                $categories->category_image = $filename;

                if ($categories->save()) {
                    return redirect()->route('admin.category.add-category')
                        ->with('success', 'Category <b>' . ucfirst($request->category_name) . '</b> added successfully');
                }
            }
        }

        return redirect()->route('admin.category.add-category')
            ->with('fail', 'Failed to add the category. Please try again.');
    }

    public function editCategory(Request $request, $id)
    {

        $categories = Category::findOrFail($id);

        return view('back.pages.admin.edit-category', compact('categories'));
    }

    public function updateCategory(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        $request->validate([
            'category_name' => 'required|min:5|unique:categories,category_name',
            'category_image' => 'required|image|mimes:png,jpg,svg,jpeg',
        ], [
            'category_name.required' => ':Attribute must be required',
            'category_name.min' => ':Attribute must be at least 5 characters',
            'category_name.unique' => ':Attribute must be unique dont apper most one time',
            'category_image.required' => ':Attribute must be required',
            'category_image.image' => ':Attribute must be image',
            'category_image.mimes' => ':Attribute must be image from type png,jpg,jpeg,svg',
        ]);
        if ($request->hasFile('category_image')) {
            $path = '/images/categories/';
            $file = $request->file('category_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $old_category_image = $categories->category_image;
            $upload = $file->move(public_path($path), $filename);
            if ($upload) {
                if (File::exists(public_path($path . $old_category_image))) {
                    File::delete(public_path($path . $old_category_image));
                }
                $categories->category_image = $filename; // تحديث الصورة الجديدة

                $categories->category_name = $request->category_name;
                $categories->category_slug = null;
                $save = $categories->save();
                if ($save) {
                    return redirect()->route('admin.category.edit-category', $categories->id)->with('success updated', '<b>' . ucfirst($request->category_name) . '</b>' . 'succefuly');
                } else {
                    return redirect()->route('admin.category.edit-category', $categories->id)->with('fail', 'somthing worng.....');
                }
            } else {
                return redirect()->route('admin.category.edit-category', $categories->id)->with('fail', 'somthing worng.....');
            }
        } else {
            $categories->category_name = $request->category_name;
            $categories->category_slug = null;
            $save = $categories->save();
            if ($save) {
                return redirect()->route('admin.category.edit-category', $categories->id)->with('success updated', '<b>' . ucfirst($request->category_name) . '</b>' . 'succefuly');
            } else {
                return redirect()->route('admin.category.edit-category', $categories->id)->with('fail', 'somthing worng.....');
            }
        }
    }

    public function addSubCategory(Request $request)
    {
        $categories = Category::all();
        $independent_subcategory = SubCategory::where('Is_Child_Category', 0)->get();

        $data = [
            'categories' => $categories,
            'subcategories' => $independent_subcategory,
        ];

        return view('back.pages.admin.add-subcategory', $data);
    }

    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'parent_category' => 'required|exists:categories,id',
            'subcategory_name' => 'required|min:5|unique:sub_categories,subcategory_name',
        ], [
            'subcategory_name.required' => 'The subcategory name is required.',
            'subcategory_name.min' => 'The subcategory name must be at least 5 characters.',
            'subcategory_name.unique' => 'The subcategory name must be unique.',
            'category_id.required' => 'The parent category is required.',
            'category_id.exists' => 'The selected category must exist in the categories table.',
        ]);

        $subcategories = new SubCategory();
        $subcategories->category_id = $request->parent_category;
        $subcategories->subcategory_name = $request->subcategory_name;
        $subcategories->Is_Child_Category = $request->is_child_of == 0 ? 0 : $request->is_child_of;

        if ($subcategories->save()) {
            return redirect()->route('admin.category.add-subcategory')
                ->with('success', '<b>' . ucfirst($request->subcategory_name) . '</b> successfully added as a subcategory.');
        } else {
            return redirect()->route('admin.category.add-subcategory')
                ->with('fail', 'Failed to add <b>' . ucfirst($request->subcategory_name) . '</b> as a subcategory.');
        }
    }
}
