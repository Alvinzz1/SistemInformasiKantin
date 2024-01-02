<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.cart.index', [
            'carts' => Cart::all(),
            'product' => Product::with('products'),
            
        ]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicate = Cart::where('product_id', $request->product_id)->where('user_id', auth()->id())->first();
        if($duplicate) {
            return redirect('/dashboard/cart')->with('error', 'Product sudah ada di dashboard/cart');
        }
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'qty' => 1
        ]);
        // Alert::succes('Success', 'Product berhasil masuk keranjang');
        return redirect('/dashboard/cart');
    }
    
    public function tambahQty(Request $request, $id)
    {
        $no = 1;
        $cart = Cart::find($id);
        $cart->product_id = $request->input('product_id');
        $cart->qty = $request->input('qty');
        $cart->update();
        return redirect('/dashboard/cart')->with('success', 'Jumlah berhasil ditambahkan');
        // dd($nilai);
    }
    
    public function kurangQty(Request $request, $id)
    {
        $cart = Cart::find($id);
    
        if ($cart->qty > 1) {
            $cart->product_id = $request->input('product_id');
            $cart->qty = $request->input('qty');
            $cart->update();
            return redirect('/dashboard/cart')->with('success', 'Jumlah berhasil dikurangi');
        } else {
            return redirect('/dashboard/cart')->with('error', 'jumlah minimal 1');
        }
    
        // dd($nilai);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        if ($cart->product->image) {
            Storage::delete($cart->product->image);
        }

        Cart::destroy($cart->id);
        return redirect('/dashboard/cart')->with('success', 'Barang berhasil dihapus');
    }
}
