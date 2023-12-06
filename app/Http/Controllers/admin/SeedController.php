<?php

namespace App\Http\Controllers\admin;

use App\Models\Crop;
use App\Models\Seed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class SeedController extends Controller
{
    public function index()
    {
        $seeds = Seed::get();
        //dd($seeds);
        return view('admin.seed.AdminSeedView', ['seeds' => $seeds]);
    }


    /**
     * Store a newly created resource in storage.
     */

    public function create()
    {
         $mensaje = 'holaaaa';
        //dd($mensaje);
        $crops = Crop::get();
        //dd($crops);
        return view('admin.seed.CreateSeed', ['crops' => $crops, 'seed' => null]);
    }


    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'nameScientific' => 'required',
            'origin' => 'required',
            'morphology' => 'required',
            'type' => 'required',
            'quality' => 'required',
            'spreading' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'


        ]);


         try {

        //Obtener el nombre de la imagen usando la función time()
        //Para generar un nombre aleatorio
        $imageNameSeed = time() . '.' . $request->image->extension();
        //Copiar la imagen al directorio public
        $request->image->move(public_path('storage/seed/'), $imageNameSeed);

        Seed::create([
            'name' => $request->name,
            'nameScientific' => $request->nameScientific,
            'origin' => $request->origin,
            'morphology' => $request->morphology,
            'type' => $request->type,
            'quality' => $request->quality,
            'spreading' => $request->spreading,
            'image' => $imageNameSeed,
            'crop_id' => $request->crop_id
        ]);

        $message = 'Se creo una semilla';

        return redirect()->route('seeds.index')->with('success', $message);
        } catch (QueryException $e ) {
            $message = 'ups.. la semilla no fue creada';
            return redirect()->route('seeds.index')->with('error', $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Seed $seed)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seed $seed)
    {
        $crops = Crop::get();
        return view('admin.seed.EditSeed', ['crops' => $crops, 'seed' => $seed]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seed $seed)
    {
        $request->validate([
            'name' =>'required',
            'nameScientific' => 'required',
            'origin' =>'required',
            'morphology' =>'required',
            'type' =>'required',
            'quality' =>'required',
            'spreading' =>'required',
            'image' =>'required'

        ]);

        try {

            //Obtener el nombre de la imagen usando la función time()
            //Para generar un nombre aleatorio
            $imageNameSeed = time() . '.' . $request->image->extension();
            //Copiar la imagen al directorio public
            $request->image->move(public_path('storage/crop/'), $imageNameSeed);
            //dd($imageNameSeed);

            $seed->update([

                'name' => $request->name,
                'nameScientific' => $request->nameScientific,
                'origin' => $request->origin,
                'morphology' => $request->morphology,
                'type' => $request->type,
                'quality' => $request->quality,
                'spreading' => $request->spreading,
                'image' => $imageNameSeed,
                'seed_id' => $request->seed_id
            ]);

            $message = 'Se modifico una semilla';

            return redirect()->route('seeds.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'ups.. no se efectuaron los cambios';
            return redirect()->route('seeds.index')->with('error', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seed $seed)
    {
        try {
            // dd($seed);
            $seed->delete();
            $message = 'una semilla fue eliminada';
            return redirect()->route('seeds.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'la semilla no pudo ser eliminada';
            return redirect()->route('seeds.index')->with('error', $message);
        }
    }

    //___________________________________________________________________________________________________________





    //-------------------------------------------------------------------------------
    //método de muchos a a muchos CropDisease

}
