<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RubroFormRequest;
use App\Rubro;
use DB;

class RubroController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $rubros = DB::table('rubro')->where('Descripcion', 'LIKE', '%' . $query . '%')
                ->orderBy('Id', 'asc')
                ->paginate(7);
            return view('catalogo.rubro.index', ["rubros" => $rubros, "searchText" => $query]);
        }
    }
    public function create()
    {
        return view("catalogo.rubro.create");
    }
    public function store(RubroFormRequest $request)
    {
        $rubro = new Rubro;
        $rubro->Descripcion = $request->get('Descripcion');
        $rubro->save();
        alert()->success('El registro ha sido agregado correctamente');
        return redirect()->action('RubroController@create');
        //return Redirect::to('catalogo.rubro');

    }
    public function show($id)
    {
        return view("catalogo.rubro.show", ["rubro" => Rubro::findOrFail($id)]);
    }
    public function edit($id)
    {
        //return view('products.edit',compact('product'));
        return view("catalogo.rubro.edit", ["rubro" => Rubro::findOrFail($id)]);
    }
    public function update(RubroFormRequest $request, $id)
    {
        $rubro = Rubro::findOrFail($id);
        $rubro->Descripcion = $request->get('Descripcion');
        $rubro->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/rubro/' . $id . '/edit');
     
    }
    public function destroy($id)
    {
        $rubro = Rubro::findOrFail($id);
        $rubro->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return redirect()->action('RubroController@index');
    }

}
