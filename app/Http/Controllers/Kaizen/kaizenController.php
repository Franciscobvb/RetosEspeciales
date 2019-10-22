<?php

namespace App\Http\Controllers\kaizen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class kaizenController extends Controller
{
    public function index(){
        $periodo = date('Ym');
        $conection = \DB::connection('sqlsrv');
            $sponsor = $conection->select("SELECT * FROM TotalKaizen WHERE associateid = 9280403");
            $response = $conection->select("EXEC [dbo].[Gen_Kaizen] 9280403, 201910");
        \DB::disconnect('sqlsrv');
        return view('kaizentaishi/kaizen', compact('response', 'sponsor'));
    }

    public function updateTotalKaizen(Request $request){
        $sponsorid = $request->sponsorid;
        $frontales = $request->nfrontales;
        $nofrontales = $request->nnofrontales;


        $conection = \DB::connection('sqlsrv');
            //$response = $conection->update("UPDATE TotalKaizen SET CountFrontal = $frontales, CountGP = $nofrontales WHERE associateid = '$sponsorid';");
            $kaizenpro = $conection->select("SELECT * from TotalKaizen where Rango>=5 and VpAcumulado>=5000 and VgpAcumulado>=25000 and VpIncorporados>=5000 and CountFrontal>=3 and CountGP>=3 and associateid in (select sponsor from WinSerPro) AND associateid = $sponsorid");
            if(empty($kaizenpro)){
                $kaizen = $conection->select("SELECT * from TotalKaizen where Rango>=5 and VpAcumulado>=5000 and VgpAcumulado>=50000 and VpIncorporados>=5000 and CountFrontal>=3 and CountGP>=3 and associateid = $sponsorid");
                $response = $kaizen;
            }
            else{
                $response = $kaizenpro;
            }
        \DB::disconnect('sqlsrv');
        return \Response::json($response);
    }

    public function indexTaishi(){
        $periodo = date('Ym');
        $conection = \DB::connection('sqlsrv');
            $sponsor = $conection->select("SELECT * FROM TotalKaizen WHERE associateid = ?", array('9845903'));
            $response = $conection->select("EXEC [dbo].[Gen_Kaizen] ?, ?", array(9845903, $periodo));
        \DB::disconnect('sqlsrv');
        return view('kaizentaishi/taishi', compact('response', 'sponsor'));
    }

    public function updateTotalTaishi(Request $request){
        $sponsorid = $request->sponsorid;
        $frontales = $request->nfrontales;
        $nofrontales = $request->nnofrontales;


        $conection = \DB::connection('sqlsrv');
            $response = $conection->update("UPDATE TotalKaizen SET CountFrontal = $frontales, CountGP = $nofrontales WHERE associateid = '$sponsorid';");
            $kaizenpro = $conection->select("SELECT * FROM TotalKaizen WHERE Rango>=7 AND VpAcumulado>=5000 AND VgpAcumulado>=40000 AND VpIncorporados>=5000 AND CountFrontal>=3 AND CountGP>=3 AND associateid in (SELECT sponsor from WinSerPro) AND associateid = $sponsorid");
            if(empty($kaizenpro)){
                $kaizen = $conection->select("SELECT * FROM TotalKaizen WHERE Rango>=7 AND VpAcumulado>=5000 AND VgpAcumulado>=80000 AND VpIncorporados>=5000 AND CountFrontal>=3 AND CountGP>=3 AND associateid = $sponsorid");
                $response = $kaizen;
            }
            else{
                $response = $kaizenpro;
            }
        \DB::disconnect('sqlsrv');
        return \Response::json($response);
    }
}
