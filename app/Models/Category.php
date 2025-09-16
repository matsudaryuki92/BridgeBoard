<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sort_order',
        'slug'
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_deleted_category', 'category_id', 'admin_id');
    }
}
