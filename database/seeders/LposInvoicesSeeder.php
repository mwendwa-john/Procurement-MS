<?php

namespace Database\Seeders;

use App\Models\Lpo;
use App\Models\LpoItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LposInvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = ['generated', 'added_to_daily_lpos', 'approved', 'invoice_attached'];

        $lpo1 = Lpo::create([
            'hotel_id'                  => 2,
            'supplier_id'               => 2,
            'order_number'              => 787878,
            'po_no'                     => 11956,
            'tax_date'                  => now(),
            'payment_terms'             => 'cash',
            'delivery_date'             => now(),
            'status'                    => $statuses[array_rand($statuses)],
            'generated_by'              => 1,
            'added_to_daily_lpos_by'    => null,
            'approved_by'               => null,
            'invoice_attached_by'       => null,
            'created_at'                => now(),
            'updated_at'                => now(),
        ]);

        for ($i = 0; $i < 6; $i++) {
            $item = 'Item ' . ($i + 1);
            $description = 'Description ' . ($i + 1);
            $quantity = rand(1, 10);
            $rate = rand(100, 500);
            $vat = rand(5, 15); // VAT percentage
            $amount = ($quantity * $rate) * (1 + $vat / 100);

            LpoItem::create([
                'lpo_id'            => $lpo1->id,
                'item'              => $item,
                'description'       => $description,
                'quantity'          => $quantity,
                'unit_of_measure'   => 'unit',
                'price'             => $rate,
                'vat'               => $vat,
                'amount'            => $amount,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);

        }
    }
}
