<?php

namespace App\Http\Controllers\home;

use App\Models\Crop;
use App\Models\Seed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Disease;

class IndexController extends Controller
{
    public function index()
    {
        $crops = Crop::get();
        return view('home.Index', ['crops' => $crops]);
    }



    public function getCropInformation(Crop $crop)
    {
        //dd($crop);
        return view('home.InformationCrop', ['crop' => $crop]);
    }

    public function getSeedsInformation(Crop $crop)
    {
        $seeds = $crop->seeds;

        return view('home.InformationSeeds', ['crop' => $crop, 'seeds' => $seeds]);
    }

    public function getDiseasesInformation(Crop $crop)
    {
        $diseases = $crop->diseases;
        return view('home.InformationDiseases', ['crop' => $crop, 'diseases' => $diseases]);
    }


    public function getPesticidesInformation(Crop $crop, Disease $disease)
    {
        //dd($crop, $disease);
        $diseases = $crop->diseases;
        $pesticides = $disease->pesticides;

        return view('home.InformationPesticides', ['crop' => $crop, 'diseases' => $diseases, 'disease' => $disease, 'pesticides' => $pesticides]);
    }

    public function getFertilizersInformation(Crop $crop)
    {
    }


    public function viewGetCrops(Crop $crop){
        return view('admin.crop.AdminCropView',['crop'=>$crop]);
    }
}
