<?php

namespace App\Http\Controllers\Admin\CheckArticle\Unverified\Market;

use App\Http\Controllers\Controller;
use App\Models\Admin\Market;
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
        return view("admin.check-article.unverified.market.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.check-article.not-confirmed.market.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        return view("admin.check-article.unverified.market.show" , compact("market"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
}
