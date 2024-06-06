<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PaymentStatus;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment_statuses = ['Paid','Pending','Unpaid'];

        foreach ($payment_statuses as $payment_status) {
            PaymentStatus::updateOrCreate(
                ['status'=>$payment_status],
                ['status'=>$payment_status]
            );
        }
    }
}
