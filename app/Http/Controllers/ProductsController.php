<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $keyword = $request->search;
    $products = Product::where('name', 'like', "%" . $keyword . "%")->paginate(5)->withQueryString();
    return view('dashboard.products.index', ['products' => $products]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create',[
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'harga' => 'required|integer|min:5',
            'desc' => 'required|min:10',
            'category_id' => 'required',
            'image' => 'required|image|file|max:1024'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('/images');
            $validatedData['image'] = str_replace('public/', '', $validatedData['image']);
        }




        // @dd($validatedData);
        // $validatedData['image'] = $validatedData['image']->store('product-image');
        Product::create($validatedData);

        return redirect('/dashboard/admin/products')->with('success', 'product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findorfail($id);
        $category = Category::all();
        // $product->update($request->all());


        // return redirect('/dashboard/admin/products')->with('success', 'product berhasil diedit');
        return view('dashboard.Products.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // $product = Product::findorfail($id);
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'harga' => 'required|integer|min:5',
            'category_id' => 'required',
            'desc' => 'required|min:5',
            'image' => 'image|file|max:1024'
        ]);
        
            $validatedData['image'] = $request->file('image')->store('/products-image');

            if ($request->file('image')) {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }

                $validatedData['image'] = $request->file('image')->store('images');
                // $validatedData['image'] = str_replace('public/', '', $validatedData['image']);
            
        }
    

        $product->update($validatedData);
        return redirect('/dashboard/admin/products')->with('success', 'product berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }

        Product::destroy($product->id);
        return redirect('/dashboard/admin/products')->with('success', 'Barang berhasil dihapus');
    }
}
