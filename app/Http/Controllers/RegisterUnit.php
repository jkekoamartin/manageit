<?php
/**
 * Created by IntelliJ IDEA.
 * User: Owen
 * Date: 11/11/2017
 * Time: 8:33 PM
 */

namespace App\Http\Controllers;
use App\Unit;

use App\Mrequest;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class RegisterUnit extends Controller
{
    /**
     * Create a new user instance.
     *
     * @param  Request $request
     * @return Response
     */

    public function updateUnits(Request $request, $id)
    {

    $unit = new Unit;

    $mrequest = new Mrequest;

    $building = DB::table('buildings')->where('id', '=', $id)->first();

    $propertyid = $building->property_id;

    $property = DB::table('properties')->where('id', '=', $propertyid)->first();

    $unit->building_id = $building->id;

    $unit->name = $request->name;

    $unit->renter = $request->renter;

    $unit->rent = $request->rent;

    $unit->maintenance = "This unit doesn't have any maintenance requests";

    $unit->save();

    $mrequest->unit_id = $unit->id;

    $mrequest->save();

    return view('managebuildings')->with('building', $building)->with('property', $property);

    }
}