<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentTokenRequest;
use App\Models\Registration;
use App\Services\MidtransService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(
        private MidtransService $midtransService
    ) {}

    /**
     * Get Snap Token for payment popup
     */
    public function getToken(PaymentTokenRequest $request): JsonResponse
    {
        $registration = Registration::with('studentProfile')
            ->where('registration_code', $request->validated('registration_code'))
            ->firstOrFail();

        try {
            $snapToken = $this->midtransService->createSnapToken($registration);
            
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Handle callback from frontend after payment
     */
    public function handleCallback(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'registration_code' => 'required|string|exists:registrations,registration_code',
            'transaction_status' => 'required|string',
        ]);

        $registration = Registration::where('registration_code', $validated['registration_code'])->firstOrFail();

        $this->midtransService->updateRegistrationStatus(
            $registration,
            $validated['transaction_status']
        );

        return response()->json([
            'message' => 'Status updated',
            'new_status' => $registration->fresh()->status,
        ]);
    }

    /**
     * Handle Midtrans webhook notification
     */
    public function handleNotification(): JsonResponse
    {
        try {
            $notification = $this->midtransService->handleNotification();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid notification'], 400);
        }

        $registrationCode = $this->midtransService->parseRegistrationCode($notification['order_id']);
        $registration = Registration::where('registration_code', $registrationCode)->first();

        if (!$registration) {
            return response()->json(['message' => 'Registration not found'], 404);
        }

        $this->midtransService->updateRegistrationStatus(
            $registration,
            $notification['transaction_status'],
            $notification['fraud_status']
        );

        return response()->json(['message' => 'Payment status updated']);
    }
}
