<?php

//get croategores frontend -->

use App\Models\Category;
use App\Models\Seller;
use App\Models\SocialNetwork;
use App\Models\SubCategory;

if (! function_exists("get_categories")) {
    function get_categories()
    {
        return Category::with('subcategories')->orderBy('ordering', 'ASC')->get();
    }
}
if (! function_exists("get_subcategories")) {
    function get_subcategories()
    {
        return SubCategory::with('childSubCategory', 'category')->orderBy('ordering', 'ASC')->get();
    }
}


if (! function_exists('get_social_networks')) {
    function get_social_networks()
    {
        return SocialNetwork::all();
    }
}
if (! function_exists('get_Profile_Seller')) {
    function get_Profile_Seller()
    {
        return Seller::all();
    }
}
