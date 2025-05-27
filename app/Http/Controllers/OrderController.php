<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{
    //
    public function showOrder()
    {
        $carts = session()->get('cart', []);
        // kiểm tra giỏ hàng có rỗng không
        if (empty($carts)) {
            return redirect()->route('home')->with('error', 'Giỏ hàng trống, không thể đặt hàng, Vui lòng thêm vào giỏ hàng.');
        }
        return view('home.showCheckout', compact('carts'));
    }

    public function createOrder(Request $request)
    {
        $carts = session()->get('cart', []);

        try {
            DB::beginTransaction();

            $totalAmount = 0;
            foreach ($carts as $cartItem) {
                $totalAmount += $cartItem['price'] * $cartItem['quantity'];
            }

            // lưu đơn hàng
            $order = Order::create([
                'customer_id' => auth()->check() ? auth()->id() : null,
                'order_code' => Order::generateOrderCode(),
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'total_amount' => $totalAmount,
            ]);

            // Lưu chi tiết đơn hàng
            foreach ($carts as $productId => $cartItem) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'product_name' => $cartItem['name'],
                    'product_image' => $cartItem['image'],
                    'quantity' => $cartItem['quantity'],
                    'product_price' => $cartItem['price'],
                    'total_price' => $cartItem['price'] * $cartItem['quantity']
                ]);
            }

            session()->forget('cart');
            DB::commit();
            return redirect()->route('home')->with('success', 'Đặt hàng thành công! Mã đơn hàng: ' . $order->order_code);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . '--- Line: ' . $e->getLine());
            return redirect()->route('showCart')->with('error', 'Đặt hàng thất bại: ' . $e->getMessage());
        }
    }
}
