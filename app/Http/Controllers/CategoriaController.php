<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoriaFormRequest;
use App\Categoria;
use DB;

class CategoriaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $categorias = DB::table('categoria as c')
            ->join('rubro as r' , 'c.Rubro', '=','r.Id')
            ->select('c.Id',  'c.Descripcion', 'r.Descripcion as Rubro')
            ->where('c.Descripcion', 'LIKE', '%' . $query . '%')
                ->orderBy('c.Id', 'asc')
                ->paginate(30);
            return view('catalogo.categoria.index', ["categorias" => $categorias, "searchText" => $query]);
        }
    }
    public function create()
    {
        $rubros = DB::table('rubro')->get();
        return view("catalogo.categoria.create",["rubros" => $rubros]);
    }
    public function store(CategoriaFormRequest $request)
    {
        $categoria = new Categoria;
        $categoria->Descripcion = $request->get('Descripcion');
        $categoria->Rubro = $request->get('Rubro');
        $categoria->save();
        alert()->success('El registro ha sido agregado correctamente');
        return redirect()->action('CategoriaController@create');
        //return Redirect::to('catalogo.categoria');

    }
    public function show($id)
    {
        return view("catalogo.categoria.show", ["categoria" => Categoria::findOrFail($id)]);
    }
    public function edit($id)
    {
        $rubros = DB::table('rubro')->get();
        return view("catalogo.categoria.edit", ["categoria" => Categoria::findOrFail($id),"rubros" => $rubros]);
    }
    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->Descripcion = $request->get('Descripcion');
        $categoria->Rubro = $request->get('Rubro');
        $categoria->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/categoria/' . $id . '/edit');
     
    }
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return redirect()->action('CategoriaController@index');
    }

}
