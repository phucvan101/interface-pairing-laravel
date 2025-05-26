<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'orders';
    // Quan hệ với OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // Tạo mã đơn hàng tự động
    public static function generateOrderCode()
    {
        do {
            $code = 'ORD' . date('Ymd') . rand(1000, 9999);
        } while (self::where('order_code', $code)->exists());

        return $code;
    }
}
