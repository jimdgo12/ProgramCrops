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
        return view('admin.disease.AdminDiseaseView', ['diseases' => $diseases]);
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

        //Obtener el nombre de la imagen usando la función time()
        //Para generar un nombre aleatorio
        $imageNameDisease = time() . '.' . $request->image->extension();
        //Copiar la imagen al directorio public
        $request->image->move(public_path('storage/crop/'), $imageNameDisease);

        Disease::create([
            'nameCommon' => $request->nameCommon,
            'nameScientific' => $request->nameScientific,
            'description' => $request->description,
            'diagnosis' => $request->diagnosis,
            'symptoms' => $request->symptoms,
            'transmission' => $request->transmission,
            'type' => $request->type,
            'image' => $request->imageNameDisease
        ]);

        return redirect()->route('diseases.index');
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

    //___________________________________________________________________________________________________________





    //-------------------------------------------------------------------------------
    //método de muchos a a muchos CropDisease


}
