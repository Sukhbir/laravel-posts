<?php


use Illuminate\Database\Seeder;
// namespace Database\Seeders;
// use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call(UsersTablesSeeder::class);
    }
}