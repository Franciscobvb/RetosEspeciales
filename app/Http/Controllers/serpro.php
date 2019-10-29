<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class serpro extends Controller
{
    //
    public function index($code,$staff){

       

        //$code_decode = base64_decode($code);

        $code_decode = $code;

    	//Generamos la conexion
    	$conexion = DB::connection('sqlsrv');

        $detail = $conexion->table('Reto_SerPro')->where('sponsor','=', $code_decode)->get();

        $total = $conexion->table('TotalPro')->where('sponsor','=',$code_decode)->get();
        
        $getname = $conexion->select('select distinct Sponsor,Nombre,Email,Rango,Pais from TotalPro where Sponsor = ?',[$code_decode]);
        
        $winners = $conexion->select('select * from TotalPro where Plata > =5 and Oro >=2 union all select * from TotalPro where Oro > = 4');   

        //cerramos la conexion
        \DB::disconnect('sqlsrv');      
        

        return view('kaizentaishi.SerPro', [ 'name' =>$getname ,'code'=>$code_decode, 'query' => $detail , 'total'=>$total, 'winners'=>$winners, 'staff'=>$staff]);
    }
}
