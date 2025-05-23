<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function search()
    {
        $query = request()->input('query');
        $products = Product::where('name', 'like', "%{$query}%")->paginate(6);
        return view('product.search', compact(['query', 'products']));
    }


    public function addToCart($id)
    {
        // session()->flush();
        $product = Product::find($id);
        $cart = session()->get('cart', []); // sẽ trả về mảng rỗng nếu chưa có cart, tránh lỗi undefined array key.
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'image' => $product->feature_image_path,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart); // lưu session cart để load trang khác vẫn ra được 
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }

    public function showCart()
    {
        $carts = session()->get('cart');
        return view('product.cart', compact('carts'));
    }

    public function updateCart()
    {
        $id = request()->input('id');
        $quantity = request()->input('quantity');
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
            // tinh tong 
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            return response()->json([
                'code' => 200,
                'cart_total' => $cart[$id]['price'] * $cart[$id]['quantity'],
                'grand_total' => $total,
            ]);
        }
        return response()->json(['code' => 404]);
    }

    public function deleteCart()
    {
        $id = request()->input('id');
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            // Tính lại tổng
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            return response()->json([
                'code' => 200,
                'grand_total' => $total,
            ]);
        }
        return response()->json(['code' => 404]);
    }
}
