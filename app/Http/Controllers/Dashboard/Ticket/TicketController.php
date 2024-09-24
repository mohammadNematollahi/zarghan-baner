<?php

namespace App\Http\Controllers\Dashboard\Ticket;

use App\Http\Controllers\Controller;
use App\Services\Image\ImageService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create()
    {
        return view("dashboard.ticket.create");
    }

    public function UploadImage(Request $request)
    {
        if($request->hasFile("upload")){
            $uploadUrl = $request->file("upload");
            ImageService::setExclusiveDirectory("image" . DIRECTORY_SEPARATOR . "ticket");
            $imagePath = ImageService::save($uploadUrl);
            $url = asset($imagePath);
            return response()->json(['fileName' => $imagePath , "uploaded" => 1 , "url" => $url]);
        }
    }
}
