<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropsController extends Controller
{
    public function index()
    {
        $crops = Crop::get();
        return view('admin.crop.AdminCropView', ['crops' => $crops]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'description' => 'required',
            'nameScientific' => 'required',
            'history' => 'required',
            'phaseFertilizer' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'

        ]);

        //Obtener el nombre de la imagen usando la función time()
        //Para generar un nombre aleatorio
        $imageNameCrop = time() . '.' . $request->image->extension();
        //Copiar la imagen al directorio public
        $request->image->move(public_path('storage/crop/'), $imageNameCrop);

        Crop::create([
            'name' => $request->name,
            'description' => $request->description,
            'nameScientific' => $request->nameScientific,
            'history' => $request->history,
            'phaseFertilizer' => $request->phaseFertilizer,
            'phaseHarvest' => $request->phaseHarvest,
            'spreading' => $request->spreading,
            'image' => $request->imageNameCrop
        ]);

        return redirect()->route('crops.index');
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
