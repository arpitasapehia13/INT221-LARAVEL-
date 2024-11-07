<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cart extends Controller
{
    public function showCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function addProductForm()
    {
        return view('add-product');
    }

    public function addProduct(Request $request)
    {
        $product = [
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity')
        ];

        $cart = $request->session()->get('cart', []);
        $cart[$product['id']] = $product;
        $request->session()->put('cart', $cart);

        return redirect()->route('show');
    }

    public function removeFromCart(Request $request)
    {
        $productId = $request->input('id');
        $cart = $request->session()->get('cart', []);
        unset($cart[$productId]);
        $request->session()->put('cart', $cart);

        return redirect()->route('show');
    }
}

?>