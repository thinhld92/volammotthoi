<?php

namespace App\Http\Controllers\Backend;

use App\Enums\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $array_accept = [
            PaymentStatus::PENDING
        ];
        $status = $request->status ?? PaymentStatus::PENDING;
        $paymentStatuses = PaymentStatus::asSelectArray();
        $search = $request->get('search');
        $query = Payment::query();
        if ($search) {
            $query->where('cAccName', 'like', "%{$search}%");
        }
        if ($status > 0) {
            $query->where('status', $status);
        }
        $payments = $query
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        $payments->appends([
            'search'=> $search,
            'status'=> $status,
        ]);

        // tính tổng số tiền
        $totalAmount = 0;
        $queryAmount = Payment::query();
        if ($search) {
            $queryAmount->where('cAccName', 'like', "%{$search}%");
        }
        if ($status > 0) {
            $queryAmount->where('status', $status);
        }
        $totalAmount = $queryAmount->sum('amount');

        return view('backend.payments.index', compact(
            'payments',
            'search',
            'paymentStatuses',
            'status',
            'array_accept',
            'totalAmount',
        ));
    }

    public function edit(){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        // dd($payment->account_habitus->nExtPoint);
        $payment->status = $request->status;
        $status = $request->status;
        if ($status == PaymentStatus::COMPLETED) {
            $payment->account_habitus->update([
                'nExtPoint' => (int)$payment->account_habitus->nExtPoint + (int)$payment->coin
            ]);
        }
        $payment->update();
        $message = 'Hoàn thành xác nhận thanh toán cho User ' .$payment->cAccName;
        User::sendMessageToTelegram($message);
        return redirect()->route('admin.payments.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
