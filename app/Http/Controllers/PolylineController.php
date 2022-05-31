<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Polygon;
use App\Models\Polyline;

class PolylineController extends Controller
{
    public function index() 
    {
        $polyline = polyline::all();
        $polylineArray = array();
        if(count($polyline) > 0) {

            foreach ($polyline as $item) {
                $coordinate = $item->coordinate;
                array_push($polylineArray, $coordinate);
            }
        }else {
            $coordinate = Str('as');
        }
        return view('polyline.index', compact('polyline', 'polylineArray', 'coordinate'));
    }
    public function store(Request $request)
    {
        $polyline   = new Polyline();
        $polyline->coordinate = json_encode($request->coordinate);
        $polyline->save();
    }
    public function delete()
    {
        $polyline = Polyline::all();
        foreach($polyline as $item)
        {
            $item->delete();
        }
        return redirect()->route('polyline.index');
    }
    
}
