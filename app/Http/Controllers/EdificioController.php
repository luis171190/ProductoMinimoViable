<?php

namespace ProductoMinimoViable\Http\Controllers;

use Illuminate\Http\Request;
use ProductoMinimoViable\Http\Request;
use ProductoMinimoViable\Edificio;
use Illuminate\Support\Facades\Redirect;
use ProductoMinimoViable\Http\Request\EdificioFormRequest;
use DB;

class EdificioController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$edificio=DB::table('edificio')->where('nombre','Like','%'.$query.'%')
    		->where ('condicion','=','1')
    		->orderBy('idedificio','desc')
    		->paginate (7);
    		return view ('almacen.edificio.index',["edificio" =>$edificio,"searchText" =>$query]);
    	}

    }
    public function create()
    {
    	return view("almacen.edificio.create");

    }
    public function store(EdificioFormRequest $request)
    {
    	$edificio=new Edificio;
    	$edificio->nombre=$request->get('nombre');
    	$edificio->usuario_id=$request->get('usuario_id');
    	$edificio->calle=$request->get('calle');
    	$edificio->numero_calle=$request->get('numero_calle');
    	$edificio->provincia=$request->get('provincia');
    	$edificio->localidad=$request->get('localidad');
    	$edificio->razon_social=$request->get('razon_social');
    	$edificio->cuit=$request->get('cuit');
    	$edificio->cant_pisos=$request->get('cant_pisos');
    	$edificio->save();
    	return Redirect::to('almacen/edificio');
    }
    public function show($id)
    {
    	return view("almacen.edificio.show",["edificio"=>Edificio::FinOrFail($id)]);
    }
    public function edit($id)
    {
    	return view("almacen.edificio.edit",["edificio"=>Edificio::FinOrFail($id)]);
    }
    public function update(EdificioFormRequest $request,$id)
    {
    	$edificio=Edificio::FinOrFail($id);
    	$edificio->nombre=$request->get('nombre');
    	$edificio->usuario_id=$request->get('usuario_id');
    	$edificio->calle=$request->get('calle');
    	$edificio->numero_calle=$request->get('numero_calle');
    	$edificio->provincia=$request->get('provincia');
    	$edificio->localidad=$request->get('localidad');
    	$edificio->razon_social=$request->get('razon_social');
    	$edificio->cuit=$request->get('cuit');
    	$edificio->cant_pisos=$request->get('cant_pisos');
    	$edificio->update();
    	return Redirect::to('almacen/edificio');
    	   	
    }
    public function destroy()
    {

    }
}
