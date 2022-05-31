<?php

namespace App\Http\Controllers;

use App\Models\Polygon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function index(){

        $response =
        Http::get('https://data.covid19.go.id/public/api/prov.json');
        
        $jsonData = $response->json();
        // dd($jsonData);
        return view('page_one',compact('jsonData'));
    }
    
    public function polygoneAdd(){
        
        return view('polygon.add');
    }
    public function pointAdd(){
        
        return view('point.add');
    }
    public function polylineAdd() 
    {
        return view('polyline.add');
    }
}
