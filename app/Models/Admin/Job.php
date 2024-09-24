<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
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

    public function getGenderStatusAttribute()
    {
        switch ($this->gender) {
            case 0:
                echo "فرقی ندارد";
                break;
            case 2:
               echo "خانوم";
                break;
            case 1:
               echo "مرد";
                break;
        }
    }

    protected $fillable = ["address", "company_or_shop_name", "description", "phone", "title", "rights", "slug", "published_at", "status", "advantages", "gender", "admin_id", "user_id"];
    protected $casts = ["phone" => "array", "advantages" => "array"];
}
