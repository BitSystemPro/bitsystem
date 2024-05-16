<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produto = Produto::paginate(20);
        $categorias = Categoria::all();
        return view('admin.produtos', compact('produto', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = $request->all();

        if ($request->imagem) {
            $produto['imagem'] = $request->imagem->store('produtos');
            $manager = new ImageManager(new Driver());
            $image = $manager->read('storage/app/public/produtos');
            $image->resize(width: 300, height:300);
            $image->save(path:storage_path('storage/app/public/produtos/'));
        }

        $produto['slug'] = Str::slug($request->nome);

        $produto = Produto::create($produto);
        return redirect()->route('admin.produtos')->with('sucesso', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('sucesso', 'Produto removido com sucesso!');
    }
}
