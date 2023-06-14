<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Midtrans\Config;

class MidtransController extends Controller
{
    public function callback()
    {
        // Set Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat Instance Midtrans Notification
        $notification = new Notification();

        // Assign ke Variabel Untuk Memudahkan Coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Get Transaction ID
        $order = explode('-', $order_id);

        // Cari Transaksi Berdasarkan ID
        $transaction = Transaction::findOrFail($order[1]);

        // Handle Notification Status Midtrans
        if($status == 'capture') {
            if($type == 'credit_card'){
                if($route == 'chalengge'){
                    $transaction->status = 'PENDING';
                }
                else {
                    $transaction->status = 'SUCCESS';
                }
            }
        }

        else if($status == 'settlement'){
            $transaction->status = 'SUCCESS';
        }

        else if($status == 'pending'){
            $transaction->status = 'PENDING';
        }

        else if($status == 'deny'){
            $transaction->status = 'PENDING';
        }

        else if($status == 'expire'){
            $transaction->status = 'CANCELLED';
        }

        else if($status == 'cancel'){
            $transaction->status = 'CANCELLED';
        }

        // Simpan Traansaction
        $transaction->save();

        // Return Response Midtrans
        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'Midtrans Notification Success!'
            ]
        ]);
    }
}
