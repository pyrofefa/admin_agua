<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tiket;

class TiketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('cors');
        
    }
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $tiket = new Tiket($request->all());
        $tiket->save();
        $request -> session()->flash('nuevo', "Agregado con exito");
        return redirect()->route('home.index');  
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $tiket = Tiket::find($id);
        $tiket -> update($request->all());
        $request -> session()->flash('nuevo', "Agregado con exito");
        return redirect()->route('home.index');  
    }
    public function actualizar(Request $request, $id)
    {
        $tiket = Tiket::find($id);
        $tiket -> update($request->all());
        return response()->json($tiket);
    }
    public function destroy($id)
    {
        //
    }
}
