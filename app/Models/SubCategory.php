<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class SubCategory extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'sub_categories';

    protected $fillable = [
        'category_id',
        'subcategory_name',

        'Is_Child_Category',
        'subcategory_slug',
        'ordering',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'subcategory_slug' => [
                'source' => 'subcategory_name'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function childSubCategory()
    {
        return $this->hasMany(SubCategory::class, 'Is_Child_Category', 'id');
    }
}
