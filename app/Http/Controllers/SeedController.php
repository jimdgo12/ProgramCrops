<?php

namespace App\Http\Controllers;

use App\Models\Seed;
use Illuminate\Http\Request;

class SeedController extends Controller
{
    public function index()
    {
        $seeds = Seed::get();
        return view('admin.seed.AdminSeedView', ['seeds' => $seeds]);
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
        $imageNameSeed = time() . '.' . $request->image->extension();
        //Copiar la imagen al directorio public
        $request->image->move(public_path('storage/crop/'), $imageNameSeed);

        Seed::create([
            'name' => $request->name,
            'nameScientific' => $request->nameScientific,
            'origin' => $request->description,
            'morphology' => $request->morphology,
            'type' => $request->type,
            'quality' => $request->quality,
            'spreading' => $request->spreading,
            'image' => $request->imageNameSeed
        ]);

        return redirect()->route('seeds.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seed $seed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seed $seed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seed $seed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seed $seed)
    {
        //
    }

    //___________________________________________________________________________________________________________





    //-------------------------------------------------------------------------------
    //método de muchos a a muchos CropDisease

}
