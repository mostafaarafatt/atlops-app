<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Categories\Entities\Category;
use Modules\Categories\Entities\Service;
use Modules\Categories\Entities\SubCategory;
use Modules\Countries\Entities\CityTranslation;
use Modules\Countries\Entities\Country;

class CategoriesController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        return view('frontend.categories.categories', compact('categories'));
    }

    public function orderDetails($id)
    {
        $category = Category::find($id);
        //return $category;
        $subCategory = SubCategory::where('category_id', $id)->get();
        //return $category;
        $serviceCategory = Service::where('category_id', $id)->get();
        //return $serviceCategory;
        $countries = Country::all();
        //return $country;

        return view('frontend.orders.createOrder', compact('category', 'subCategory', 'serviceCategory', 'countries'));
    }

    public function gettowns($id)
    {
        $country = Country::find($id);
        
        $cites=$country?->cities?->pluck("name" , "id")?->toArray();
        
        return json_encode($cites);
    }


    //dashboard work methods
    /////////////////////////////////////////////////////////////////////////////////////////
    public function dashIndex()
    {
        $categories = Category::all();
        return view('dashboard.categories.categories', compact('categories'));
    }

    public function addCategory()
    {
        return view('dashboard.categories.addcategory');
    }

    public function addCategoryDone(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5048',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            if ($request->file('image')->getSize() < (5 * 1024 * 1024)) {
                $image_name = $request->image->getClientOriginalName();
                $image = $image_name;
                $file = $request->image->move(public_path('images/'), $image_name);
            }
        }

        $category = Category::create([
            'category_name' => $request->category_name,
            'category_image' => $image
        ]);

        return redirect()->route('index.category');
    }

    public function editCategory($id)
    {
        $category = Category::where('id', $id)->first();
        //return $category;
        return view('dashboard.categories.editcategory', compact('category'));
    }

    public function editCategorydone(Request $request, $id)
    {

        $category = Category::find($id);
        $category_image = $category->category_image;

        if ($request->hasFile('category_image')) {
            $filename = public_path('images' . $category_image);
            if (file_exists($filename)) {
                unlink($filename);
            }
            $image_name = $request->file('category_image')->getClientOriginalName();
            $file = $request->category_image->move(public_path('Attachments/' . 'user'), $image_name);
            $category->category_image = $image_name;
            $category->save();
        }

        $category->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('index.category');
    }

    public function deleteCategory(Request $request)
    {
        Category::where('id', $request->id_category)->delete();
        return back();
    }
}
