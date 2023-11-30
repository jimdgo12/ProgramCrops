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
        $crops = Crop::get();
        $crop_id = Crop::first()->id;
        $diseases = Disease::get();
        //dd($crops,$diseases,$crop_id);
        return view('admin.disease.AdminDiseaseView', ['crops' => $crops, 'diseases' => $diseases, 'crop_id' => $crop_id]);
    }

    public function getCropDiseaseById($id)
    {
        $crops = Crop::get();
        $crop = Crop::find($id);
        $diseases = $crop->diseases;
        //dd($crop);

        return view('admin.disease.AdminDiseaseView', ['crops' => $crops, 'diseases' => $diseases, 'crop_id' => $crop->id]);
    }

    public function create()
    {
        $crops = Crop::get();
        return view('admin.disease.CreateDisease', ['crops' => $crops, 'disease' => null]);
    }


    // public function createDisease($id)
    // {
    //     $crops = Crop::get();
    //     $crop = Crop::find($id);


    //     $diseases = $crop->diseases;

    //     return view('admin.disease.CreateDisease', ['crop' => $crop, 'diseases' => null]);
    // }


    public function store(Request $request, Disease $disease)
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


        try {

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





            //return redirect()->route('diseases.index');


            $message = 'Se creo la enfermedad';

            return redirect()->route('diseases.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'ups.. la enfermedad no se pudo crear';
            return redirect()->route('diseases.index')->with('error', $message);
        }
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
    public function edit($id)
    {
        $crops = Crop::find($id);
        //$crop = Crop::get();
        $disease = Disease::get();
        //dd($crop);


        return view('admin.disease.EditDisease', ['crops' => $crops, 'disease' => $disease, 'crop_id' => $crops->id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disease $disease, $id)
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


        $disease->update([

            'nameCommon' => $request->nameCommon,
            'nameScientific' => $request->nameScientific,
            'description' => $request->description,
            'diagnosis' => $request->diagnosis,
            'symptoms' => $request->symptoms,
            'transmission' => $request->transmission,
            'type' => $request->type,
            'image' => $imageNameDisease,
            'seed_id' => $request->seed_id
        ]);


        try {

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





            //return redirect()->route('diseases.index');


            $message = 'Se modifico la enfermedad';

            return redirect()->route('diseases.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'ups.. la enfermedad no fue creada';
            return redirect()->route('diseases.index')->with('error', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disease $disease)

    {
        try {
            $disease->delete();
            $message = 'La enfermedad fue eliminada';
            return redirect()->route('diseases.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'la enfermedad no puede ser eliminada';
            return redirect()->route('diseases.index')->with('error', $message);
        }
    }
}
