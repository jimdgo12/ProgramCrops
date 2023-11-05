<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $diseases = Disease::get();
        return view('admin.disease.informationDisease', ['diseases' => $diseases]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nameCommon' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'nameScientific' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,150',
            'description' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'diagnosis' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'symptoms' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'transmission' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'type' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'image' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,800',

        ]);
    }
}
