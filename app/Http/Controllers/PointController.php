<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
class PointController extends Controller
{
    public function index()
    {
        $point = Point::all();
        if(count($point) > 0) {

            foreach ($point as $item) {
                $longtitude = $item->longtitude;
                $latitude = $item->latitude;
                $description = $item->description;
            }
        }else {
            $longtitude = Str('as');
            $latitude = Str('as');
            $description = Str('as');
        }
        return view('point.index', compact('longtitude', 'latitude', 'description', 'point'));
    }
    public function store(Request $request)
    {
        $callPoint = Point::all();
        if(count($callPoint) > 0) {
            foreach($callPoint as $call) {
                $call->longtitude = $request->longtitude;
                $call->latitude = $request->latitude;
                $call->description = $request->description;
                $call->update();
                return back();
            }
        }else {

            $point   = new Point();
            $point->longtitude = $request->longtitude;
            $point->latitude = $request->latitude;
            $point->description = $request->description;
            $point->save();
            return back();
        }
    }
    public function delete()
    {
        $point = Point::all();
        foreach($point as $item)
        {
            $item->delete();
        }
        return redirect()->route('point.index');
    }
}
