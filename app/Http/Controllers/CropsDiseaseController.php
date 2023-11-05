<?php

namespace App\Http\Controllers;

// use App\Models\Crop;
// use App\Models\CropDisease;
// use Illuminate\Http\Request;

// class CropsDiseaseController extends Controller
// {
//     public function getDiseaseInformation(Crop $id)
//     {



//         $inforCropDisease = Crop::find($id->id)->Diseases()->get();
//         //$crop->id


//         return view('admin.disease.informationDisease', ['crop' => $id, 'inforCropDisease' => $inforCropDisease]);
//     }
// }



use App\Models\Crop;
use App\Models\CropDisease;
use Illuminate\Http\Request;

class CropsDiseaseController extends Controller
{
    public function getDiseaseInformation(Crop $crop)
    {
        // obtener datos
        $inforCropDisease = $crop->diseases()->get();



        return view('admin.disease.informationDisease', ['crop' => $crop, 'inforCropDisease' => $inforCropDisease]);
    }
}
