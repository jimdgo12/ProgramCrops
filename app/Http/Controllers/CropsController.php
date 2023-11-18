<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Seed;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CropsController extends Controller
{
    public function index()
    {
        $crops = Crop::get();
        return view('admin.crop.AdminCropView', ['crops' => $crops]);
    }

    public function create()
    {
        $seeds = Seed::get();
        return view('admin.crop.CreateCrop', ['seeds' => $seeds, 'crop' => null]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        dd($request);

        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'description' => 'required',
            'nameScientific' => 'required',
            'history' => 'required',
            'phaseFertilizer' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'

        ]);

        try {

            //Obtener el nombre de la imagen usando la función time()
            //Para generar un nombre aleatorio
            $imageNameCrop = time() . '.' . $request->image->extension();
            //Copiar la imagen al directorio public
            $request->image->move(public_path('storage/crop/'), $imageNameCrop);
            //dd($imageNameCrop);

            Crop::create([

                'name' => $request->name,
                'description' => $request->description,
                'nameScientific' => $request->nameScientific,
                'history' => $request->history,
                'phaseFertilizer' => $request->phaseFertilizer,
                'phaseHarvest' => $request->phaseHarvest,
                'spreading' => $request->spreading,
                'image' => $imageNameCrop,
                'seed_id' => $request->seed_id
            ]);

            $message = 'Se creo el cultivo';

            return redirect()->route('crops.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'ups.. el cultivo no fue creado';
            return redirect()->route('crops.index')->with('error', $message);
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
    public function edit(Crop $crop)
    {
        $seeds = Seed::get();
        return view('admin.crop.EditCrop', ['seeds' => $seeds, 'crop' => $crop]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crop $crop)
    {
        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'description' => 'required',
            'nameScientific' => 'required',
            'history' => 'required',
            'phaseFertilizer' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'

        ]);

        try {

            //Obtener el nombre de la imagen usando la función time()
            //Para generar un nombre aleatorio
            $imageNameCrop = time() . '.' . $request->image->extension();
            //Copiar la imagen al directorio public
            $request->image->move(public_path('storage/crop/'), $imageNameCrop);
            //dd($imageNameCrop);

            $crop->update([

                'name' => $request->name,
                'description' => $request->description,
                'nameScientific' => $request->nameScientific,
                'history' => $request->history,
                'phaseFertilizer' => $request->phaseFertilizer,
                'phaseHarvest' => $request->phaseHarvest,
                'spreading' => $request->spreading,
                'image' => $imageNameCrop,
                'seed_id' => $request->seed_id
            ]);

            $message = 'Se modifico el cultivo';

            return redirect()->route('crops.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'ups.. no se efectuaron los cambios';
            return redirect()->route('crops.index')->with('error', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crop $crop)
    {
        try {
            $crop->delete();
            $message = 'cultivo eliminado';
            return redirect()->route('crops.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'el cultivo no puede ser eliminado';
            return redirect()->route('crops.index')->with('error', $message);
        }
    }

    //___________________________________________________________________________________________________________





    //-------------------------------------------------------------------------------
    //método de muchos a a muchos CropDisease


}
