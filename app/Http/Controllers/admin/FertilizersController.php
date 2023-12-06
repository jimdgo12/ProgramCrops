<?php

namespace App\Http\Controllers\admin;

use App\Models\Crop;
use App\Models\Fertilizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PHPUnit\TextUI\Configuration\Php;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class FertilizersController extends Controller
{
    public function index()
    {
        $crops = Crop::get();
        $crop_id = Crop::first()->id;

        $fertilizers = Fertilizer::get();
        //dd($crops,$fertilizers ,$crop_id);
        return view('admin.fertilizer.AdminFertilizerView', ['crops' => $crops, 'fertilizers' => $fertilizers, 'crop_id' => $crop_id]);
    }

    public function getCropFertilizerById($id)
    {
        $crops = Crop::get();
        $crop = Crop::find($id);
        $fertilizers = $crop->fertilizers;
        //dd($fertilizers,$crops,$crop);


        return view('admin.fertilizer.AdminFertilizerView', ['crops' => $crops, 'fertilizers' => $fertilizers, 'crop_id' => $crop->id]);
    }

    public function create()
    {
        $crops = Crop::get();
        return view('admin.fertilizer.CreateFertilizer', ['crops' => $crops, 'fertilizer' => null]);
    }

    // public function graficas()
    // {
    //     $datos = DB:: select('select cr.name cultivo, fe.name fertilizante, fe.price from fertilizers fe
    //     inner join crop_fertilizers cf on fe.id = cf.fertilizer_id
    //     inner join crops cr on cr.id = cf.fertilizer_id
    //     where cf.crop_id =2');
    //     //dd($datos);

    //     $json = "[";
    //     foreach ($datos as $obj) {
    //         $json = $json . "{";
    //         $json = $json . '"name":"' . $obj->fertilizante . '",';
    //         $json = $json . '"y":' . $obj->price;
    //         $json = $json . "},";
    //     }
    //     $json = $json . "]";
    //     $json= str_replace(",]","]",$json);


    //     return view('admin.fertilizer.Grafic', ['datas'=>$json]);
    // }



    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $request->validate([

            'crop_ids' => 'required_without_all',
            'name' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'description' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,300',
            'dose' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,150',
            'price' => 'required|integer|between:5,30000',
            'type' => 'required|regex:/^([A-Za-zÑñ\s]*)$/|between:3,50',
            'image' => 'required', 'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'

        ]);

        try {

            $imageNameFertilizer = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/fertilizer/'), $imageNameFertilizer);

            $fertilizer =  new Fertilizer(
                [
                    'name' => $request->name,
                    'description' => $request->description,
                    'dose' => $request->dose,
                    'price' => $request->price,
                    'type' => $request->type,
                    'image' => $imageNameFertilizer
                ]
            );

            $fertilizer->crops()->sync($request->crop_ids);
            // foreach ($request->crop_ids as $crop_id) {
            //     $crop = Crop::find($crop_id);
            //     $crop->fertilizers()->save($fertilizer);
            // }

            // CropDisease::create([
            //     'crop_id' => $request->crop_id,
            //     'disease_id' => $request->disease_id,

            // ]);

            //return redirect()->route('fertilizers.index');


            $message = 'Se creo el fertilizante';

            return redirect()->route('fertilizers.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'ups.. el fertilizante no fue creado';
            return redirect()->route('fertilizers.index')->with('error', $message);
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
    public function edit(Fertilizer $fertilizer)
    {
        $crops = Crop::get();
        // dd($fertilizer->crops);
        return view('admin.fertilizer.EditFertilizer', ['crops' => $crops, 'fertilizer' => $fertilizer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fertilizer $fertilizer)
    {
        $request->validate([
            'crop_ids' => 'required_without_all',
            'name' => 'required',
            'description' => 'required',
            'dose' => 'required',
            'price' => 'required',
            'type' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        try {
            $updateFertilizer = [
                'name' => $request->name,
                'description' => $request->description,
                'dose' => $request->dose,
                'price' => $request->price,
                'type' => $request->type,
            ];


            if ($request->hasFile('image')) {
                $imageNameFertilizer = time() . '.' . $request->image->extension();
                $request->image->storeAs('fertilizer', $imageNameFertilizer, 'public');


                if ($fertilizer->image) {
                    Storage::disk('public')->delete("fertilizer/{$fertilizer->image}");
                }

                $updateFertilizer['image'] = $imageNameFertilizer;
            }

            $fertilizer->update($updateFertilizer);


            $fertilizer->crops()->sync($request->crop_ids);

            $message = 'Se actualizó el fertilizante';

            return redirect()->route('fertilizers.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'Ups... no se pudo actualizar el fertilizante';
            return redirect()->route('fertilizers.index')->with('error', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fertilizer $fertilizer)
    {
        try {
            $fertilizer->crops()->detach();
            $fertilizer->delete();
            $message = 'El fertilizante fue eliminado';
            return redirect()->route('fertilizers.index')->with('success', $message);
        } catch (QueryException $e) {
            $message = 'el fertilizante no puede ser eliminado';
            return redirect()->route('fertilizers.index')->with('error', $message);
        }
    }

    //___________________________________________________________________________________________________________





    //-------------------------------------------------------------------------------
    //método de muchos a a muchos CropDisease


}
