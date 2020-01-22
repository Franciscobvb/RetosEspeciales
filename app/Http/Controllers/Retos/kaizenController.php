<?php

namespace App\Http\Controllers\Retos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class kaizenController extends Controller{

    public function index(Request $request){
        //$associateid = base64_decode($request->associateid);
        $associateid = $request->associateid;
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
        //$associateid = base64_decode($request->associateid);
        $associateid = $request->associateid;
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
        //$associateid = base64_decode($request->associateid);
        $associateid = $request->associateid;
        $NombreReto = "Club Viajeros";
        $info = 'ClubKiai.png';
        $mensaje = "No cumples con los requisitos para este programa.";
        $conexion = \DB::connection('sqlsrv5');
            $detail = $conexion->table('ClubKiai')->where('Associateid','=', $associateid)->orderBy('Periodo','ASC')->get();
            $summary = $conexion->table('ResumenTrimestral')->where('AssociateId','=', $associateid)->orderBy('NoTrimestre','ASC') ->get();
            $genealogy = $conexion->select(\DB::raw("EXEC SpGenPerId :Param1"),[':Param1' => $associateid]);
            $getname = $conexion->select('SELECT distinct AssociateName FROM ClubKiai WHERE Associateid = ?',[$associateid]);
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
        //$associateid = base64_decode($request->associateid);
        $associateid = $request->associateid;
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
            $getname = $conexion->select('SELECT DISTINCT Sponsor,Nombre,Email,Rango,Pais FROM TotalPro WHERE Sponsor = ?',[$associateid]);
            $winners = $conexion->select('SELECT * FROM TotalPro WHERE Plata > =5 and Oro >=2 UNION SELECT * FROM TotalPro WHERE Oro > = 4');
            $getRank = $conexion->select("SELECT max(rango) AS Rango FROM Rangos_Avance WHERE numci = $associateid GROUP BY numci;");
            $getRegist = $conexion->select("SELECT * FROM Registros_SerPro WHERE Associateid = $associateid;");
        \DB::disconnect('sqlsrv5');
        $associateidencode = base64_encode($associateid);
        $curRank = trim($getRank[0]->Rango, " ");
        ($curRank == 2 || $curRank == 4) ? $curRank++ : null;
        if(sizeof($detail) > 0){
            if($curRank < 5){
                $accesToRegist = true;
            }
            else if(sizeof($getRegist) >= 1){
                $accesToRegist = true;
            }
            else{
                $accesToRegist = true;
            }
            return view('kaizentaishi.SerPro', compact('associateid', 'detail', 'total', 'getname', 'winners', 'staff', 'associateidencode', 'accesToRegist', 'curRank'));
        }
        else{
            return view('kaizentaishi.no', compact('NombreReto', 'associateid', 'info', 'associateidencode', 'mensaje'));
        }
    }

    public function loadUpline(Request $request){
        $associateid = $request->associateid;
        $conexion = \DB::connection('sqlsrv5');
            $response = $conexion->select("exec Sp_UplineTree_SerPro $associateid;");
        \DB::disconnect('sqlsrv5');
        $result = "";
        foreach ($response as $option) {
            $associateid = trim($option->associateid, " ");
            $Name = trim($option->Name, " ");
            $result = $result . "<option value='$associateid-$Name'>$associateid - $Name</option>";
        }
        return $result;
    }

    public function no(Request $request){
        //$associateid = base64_decode($request->associateid);
        $associateid = $request->associateid;
        $NombreReto = "Reto SER PRO";
        $info = 'serpro.png';
        $mensaje = "No cumples con los requisitos para este programa.";
        $associateidencode = base64_encode($associateid);
        return view('kaizentaishi/no', compact('NombreReto', 'associateid', 'info', 'associateidencode', 'mensaje'));
    }

    public function registeClubV(Request $request){
        $_token = $request->_token;
        $abicode = $request->abicode;
        $abiName = $request->abiName;
        $dateReg = $request->dateReg;
        $sponsorCode = $request->sponsorCode;
        $sponsorName = $request->sponsorName;
        $rank = $request->rank;

        $conexion = \DB::connection('sqlsrv5');
            $getRegist = $conexion->select("SELECT * FROM Registros_SerPro WHERE Associateid = $abicode;");
            if(empty($getRegist)){
                $response = $conexion->insert("INSERT INTO Registros_SerPro(SponsorId, SponsorName, CreateDate, AssociateId, Rank) VALUES('$sponsorCode', '$sponsorName', '$dateReg', '$abicode', '$rank')");
            }
        \DB::disconnect('sqlsrv5');
        if(sizeof($getRegist) >= 1){
            return "exist";
        }
        else{
            return "registrado";
        }
    }
}