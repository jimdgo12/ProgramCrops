<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\CropDisease;
use App\Models\Disease;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DiseaseController extends Controller
{
    public function index()
    {

        $crop_id = Crop::first()->id;
        $crops = Crop::get();
        //dd($crops, $crop_id);
        $diseases = Disease::get();
        return view('admin.disease.AdminDiseaseView', ['crops' => $crops, 'diseases' => $diseases, 'crop_id' => $crop_id]);
    }

    public function getCropDiseaseById($id)
    {
        $crops = Crop::get();
        $crop = Crop::find($id);
        // dd($crop);
        // $diseases = Disease::where('crop_id', '=', $crop->id)->get();
        $diseases = $crop->diseases;
        //dd($crop, $diseases);
        return view('admin.disease.AdminDiseaseView', ['crops' => $crops, 'diseases' => $diseases, 'crop_id' => $crop->id]);
    }

    public function create()
    {
        $crops = Crop::get();
        return view('admin.disease.CreateDisease', ['crops' => $crops, 'disease' => null]);
    }


    public function createDisease($id)
    {

        $crops = Crop::get();
        $crop = Crop::find($id);

        // $crop_id = Crop::first()->id;
        // $crop = Crop::get();
        $diseases = $crop->diseases;

        return view('admin.disease.CreateDisease', ['crop' => $crop, 'diseases' => null]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'crop_ids' => 'required_without_all',
            'nameCommon' => 'required',
            'nameScientific' => 'required',
            'description' => 'required',
            'diagnosis' => 'required',
            'symptoms' => 'required',
            'transmission' => 'required',
            'type' => 'required',
            'image' => 'required', 'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $imageNameDisease = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/disease/'), $imageNameDisease);

        $disease =  new Disease(
            [
                'nameCommon' => $request->nameCommon,
                'nameScientific' => $request->nameScientific,
                'description' => $request->description,
                'diagnosis' => $request->diagnosis,
                'symptoms' => $request->symptoms,
                'transmission' => $request->transmission,
                'type' => $request->type,
                'image' => $imageNameDisease
            ]
        );

        foreach ($request->crop_ids as $crop_id) {
            $crop = Crop::find($crop_id);
            $crop->diseases()->save($disease);
        }




        // CropDisease::create([
        //     'crop_id' => $request->crop_id,
        //     'disease_id' => $request->disease_id,

        // ]);

        return redirect()->route('diseases.index');


        //     $message = 'Se creo la disease';

        //     return redirect()->route('diseases.index')->with('success', $message);
        // } catch (QueryException $e) {
        //     $message = 'ups.. la enfermedad no fue creada';
        //     return redirect()->route('diseases.index')->with('error', $message);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Crop $crop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crop $crop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crop $crop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crop $crop)
    {
        //
    }
}
