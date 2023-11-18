<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Pesticide;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PesticidesController extends Controller
{
    public function index()
    {
        $disease_id = Pesticide::first()->id;
        $diseases = Pesticide::get();

        $pesticides = Pesticide::get();
        return view('admin.pesticide.AdminPesticideView', ['diseases'=> $diseases, 'pesticides' => $pesticides]);
    }

    public function getDiseasePesticidaById($id)
    {
        $diseases = Disease::get();
        $disease = Disease::find($id);
        // dd($crop);
        // $diseases = Disease::where('crop_id', '=', $crop->id)->get();
        $pesticides = $disease->pesticides;
        // dd($crop, $diseases);
        return view('admin.pesticide.AdminPesticideView', ['diseases' => $diseases, 'pesticides' => $pesticides, 'disease_id' => $disease->id]);
    }

    public function create()
    {
        $diseases = Disease::get();
        return view('admin.pesticide.AdminPesticideView', ['diseases' => $diseases, 'pesticide' => null]);
    }


    public function createPesticide($id)
    {
        $disease_id = Disease::first()->id;
        $diseases = Disease::get();
        $pesticides = $diseases->pesticides;
        //dd($diseases, $disease_id);
        return view('admin.disease.CreateDisease', ['diseases' => $diseases, 'pesticides' => $pesticides, $diseases->$id, 'disease_id' => $disease_id]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'description' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'activeIngredient' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'Price' => 'required|integer|between:10000,100000',
            'type' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'dose' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,100',
            'image' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,800',

        ]);

        try {

        //Obtener el nombre de la imagen usando la función time()
        //Para generar un nombre aleatorio
        $imageNamePesticide = time() . '.' . $request->image->extension();
        //Copiar la imagen al directorio public
        $request->image->move(public_path('storage/pest$pesticides/'), $imageNamePesticide);

        Pesticide::create([
            'name' => $request->name,
            'description' => $request->description,
            'activeIngredient' => $request->activeIngredient,
            'price' => $request->price,
            'type' => $request->type,
            'dose' => $request->dose,
            'image' => $request->imageNamePesticide
        ]);

        return redirect()->route('pesticides.index');

        $message = 'Se creo un fungicida';

            return redirect()->route('pesticides.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'ups.. el fungicida no fue creado';
            return redirect()->route('pesticides.index')->with('error', $message);
        }


    }






    /**
     * Display the specified resource.
     */
    public function show(Pesticide $pesticides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesticide $pesticides)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesticide $pesticides)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesticide $pesticides)
    {
        //
    }

    //___________________________________________________________________________________________________________





    //-------------------------------------------------------------------------------
    //método de muchos a a muchos CropDisease


}
