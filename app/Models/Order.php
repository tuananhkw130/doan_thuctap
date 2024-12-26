<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "userID",
        "fullname",
        "phone",
        "address",
        "total",
        "status",
        "message",
        "paymentstatus",
    ];

    protected $orderBy = ['created_at' => 'desc'];

    public function statusOrder()
    {
        switch ($this->status) {
            case OrderStatus::ORDER:
                return '<span class="badge badge-warning">Chờ giao hàng</span>';
            case OrderStatus::CANCEL_ORDER:
                return '<span class="badge badge-danger">Đã hủy</span>';
            case OrderStatus::DELIVERY:
                return '<span class="badge badge-info">Giao hàng</span>';
            case OrderStatus::ORDER_SUCCESS:
                return '<span class="badge badge-success">Thành công</span>';
            default:
                return 'Trạng thái không xác định';
        }
    }
}
