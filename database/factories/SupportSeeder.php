<?php

namespace Database\Factories;

use App\Enums\SupportStatusType;
use App\Models\Customer;
use App\Models\Support;
use App\Models\SupportStatusLog;
use App\Models\User;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    public function run(): void
    {
        // ログ記録用のユーザーを1人作成または取得
        $user = User::first() ?? User::factory()->create([
            'name' => 'Seeder Admin',
            'email' => 'admin@example.com',
        ]);

        Customer::factory(5)->create()->each(function ($customer) use ($user) {
            Support::factory(rand(1, 3))->create([
                'customer_id' => $customer->id,
            ])->each(function ($support) use ($user) {
                $status = collect(SupportStatusType::cases())->random();
                $support->update(['status' => $status]);

                SupportStatusLog::create([
                    'support_id'   => $support->id,
                    'from_status'  => SupportStatusType::RECEPTION->value,
                    'to_status'    => $status->value,
                    'updated_by'   => $user->id,
                    'created_at'   => now()->subDays(rand(1, 10)),
                    'updated_at'   => now()->subDays(rand(1, 10)),
                ]);
            });
        });
    }
}
