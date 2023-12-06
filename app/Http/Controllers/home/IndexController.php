<?php

namespace App\Http\Controllers\home;

use App\Models\Crop;
use App\Models\Seed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Fertilizer;

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
        // dd($crop->diseases());
        $diseases = $crop->diseases;
        //dd($crop, $diseases);
        return view('home.InformationDiseases', ['crop' => $crop, 'diseases' => $diseases]);
    }


    public function getPesticidesInformation(Crop $crop, Disease $disease)
    {



        $pesticides = $disease->pesticides;
        //dd($crop, $disease, $pesticides);

        return view('home.InformationPesticides', ['crop' => $crop, 'disease_selected' => $disease, 'pesticides' => $pesticides]);
    }


    public function getFertilizersInformation(Crop $crop)
    {

        $fertilizers = $crop->fertilizers;
        // $fertilizers = Fertilizer::where('crop_id', '=', $crop->id)->get;
        // dd($crop, $fertilizers);


        return view('home.InformationFertilizer', ['crop' => $crop, 'fertilizers' => $fertilizers]);
    }
}
