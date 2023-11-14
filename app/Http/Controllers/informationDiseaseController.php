<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Disease;
use Illuminate\Http\Request;

class informationDiseaseController extends Controller
{
    public function getDiseaseInformation(Crop $id)
    {

        $diseases = Disease::where('crop_id', '=', $id->id)->get(); //$crop->id
        //dd($seeds);
        // if ($id == 0) {
        //     $crops = Crop::get();
        // }
        // $crops = $crops->chunk(3);
        // return view('admin.crop.informationCrop', [
        //     'crop_id' => $id,

        //     'crops' => $crops
        // ]);

        return view('admin.informationDesease', ['crop' => $id, 'diseases' => $diseases]);
    }
}
