<?php

namespace App\Services;

use App\Models\Registration;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Log;

class MidtransService
{
    public function __construct()
    {
        $this->initConfig();
    }

    /**
     * Initialize Midtrans configuration
     */
    private function initConfig(): void
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production', false);
        Config::$isSanitized = config('services.midtrans.is_sanitized', true);
        Config::$is3ds = config('services.midtrans.is_3ds', true);
    }

    /**
     * Create Snap token for payment popup
     */
    public function createSnapToken(Registration $registration): string
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->generateOrderId($registration),
                'gross_amount' => (int) $registration->total_amount,
            ],
            'customer_details' => [
                'first_name' => $registration->studentProfile->full_name ?? 'Customer',
                'email' => $registration->studentProfile->email ?? 'customer@example.com',
                'phone' => $registration->studentProfile->phone_number ?? '08123456789',
            ],
        ];

        Log::info('Creating Snap token', [
            'registration_code' => $registration->registration_code,
            'order_id' => $params['transaction_details']['order_id'],
        ]);

        return Snap::getSnapToken($params);
    }

    /**
     * Handle notification from Midtrans webhook
     */
    public function handleNotification(): array
    {
        $notif = new \Midtrans\Notification();

        $result = [
            'transaction_status' => $notif->transaction_status,
            'payment_type' => $notif->payment_type,
            'order_id' => $notif->order_id,
            'fraud_status' => $notif->fraud_status ?? 'accept',
        ];

        Log::info('Midtrans notification received', $result);

        return $result;
    }

    /**
     * Update registration status based on transaction status
     */
    public function updateRegistrationStatus(Registration $registration, string $transactionStatus, string $fraudStatus = 'accept'): void
    {
        $newStatus = $this->mapTransactionStatus($transactionStatus, $fraudStatus);
        
        $registration->update(['status' => $newStatus]);

        Log::info('Registration status updated', [
            'registration_code' => $registration->registration_code,
            'transaction_status' => $transactionStatus,
            'new_status' => $newStatus,
        ]);
    }

    /**
     * Map Midtrans transaction status to registration status
     */
    private function mapTransactionStatus(string $transactionStatus, string $fraudStatus): string
    {
        return match ($transactionStatus) {
            'capture' => $fraudStatus === 'accept' ? 'payment_verified' : 'pending_payment',
            'settlement' => 'payment_verified',
            'pending' => 'pending_payment',
            'deny', 'expire', 'cancel' => 'pending_payment',
            default => 'pending_payment',
        };
    }

    /**
     * Parse registration code from order ID
     */
    public function parseRegistrationCode(string $orderId): string
    {
        $parts = explode('-', $orderId);
        array_pop($parts); // Remove timestamp
        return implode('-', $parts);
    }

    /**
     * Generate unique order ID
     */
    private function generateOrderId(Registration $registration): string
    {
        return $registration->registration_code . '-' . time();
    }
}
