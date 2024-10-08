<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getCountries()
    {
        // Fetch distinct countries from the Address table
        $countries = Address::select('country')->distinct()->get();
        return response()->json($countries);
    }

    public function getStates($country)
    {
        $states = Address::where('country', $country)->select('state')->distinct()->get();
        return response()->json($states);
    }

    public function getDistricts($state)
    {
        // Fetch distinct districts for the selected state
        $districts = Address::where('state', $state)->select('district')->distinct()->get();
        return response()->json($districts);
    }

    public function getCities($district)
    {
        // Fetch distinct cities and zip_code based on the selected district
        $cities = Address::where('district', $district)->select('city', 'zip_code')->distinct()->get();
        return response()->json($cities);
    }
}