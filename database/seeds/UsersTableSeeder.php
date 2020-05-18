<?php
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'トム',
            'email'=>'tom@example.com',
            'password'=>bcrypt('password'),
        ]);
    }
}