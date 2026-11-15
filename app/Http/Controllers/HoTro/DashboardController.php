<?php

namespace App\Http\Controllers\HoTro;

use App\Enums\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $array_accept = [
            PaymentStatus::INIT
        ];
        $array_cancel = [
            PaymentStatus::INIT
        ];
        $user = auth()->user();
        $opening_time = getWebsiteConfig('opening_time') ?? '2024-05-03';
        $payments = Payment::query()
                ->where('cAccName', $user->cAccName)
                ->where('created_at', '>', $opening_time)
                ->orderBy('created_at', 'desc')
                ->get()
                ;
        $view = layoutView('hotro.dashboard', 'hotro.v2.dashboard', 'hotro.v3.dashboard');
        return view($view, compact(
            'user',
            'payments',
            'array_cancel',
            'array_accept',
        ));
    }

    
}
