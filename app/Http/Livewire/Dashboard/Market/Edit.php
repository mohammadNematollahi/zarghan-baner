<?php

namespace App\Http\Livewire\Dashboard\Market;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\Image\ImageService;

class Edit extends Component
{
    use WithFileUploads;
    public $market;
    public $image;
    public $imagePath;
    public $images = [];
    public $imagesPath = [];

    protected $rules = [
        "market.company_or_shop_name" => "required|not_regex:/[;.\/'\":?!-_)(*&^%$#@~`+×÷><=]/|max:150",
        "market.address" => "required|address|max:250",
        "market.description" => "required|not_regex:/[;-_&^%$#~`+×÷]/",
        "market.phone.0" => "required|iran_mobile",
        "market.phone.*" => "nullable|iran_mobile",
        "market.status" => "required|in:0,1",
        "market.commentable" => "required|in:0,1"
    ];
    public function mount()
    {
        $this->imagePath = $this->market->image;
        $this->imagesPath = $this->market->images;
    }
    
    public function render()
    {
        return view('livewire.dashboard.market.edit');
    }

    public function updated($name, $value)
    {
        $this->validateOnly($name);
        $accessImages = ["images.0", "images.1", "images.2", "images.3"];


        if ($name == "image") {
            ImageService::setExclusiveDirectory("image" . DIRECTORY_SEPARATOR . "market" . DIRECTORY_SEPARATOR . "main-image");
            $imagePath = ImageService::resizeAndSave($value, 700, 500);
            $oldPath = !empty($this->imagePath) ? $this->imagePath : null;
            $this->imagePath = $imagePath;
            ImageService::deleteImage($oldPath);
        } else if (in_array($name, $accessImages)) {
            $index = explode(".", $name)[1];
            ImageService::setExclusiveDirectory("image" . DIRECTORY_SEPARATOR . "market" . DIRECTORY_SEPARATOR . "gallery");
            $oldPath = !empty($this->imagesPath[$index]) ? $this->imagesPath[$index] : null;
            $imagePath = ImageService::resizeAndSave($value, 700, 500);
            $this->imagesPath[$index] = $imagePath;
            ImageService::deleteImage($oldPath);
        }
    }

    public function destoryImage($index)
    {
        ImageService::deleteImage($this->imagesPath[$index]);
        unset($this->imagesPath[$index]);
        unset($this->images[$index]);

        $currentImagesPath = $this->imagesPath;
        $currentImages = $this->images;
        $newArrayImagesPath = [];
        $newArrayImages = [];
        $count = count($currentImages);

        for ($i = 0; $i <= $count; $i++) {
            unset($this->images[$i]);
            unset($this->imagesPath[$i]);
        }

        $this->imagesPath = array_merge($newArrayImagesPath, $currentImagesPath);
        $this->images = array_merge($newArrayImages, $currentImages);
    }

    public function store()
    {
        $this->validate();
        $this->market->image = $this->imagePath;
        $this->market->images = $this->imagesPath;
        $this->market->save();
        return redirect()->route("dashboard.my-ads.showMarket");
    }
}
