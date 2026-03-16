<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Process a payment (Stripe integration placeholder)
     */
    public function processPayment(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
        ]);

        // Stripe integration would go here when stripe/stripe-php is installed
        // Example (when package is installed):
        // \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        // $charge = \Stripe\Charge::create([
        //     'amount' => $request->amount * 100,
        //     'currency' => 'usd',
        //     'description' => 'Payment for order ' . $request->order_id,
        // ]);

        // Create payment record
        $payment = Payment::create([
            'order_id' => $request->order_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Payment processed successfully',
            'payment' => $payment,
        ], 201);
    }

    /**
     * Get payment status
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);

        return response()->json([
            'message' => 'ok',
            'payment' => $payment,
        ]);
    }

    public function updatePaymentStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required|string|in:pending,completed,failed,cancelled',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update($request->only('payment_status'));

        return response()->json([
            'message' => 'Payment status updated successfully',
            'payment' => $payment,
        ]);
    }

    public function index()
    {
        $payments = Payment::all();

        return response()->json([
            'message' => 'ok',
            'payments' => $payments,
        ]);
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json([
            'message' => 'Payment deleted successfully',
        ]);
    }
      
     
}
