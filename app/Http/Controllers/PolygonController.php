<?php

namespace App\Http\Controllers;

use App\Models\Polygon;
use Illuminate\Http\Request;

class PolygonController extends Controller
{
    public function api()
    {
        $polygon = Polygon::all();

        $polygonArray = array();
        foreach ($polygon as $item) {
            $coordinate = $item->coordinate;
            array_push($polygonArray, $coordinate);
        }
        return view('polygon.api', compact('polygon', 'coordinate', 'polygonArray'));
    }
    public function store(Request $request)
    {
        $polygon   = new Polygon();
        $polygon->coordinate = json_encode($request->coordinate);
        $polygon->save();
    }
    public function index()
    {
        $polygon = Polygon::all();
        $polygonArray = array();
        if(count($polygon) > 0) {

            foreach ($polygon as $item) {
                $coordinate = $item->coordinate;
                array_push($polygonArray, $coordinate);
            }
        }else {
            $coordinate = Str('as');
        }
        return view('polygon.index', compact('polygon', 'coordinate', 'polygonArray'));
    }

    public function delete()
    {
        $polygon = Polygon::all();
        foreach($polygon as $item)
        {
            $item->delete();
        }
        return redirect()->route('polygon.index');
    }
}
