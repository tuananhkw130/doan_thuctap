<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $currentMonth = Carbon::now()->month;

        // Xác định mùa theo tháng
        if (in_array($currentMonth, [11, 12, 1])) {
            $season = 'winter';
        } elseif (in_array($currentMonth, [8, 9, 10])) {
            $season = 'autumn';
        } else {
            $season = 'other';
        }

        return view('client.home.index', compact('season'));
    }
}
