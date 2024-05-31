<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'status', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function getFullNameAttribute()
    {
        if ($this->parent) {
            return $this->parent->full_name . ' -> ' . $this->name;
        }
        return $this->name;
    }
}
