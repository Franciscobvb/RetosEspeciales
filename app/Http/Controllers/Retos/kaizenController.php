<?php

namespace App\Http\Controllers\Retos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class kaizenController extends Controller{
    public function index(Request $request){
        $associateid = $request->associateid;
        $periodo = date('Ym');
        $conection = \DB::connection('sqlsrv');
            $sponsor = $conection->select("SELECT * FROM TotalKaizen WHERE associateid = $associateid");
            $response = $conection->select("EXEC [dbo].[Gen_Kaizen] $associateid, $periodo");
        \DB::disconnect('sqlsrv');
        return view('kaizentaishi/kaizen', compact('response', 'sponsor', 'associateid'));
    }

    public function updateTotalKaizen(Request $request){
        $sponsorid = $request->sponsorid;
        $conection = \DB::connection('sqlsrv');
            $kaizen = $conection->select("SELECT * from [dbo].[WinKaizen] WHERE associateid = $sponsorid");
        \DB::disconnect('sqlsrv');
        return \Response::json($kaizen);
    }

    public function indexTaishi(Request $request){
        $associateid = $request->associateid;
        $periodo = date('Ym');
        
        $conection = \DB::connection('sqlsrv');
            $sponsor = $conection->select("SELECT * FROM TotalKaizen WHERE associateid = $associateid");
            $response = $conection->select("EXEC [dbo].[Gen_Kaizen] $associateid, $periodo");
        \DB::disconnect('sqlsrv');
        return view('kaizentaishi/taishi', compact('response', 'sponsor', 'associateid'));
    }

    public function updateTotalTaishi(Request $request){
        $sponsorid = $request->sponsorid;
        
        $conection = \DB::connection('sqlsrv');
            $taishi = $conection->select("SELECT * FROM [dbo].[WinTaishi] WHERE associateid = $sponsorid");
        \DB::disconnect('sqlsrv');
        return \Response::json($taishi);
    }

    public function kiaiIndex(Request $request){
        $associateid = $request->associateid;
        $conexion = \DB::connection('sqlsrv');
            $detail = $conexion->table('ClubKiai')->where('Associateid','=', $associateid)->orderBy('Periodo','ASC')->get();
            $summary = $conexion->table('ResumenTrimestral')->where('AssociateId','=', $associateid)->orderBy('NoTrimestre','ASC') ->get();
            $genealogy = $conexion->select(\DB::raw("exec SpGenPerId :Param1"),[':Param1' => $associateid]);
            $getname = $conexion->select('select distinct AssociateName from ClubKiai where Associateid = ?',[$associateid]);
        \DB::disconnect('sqlsrv'); 
        return view('kaizentaishi/ClubKiai', compact('associateid', 'getname', 'genealogy', 'summary', 'detail'));
    }
}