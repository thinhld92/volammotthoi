<?php

namespace App\Http\Controllers\HoTro;

use App\Enums\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\File;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create(){
        return view('hotro.payments.create');
    }

    public function store(PaymentRequest $request){
        $data = $request->all();
        $data['status'] = PaymentStatus::INIT;
        $data['cAccName'] = auth()->user()->cAccName;
        $payment = Payment::create($data);

        $message = 'User '.auth()->user()->cAccName." tạo y/c nạp tiền ". $request->amount ." VND, chờ thanh toán, xác nhận";
        User::sendMessageToTelegram($message);
        return redirect()->route('hotro.payments.transfer', [$payment]);
    }

    public function transfer(Payment $payment){
        $user = auth()->user();
        if ($payment->status == PaymentStatus::INIT && $user->cAccName == $payment->cAccName) {
            return view('hotro.payments.transfer', compact(
                'payment'
            ));
        }
        return redirect()->route('hotro.dashboard');
    }

    public function transaction(Request $request, Payment $payment){
        if ($request->file('image')) {
            $file = $request->file('image');
            $directory = storage_path('app/public/users/payments/');
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0775, true);
            }
            $fileName = substr(md5(uniqid().time()),6,6) . $file->getClientOriginalName();
            $urlFile = env('APP_URL').'/storage/users/payments/' . $fileName;
            $filePath = $directory . '/' . $fileName;
            $image = Image::make($file)
                    ->save($filePath);
    
            $payment->image = $urlFile;
            $payment->status = PaymentStatus::PENDING;
            $payment->update();

            $message = 'User '.auth()->user()->cAccName." xác nhận nạp tiền ".$payment->amount." VND, hãy kiểm tra cọng xu";
            $urlPhoto = $_SERVER['SERVER_NAME']."/".$urlFile;
            User::sendPhotoToTelegram($message, $urlPhoto);

            return redirect()->route('hotro.dashboard')->with('success', 'Chờ xác nhận thanh toán');
        }
        return redirect()->route('hotro.dashboard')->with('error', 'Oop, đã có lỗi xảy ra, xin kiểm tra và thử lại');

        
    }

    public function genPaymentInfo(Request $request){
        $amount = (int) $request->amount;
        $coin = (int) $request->coin;
        $data = [];
        if ($amount > 0) {
            $coin = $this->calulateCoin($amount);
            $data['coin'] = $coin;
            $data['amount'] = $amount;
        }elseif($coin > 0){
            $amount = $this->calulateAmount($coin);
            $data['coin'] = $coin;
            $data['amount'] = $amount;
        }
        return response()->json($data);
    }

    // private function calulateCoin($amount){
    //     $coin = $amount*10/1000;
    //     $user = auth()->user();
    //     $payments = Payment::query()
    //         ->where('cAccName', '=', $user->cAccName)
    //         ->where(function($query){
    //             $query->where('status', '=', PaymentStatus::PENDING)
    //             ->orWhere('status', '=', PaymentStatus::COMPLETED)
    //             ->orWhere('status', '=', PaymentStatus::INIT);
    //         })
    //         ->get();
    //     if ($payments->count()) {
    //         if ($amount >= 2000000) {
    //             $coin = $coin * 1.5;
    //         }elseif ($amount >= 1000000) {
    //             $coin = $coin * 1.3;
    //         }
    //     }
    //     else{
    //         $coin = $coin * 2;
    //     }

    //     return $coin;
    // }

    private function calulateCoin($amount){
        $coin = $amount*10/1000;
        if ($amount >= 2000000) {
            $coin = $coin * 1.5;
        }elseif ($amount >= 1000000) {
            $coin = $coin * 1.3;
        }elseif ($amount >= 500000) {
            $coin = $coin * 1.2;
        }elseif ($amount >= 100000) {
            $coin = $coin * 1.1;
        }

        return $coin;
    }

    // function này sai, khôgn tính toán dựa trên số xu được vì có bước nhảy
    private function calulateAmount($coin){
        $amount = $coin*1000/10;
        $user = auth()->user();
        $payments = Payment::query()
            ->where('cAccName', '=', $user->cAccName)
            ->orWhere('status', '=', PaymentStatus::INIT)
            ->orWhere('status', '=', PaymentStatus::PENDING)
            ->orWhere('status', '=', PaymentStatus::COMPLETED)
            ->get();
        if ($payments->count()) {
            if ($amount/1.5 >= 2000000) {
                $amount = $amount / 1.5;
            }elseif ($amount/1.3 >= 1000000) {
                $amount = $amount / 1.3;
            }
        }
        else{
            $amount = $amount / 2;
        }
        return $amount;
    }

    public function cancel(Payment $payment){
        $payment->status = PaymentStatus::CANCEL;
        $payment->update();
        return redirect()->route('hotro.dashboard')->with('success', 'Huỷ lệnh nạp thành công');
    }

    
}
