<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AnnounceController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return[
            new Middleware('auth', only:['create'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $announces = Announce::where("is_accepted",true)->take(6)->orderBy("created_at","desc")->get();
        return view('welcome', compact('announces'));  
    }
    public function index()
    {
        $announces = Announce::where("is_accepted",true)->orderBy("created_at","desc")->paginate(6);
        return view("announces.index",compact("announces"));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Announce $announce)
    {
        return view("announces.show",compact("announce"));
    }
    public function category_show(Category $category)
    {
        return view("category.show",["announces"=>$category->announces,"category"=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announce $announce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announce $announce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announce $announce)
    {
        //
    }
}
