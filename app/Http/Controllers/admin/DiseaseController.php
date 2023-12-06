<?php

namespace App\Http\Controllers\admin;

use App\Models\Crop;
use App\Models\Disease;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class DiseaseController extends Controller
{
    public function index()
    {
        $crops = Crop::get();
        $crop_id = Crop::first()->id;
        $diseases = Disease::get();
        return view('admin.disease.AdminDiseaseView', ['crops' => $crops, 'diseases' => $diseases, 'crop_id' => $crop_id]);
    }

    public function getCropDiseaseById($id)
    {
        $crops = Crop::get();
        $crop = Crop::find($id);
        $diseases = $crop->diseases;
        return view('admin.disease.AdminDiseaseView', ['crops' => $crops, 'diseases' => $diseases, 'crop_id' => $crop->id]);
    }

    public function create()
    {
        $crops = Crop::get();
        return view('admin.disease.CreateDisease', ['crops' => $crops, 'disease' => null]);
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
    public function edit(Disease $disease)
    {
        $crops = Crop::get();

        return view('admin.disease.EditDisease', ['crops' => $crops, 'disease' => $disease]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disease $disease)
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
        'image' => 'image|mimes:jpg,png,jpeg|max:2048'
    ]);

    try {
        $updateDisease = [
            'nameCommon' => $request->nameCommon,
            'nameScientific' => $request->nameScientific,
            'description' => $request->description,
            'diagnosis' => $request->diagnosis,
            'symptoms' => $request->symptoms,
            'transmission' => $request->transmission,
            'type' => $request->type,
        ];


        if ($request->hasFile('image')) {
            $imageNameDisease = time() . '.' . $request->image->extension();
            $request->image->storeAs('disease', $imageNameDisease, 'public');


            if ($disease->image) {
                Storage::disk('public')->delete("disease/{$disease->image}");
            }

            $updateDisease['image'] = $imageNameDisease;
        }

        $disease->update($updateDisease);


        $disease->crops()->sync($request->crop_ids);

        $message = 'Se actualizó la enfermedad';

        return redirect()->route('diseases.index')->with('success', $message);
    } catch (QueryException $e) {
        $message = 'Ups... no se pudo actualizar la enfermedad';
        return redirect()->route('diseases.index')->with('error', $message);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disease $disease)

    {
        try {
            $disease->crops()->detach();
            $disease->delete();
            $message = 'La enfermedad fue eliminada';
            return redirect()->route('diseases.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'la enfermedad no puede ser eliminada';
            return redirect()->route('diseases.index')->with('error', $message);
        }
    }
}
