<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class informationFertilizerController extends Controller
{
    public function getFertilizerInformation(Crop $id)
    {

        $fertilizers = Fertilizer::where('crop_id', '=', $id->id)->get(); //$crop->id


        return view('admin.seed.informationFertilizer', ['crop' => $id, 'fertilizers' => $fertilizers]);
    }
}
