<?php

namespace Database\Seeders;

use App\Models\Lpo;
use App\Models\Hotel;
use App\Models\LpoItem;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LposInvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            $randomHotel = Hotel::inRandomOrder()->first();
            $randomSupplier = Supplier::inRandomOrder()->first();

            $statuses = ['generated', 'posted', 'added_to_daily_lpos', 'approved', 'invoice_attached'];

            $lpo = Lpo::create([
                'hotel_id'                  => $randomHotel->id,
                'supplier_id'               => $randomSupplier->id,
                'order_number'              => fake()->unique()->regexify('[A-Z]{5}[0-4]{3}'),
                'tax_date'                  => now(),
                'payment_terms'             => 'cash',
                'delivery_date'             => now(),
                'status'                    => $statuses[array_rand($statuses)],
                'subtotal'                  => 20086.21,
                'vat_total'                 => 3213.79,
                'total_amount'              => 23300.00,
                'generated_by'              => 1,
                'added_to_daily_lpos_by'    => null,
                'approved_by'               => null,
                'invoice_attached_by'       => null,
                'created_at'                => now(),
                'updated_at'                => now(),
            ]);

            for ($j = 0; $j < 6; $j++) {
                $item = 'Item ' . ($j + 1);
                $description = 'Description ' . ($j + 1);
                $quantity = rand(1, 15);
                $rate = rand(100, 6500);
                $vat = 16; // VAT percentage
                $amount = ($quantity * $rate) * (1 + $vat / 100);

                LpoItem::create([
                    'lpo_id'            => $lpo->id,
                    'item_name'         => $item,
                    'description'       => $description,
                    'quantity'          => $quantity,
                    'unit_of_measure'   => 'unit',
                    'price'             => $rate,
                    'vat'               => $vat,
                    'amount'            => $amount,
                    'is_saved'          => (bool) random_int(0, 1),
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]);
            }
        }
    }
}
