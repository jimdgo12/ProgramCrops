<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Fertilizer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class FertilizersController extends Controller
{
    public function index()
    {
        $crops = Crop::get();
        $crop_id = Crop::first()->id;

        $fertilizers = Fertilizer::get();
        return view('admin.fertilizer.AdminFertilizerView', ['crops' => $crops, 'fertilizers' => $fertilizers]);
    }

    public function getCropFertilizerById($id)
    {
        $crops = Crop::get();
        $crop = Crop::find($id);
        // dd($crop);
        // $diseases = Disease::where('crop_id', '=', $crop->id)->get();
        $fertilizers = $crop->diseases;
        // dd($crop, $diseases);
        return view('admin.fertilizer.AdminFertilizerView', ['crops' => $crops, 'fertilizers' => $fertilizers, 'crop_id' => $crop->id]);
    }

    public function create()
    {
        $crops = Crop::get();
        return view('admin.fertilizer.AdminFertilizerView', ['crops' => $crops, 'fertilizer' => null]);
    }


    public function createFertilizer($id)
    {
        $crop_id = Fertilizer::first()->id;
        $crops = Fertilizer::get();
        $fertilizers = $crops->fertilizers;
        //dd($crops, $crop_id);
        return view('admin.fertilizer.AdminFertilizerView', ['crops' => $crops, 'fertilizers' => $fertilizers, $crops->$id, 'crop_id' => $crop_id]);
    }



    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'description' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'dose' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,150',
            'price' => 'required|integer|between:5,30000',
            'type' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'image' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,800'

        ]);

        try {

        //Obtener el nombre de la imagen usando la función time()
        //Para generar un nombre aleatorio
        $imageNameFertilizer = time() . '.' . $request->image->extension();
        //Copiar la imagen al directorio public
        $request->image->move(public_path('storage/fertilizer/'), $imageNameFertilizer);

        Fertilizer::create([
            'name' => $request->name,
            'description' => $request->description,
            'dose' => $request->dose,
            'price' => $request->price,
            'type' => $request->type,
            'image' => $request->imageNameFertilizer
        ]);

        return redirect()->route('fertilizers.index');

        $message = 'Se creo un fertilizante';

            return redirect()->route('fertilizers.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'ups.. la semilla no fue creada';
            return redirect()->route('fertilizers.index')->with('error', $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fertilizer $fertilizers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fertilizer $fertilizers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fertilizer $fertilizers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fertilizer $fertilizers)
    {
        //
    }

    //___________________________________________________________________________________________________________





    //-------------------------------------------------------------------------------
    //método de muchos a a muchos CropDisease


}
