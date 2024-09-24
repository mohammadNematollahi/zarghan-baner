<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Market extends Model
{
    use HasFactory , SoftDeletes ,  Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'company_or_shop_name'
            ]
        ];
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ["address" , "company_or_shop_name" , "description" ,  "phone" , "images" , "image" , "slug" ,"published_at" , "status" , "commentable" , "admin_id" , "user_id"];
    protected $casts = ["phone" => "array" , "images" => "array"];
}
