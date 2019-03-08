<?php

use Illuminate\Database\Seeder;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            'name' => 'Selva Murugan',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);

        $customers = [
            ['name' => 'Test Customer','mobile' => '1234567890','address' => 'Tiruchengode','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Test Customer1','mobile' => '1234567891','address' => 'Tiruchengode','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Test Customer2','mobile' => '1234567892','address' => 'Tiruchengode Namakkal','created_at'=>now(),'updated_at'=>now()],
        ];
        DB::table('customers')->insert($customers);

        $sub_customers = [
            ['customer_id' => '1','name' => 'Test Customer','mobile' => '1234567890','address' => 'Tiruchengode','created_at'=>now(),'updated_at'=>now()],
            ['customer_id' => '1','name' => 'Test Customer1','mobile' => '1234567891','address' => 'Tiruchengode','created_at'=>now(),'updated_at'=>now()],
            ['customer_id' => '2','name' => 'Test Customer2','mobile' => '1234567892','address' => 'Tiruchengode','created_at'=>now(),'updated_at'=>now()],
            ['customer_id' => '2','name' => 'Test Customer3','mobile' => '1234567893','address' => 'Tiruchengode','created_at'=>now(),'updated_at'=>now()],
        ];
        DB::table('sub_customers')->insert($sub_customers);

        $Company = [
            ['company_name' => 'Rewainding Cone','created_at'=>now(),'updated_at'=>now()],
            ['company_name' => 'Baby Cone','created_at'=>now(),'updated_at'=>now()],
            ['company_name' => 'Test Company1','created_at'=>now(),'updated_at'=>now()],
            ['company_name' => 'Test Company2','created_at'=>now(),'updated_at'=>now()],
        ];
        DB::table('companies')->insert($Company);

        $Units = [
            ['name' => 'Unit I','mobile' => '1234567890','address' => 'Tiruchengode','gst' => 'GST001','created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Unit II','mobile' => '1234567891','address' => 'Tiruchengode Namakkal','gst' => 'GST002','created_at'=>now(),'updated_at'=>now()],
        ];
        DB::table('units')->insert($Units);

    }
}
