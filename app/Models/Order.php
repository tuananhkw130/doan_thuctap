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
    ];

    public function getStatusStr() {
        switch ($this->status) {
            case OrderStatus::ORDER:
                return '<span class="badge badge-warning">Chờ xác nhận</span>';
            default:
                return 'Trạng thái không xác định';
        }
    }
}
