<?php

namespace App\Http\Controllers\Admin\CheckArticle\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CheckArticle\Market\MarketRequest;
use App\Models\Admin\Market;
use App\Services\Image\ImageService;
use Illuminate\Http\Request;

class MarketController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.check-article.market.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.check-article.market.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view("admin.check-article.market.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        return view("admin.check-article.market.edit" , compact("market"));
    }
}
