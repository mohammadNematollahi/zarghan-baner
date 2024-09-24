<?php

namespace App\Http\Livewire\Admin\CheckArticle\Market;

use App\Models\Admin\Market;
use Livewire\Component;
use App\Services\Image\ImageService;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public $company_or_shop_name;
    public $address;
    public $description;
    public $phone = [];
    public $image;
    public $images = [];
    public $imagePath ;
    public $imagesPath = [] ;
    public $status = "0";
    public $commentable = "0";

    protected $rules = [
        "company_or_shop_name" => "required|not_regex:/[;.\/'\":?!-_)(*&^%$#@~`+×÷><=]/|max:150",
        "address" => "required|address",
        "description" => "required|not_regex:/[;-_&^%$#~`+×÷]/",
        "phone.0" => "required|iran_mobile",
        "phone.*" => "nullable|iran_mobile",
        "status" => "required|in:0,1",
        "commentable" => "required|in:0,1",
        "image" => "required|image|mimes:jpg,png,pjp,jfif,svg",
        "images.*" => "nullable|image|mimes:jpg,png,pjp,jfif,svg|max:6144"
    ];

    public function render()
    {
        return view('livewire.admin.check-article.market.create');
    }

    public function destoryImage($index)
    {
        ImageService::deleteImage($this->imagesPath[$index]);
        unset($this->images[$index]);
        unset($this->imagesPath[$index]);

        $currentImages = $this->images;
        $currentImagesPath = $this->imagesPath;
        $count = count($currentImages);

        for($i = 0 ; $i <= $count ; $i++)
        {
            unset($this->images[$i]);
            unset($this->imagesPath[$i]);
        }
        
        $this->images = array_merge($this->images , $currentImages);
        $this->imagesPath = array_merge($this->imagesPath , $currentImagesPath);
    }

    public function updated($name , $value)
    {
        $this->validateOnly($name);
        $accessImages = ["images.0" , "images.1" , "images.2" , "images.3"];

        if($name == "image"){
            ImageService::setExclusiveDirectory("image" . DIRECTORY_SEPARATOR . "market" . DIRECTORY_SEPARATOR ."main-image");
            $imagePath = ImageService::resizeAndSave($value, 700 , 500 );
            $oldPath = !empty($this->imagePath) ? $this->imagePath : null;
            $this->imagePath = $imagePath;
            ImageService::deleteImage($oldPath);
        }else if(in_array($name , $accessImages)){
            $index = explode("." , $name)[1];
            ImageService::setExclusiveDirectory("image" . DIRECTORY_SEPARATOR . "market" . DIRECTORY_SEPARATOR ."gallery");
            $oldPath = !empty($this->imagesPath[$index]) ? $this->imagesPath[$index] : null;
            $imagePath = ImageService::resizeAndSave($value, 700 , 500 );
            $this->imagesPath[$index] = $imagePath;
            ImageService::deleteImage($oldPath);
        }
    }



    public function store()
    {
        $this->validate();
        $inputs = $this->all();
        $inputs["image"] = $this->imagePath;
        $inputs["images"] = $this->imagesPath;
        $inputs["admin_id"] = auth()->user()->id;
        Market::create($inputs);
        return redirect()->route("admin.check.article.market.index");
    }
}
