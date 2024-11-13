<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {

        return view('admin.home.index');
    }
}
