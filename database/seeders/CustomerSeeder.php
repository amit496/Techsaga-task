<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use Faker\Factory as Faker;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{

    public function run(): void
    {
        $customerFactory = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $customerRecord = new Customer();
            $customerRecord->name = $customerFactory->name();
            $customerRecord->email = $customerFactory->email();
            $customerRecord->contact = $customerFactory->phoneNumber();
            $customerRecord->password = Hash::make($customerFactory->password());
            $customerRecord->save();
        }
    }
}
