<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Seed;
use Illuminate\Http\Request;

class informationSeedController extends Controller
{
    public function getSeedsInformation(Crop $id)
    {

        $seeds = Seed::where('crop_id', '=', $id->id)->get(); //$crop->id
        

        return view('admin.seed.informationSeed', ['crop' => $id, 'seeds' => $seeds]);
    }
}
