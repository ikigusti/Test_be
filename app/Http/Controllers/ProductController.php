<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Product :: all();
        return view('product.index', compact('produk'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'uuid' => 'required|unique:products',
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'nama_game' => 'required',
        ]);

        $produk = new Product();
        $produk->uuid = $request->uuid;
        $produk->name = $request->name;

        $produk->type = $request->type;
        $produk->price = $request->price;
        $produk->quantity = $request->quantity;
        $produk->nama_game = $request->nama_game;
        $produk->save();
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produck = Product::findOrFail($id);
        return view('product.show', compact('produck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produck = Product::findOrFail($id);
        return view('product.edit', compact('produck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([

            'uuid' => 'required|unique:products',
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'nama_game' => 'required',
        ]);

        $produk = new Product();
        $produk->uuid = $request->uuid;
        $produk->name = $request->name;

        $produk->type = $request->type;
        $produk->price = $request->price;
        $produk->quantity = $request->quantity;
        $produk->nama_game = $request->nama_game;
        $produk->save();
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
