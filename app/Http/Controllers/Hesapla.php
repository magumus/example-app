<?php

namespace App\Http\Controllers;

use App\Models\Birim;
use App\Models\Hesaplamalar;
use App\Models\Tesis;
use App\Models\Yakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Hesapla extends Controller
{
    public function index()
    {
        return view('case', [
            'tesisler' => Tesis::all(),
            'yillar' => DB::table('yil')->get(),
            'yakitlar' => Yakit::all(),
            'birimler' => Birim::all(),
            'hesaplamalar' =>  Hesaplamalar::all(),
        ]);
    }

    public function save(Request $request)
    {
        $model = new Hesaplamalar();
        $model->tesis_id = $request->facility_id;
        $model->yil = $request->year;
        $model->yakit_id = $request->fuel;
        $model->yakit_miktari = $request->amount_of_fuel;
        $model->birim_id = $request->units;

        $hesaplamayap = $model->Yakit->yakit_carpani*$model->Birim->birim_carpani*$model->yakit_miktari;
        $model->co2e = $hesaplamayap;
        $model->co2 = $hesaplamayap * 0.57;
        $model->ch4 = $hesaplamayap * 0.25;

        $model->n20= $hesaplamayap * 0.18;

        $model->save();

        return redirect()->route('stationary.index');
    }



    public function sil($id){

        $silinecek = Hesaplamalar::where('hesaplama_id',$id);
        $silinecek->delete();
        return redirect()->route('stationary.index');

    }


}
