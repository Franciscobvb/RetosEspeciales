<?php

namespace App\Http\Controllers\Retos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class kaizenController extends Controller{

    public function index(Request $request){
        $associateid = base64_decode($request->associateid);
        $NombreReto = "Equipo Kaizen";
        $periodo = date('Ym');
        $info = 'kaizen.png';
        $mensaje = "No cumples con los requisitos para este programa.";
        $conection = \DB::connection('sqlsrv5');
            $wintaishi = $conection->select("SELECT * FROM [dbo].[WinTaishi] WHERE associateid = $associateid");
            $sponsor = $conection->select("SELECT * FROM TotalKaizen WHERE associateid = $associateid");
            $response = $conection->select("EXEC [dbo].[Gen_Kaizen] $associateid, $periodo");
        \DB::disconnect('sqlsrv5');
        $associateidencode = base64_encode($associateid);
        if(sizeof($wintaishi) > 0){
            $mensaje = "No cumples con los requisitos para este programa.";
            return view('kaizentaishi.no', compact('NombreReto', 'associateid', 'info', 'associateidencode', 'mensaje'));
        }
        else if(sizeof($sponsor) > 0){
            return view('kaizentaishi/kaizen', compact('response', 'sponsor', 'associateid', 'associateidencode'));
        }
        else{
            return view('kaizentaishi.no', compact('NombreReto', 'associateid', 'info', 'associateidencode', 'mensaje'));
        }
    }

    public function updateTotalKaizen(Request $request){
        $sponsorid = $request->sponsorid;
        $conection = \DB::connection('sqlsrv5');
            $kaizen = $conection->select("SELECT * from [dbo].[WinKaizen] WHERE associateid = $sponsorid");
            $sponsor = $conection->select("SELECT * FROM TotalKaizen WHERE associateid = $sponsorid");
        \DB::disconnect('sqlsrv5');

        return \Response::json($kaizen);
    }

    public function indexTaishi(Request $request){
        $associateid = base64_decode($request->associateid);
        $periodo = date('Ym');
        $NombreReto = "Equipo Taishi";
        $info = 'taishi.png';
        $mensaje = "No cumples con los requisitos para este programa.";
        $conection = \DB::connection('sqlsrv5');
            $sponsor = $conection->select("SELECT * FROM TotalKaizen WHERE associateid = $associateid");
            $response = $conection->select("EXEC [dbo].[Gen_Kaizen] $associateid, $periodo");
        \DB::disconnect('sqlsrv5');
        $associateidencode = base64_encode($associateid);
        if(sizeof($sponsor) > 0){
            return view('kaizentaishi/taishi', compact('response', 'sponsor', 'associateid', 'associateidencode'));
        }
        else{
            return view('kaizentaishi.no', compact('NombreReto', 'associateid', 'info', 'associateidencode', 'mensaje'));
        }
    }

    public function updateTotalTaishi(Request $request){
        $sponsorid = $request->sponsorid;
        $conection = \DB::connection('sqlsrv5');
            $taishi = $conection->select("SELECT * FROM [dbo].[WinTaishi] WHERE associateid = $sponsorid");
            $sponsor = $conection->select("SELECT * FROM TotalKaizen WHERE associateid = $sponsorid");
        \DB::disconnect('sqlsrv5');

        return \Response::json($taishi);
    }

    public function kiaiIndex(Request $request){
        $associateid = base64_decode($request->associateid);
        $NombreReto = "Club Kiai";
        $info = 'ClubKiai.png';
        $mensaje = "No cumples con los requisitos para este programa.";
        $conexion = \DB::connection('sqlsrv5');
            $detail = $conexion->table('ClubKiai')->where('Associateid','=', $associateid)->orderBy('Periodo','ASC')->get();
            $summary = $conexion->table('ResumenTrimestral')->where('AssociateId','=', $associateid)->orderBy('NoTrimestre','ASC') ->get();
            $genealogy = $conexion->select(\DB::raw("exec SpGenPerId :Param1"),[':Param1' => $associateid]);
            $getname = $conexion->select('select distinct AssociateName from ClubKiai where Associateid = ?',[$associateid]);
        \DB::disconnect('sqlsrv5');
        $associateidencode = base64_encode($associateid);
        if(sizeof($detail) > 0){
            return view('kaizentaishi/ClubKiai', compact('associateid', 'getname', 'genealogy', 'summary', 'detail', 'associateidencode'));
        }
        else{
            return view('kaizentaishi.no', compact('NombreReto', 'associateid', 'info', 'associateidencode', 'mensaje'));
        }
    }

    public function serProIndex(Request $request){
        $associateid = base64_decode($request->associateid);
        $staff = $request->staff;
        if(empty($staff)){
            $staff = "N";
        }
        $NombreReto = "Reto SER PRO";
        $info = 'serpro.png';
        $mensaje = "No cumples con los requisitos para este programa.";
        $conexion = \DB::connection('sqlsrv5');
            $detail = $conexion->table('Reto_SerPro2')->where('sponsor','=', $associateid)->get();
            $total = $conexion->table('TotalPro')->where('sponsor','=',$associateid)->get();
            $getname = $conexion->select('select distinct Sponsor,Nombre,Email,Rango,Pais from TotalPro where Sponsor = ?',[$associateid]);
            $winners = $conexion->select('select * from TotalPro where Plata > =5 and Oro >=2 union all select * from TotalPro where Oro > = 4');   
        \DB::disconnect('sqlsrv5');
        $associateidencode = base64_encode($associateid);
        if(sizeof($detail) > 0){
            return view('kaizentaishi.SerPro', compact('associateid', 'detail', 'total', 'getname', 'winners', 'staff', 'associateidencode'));
        }
        else{
            return view('kaizentaishi.no', compact('NombreReto', 'associateid', 'info', 'associateidencode', 'mensaje'));
        }
    }

    public function no(Request $request){
        $associateid = base64_decode($request->associateid);
        $NombreReto = "Reto SER PRO";
        $info = 'serpro.png';
        $mensaje = "No cumples con los requisitos para este programa.";
        $associateidencode = base64_encode($associateid);
        return view('kaizentaishi/no', compact('NombreReto', 'associateid', 'info', 'associateidencode', 'mensaje'));
    }
}