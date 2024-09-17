<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function getCountries()
    {
        $data = DB::select("SELECT c.* FROM countries c");

        return $data;

    }

    public function getDevices()
    {
        //
    }
}
