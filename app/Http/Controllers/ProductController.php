<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product = Product::all();
        return view('page.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = 'create';
        return view('page.product.form',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'color' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Product::create($request->all());

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
    
            // Simpan data produk dan nama file gambar ke database
            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'color' => $request->color,
                'image' => $imageName,
            ]);
    
            
        }
        return redirect()->route('product.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('page.product.detail',compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = "edit";
        $product = Product::findOrFail($id);
        return view('page.product.form',compact("type","product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required',
            'color' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product = Product::findOrFail($id);
        // $product->update($request->all());

        // Proses update gambar jika ada file gambar baru yang diunggah
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }
        // Upload gambar baru
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Update kolom 'image' dengan nama gambar baru
        $product->image = $imageName;
    }
    // Update kolom lain dari produk
    
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'color' => $request->color,
    ]);


    
        return redirect()->route('product.index');

    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }
        $product->delete();
        return redirect()->route('product.index');
    }

    public function list(){
        $products = Product::all();
        return view('page.listproduct',compact('products'));
    }
}
