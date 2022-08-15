<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Birim;
use App\Models\Hesaplamalar;
use App\Models\Tesis;
use App\Models\Yakit;
use Illuminate\Support\Facades\DB;


class AjaxController extends Controller
{

    public function hesapet(Request $request)
    {

        $model = new Hesaplamalar();
        $model->tesis_id = $request->facility_id;
        $model->yil = $request->year;
        $model->yakit_id = $request->fuel;
        $model->yakit_miktari = $request->amount_of_fuel;
        $model->birim_id           = $request->units;

        $hesaplamayap = $model->Yakit->yakit_carpani*$model->Birim->birim_carpani*$model->yakit_miktari;
        $model->co2e = $hesaplamayap;
        $model->co2 = $hesaplamayap * 0.57;
        $model->ch4 = $hesaplamayap * 0.25;
        $model->n20= $hesaplamayap * 0.18;


        return response()->json(['co2e'=>$model->co2e,'co2'=>$model->co2,'ch4'=>$model->ch4,'n20'=>$model->n20]);
    }


    public function kaydet(Request $request)
    {

        $model = new Hesaplamalar();
        $model->tesis_id = $request->facility_id;
        $model->yil = $request->year;
        $model->yakit_id = $request->fuel;
        $model->yakit_miktari = $request->amount_of_fuel;
        $model->birim_id           = $request->units;

        $hesaplamayap = $model->Yakit->yakit_carpani*$model->Birim->birim_carpani*$model->yakit_miktari;
        $model->co2e = $hesaplamayap;
        $model->co2 = $hesaplamayap * 0.57;
        $model->ch4 = $hesaplamayap * 0.25;
        $model->n20= $hesaplamayap * 0.18;
        $model->save();
        return view('vericek',[
            'tesisler' => Tesis::all(),
            'yillar' => DB::table('yil')->get(),
            'yakitlar' => Yakit::all(),
            'birimler' => Birim::all(),
            'hesaplamalar' =>  Hesaplamalar::all(),
        ]);
       // return response()->json(['co2e'=>$model->co2e,'co2'=>$model->co2,'ch4'=>$model->ch4,'n20'=>$model->n20]);
    }


    public function temizle(Request $request)
    {
        return view('sol_giris',[
            'tesisler' => Tesis::all(),
            'yillar' => DB::table('yil')->get(),
            'yakitlar' => Yakit::all(),
            'birimler' => Birim::all(),
            'hesaplamalar' =>  Hesaplamalar::all(),
        ]);
    }




    public function sil(Request $request)
    {


        $hesaplama_id = $request->hesaplama_id;
        $silinecek = Hesaplamalar::where('hesaplama_id',$hesaplama_id);
        $silinecek->delete();

        return view('vericek',[
            'tesisler' => Tesis::all(),
            'yillar' => DB::table('yil')->get(),
            'yakitlar' => Yakit::all(),
            'birimler' => Birim::all(),
            'hesaplamalar' =>  Hesaplamalar::all(),
        ]);
    }





}
