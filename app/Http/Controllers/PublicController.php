<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Announce;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function aboutUs(){
        return view('about-us');
    }

    public function searchAnnounce(Request $request)
    {
        $query = $request->input('query');
        $announces = Announce::search($query)->where('is_accepted', true)->paginate(10);
        return view('announces.searched', ['announces'=>$announces, 'query'=>$query]);
        
    }
    public function setLenguage($lang){
        session()->put("locale",$lang);
        return redirect()->back();
    }
}
