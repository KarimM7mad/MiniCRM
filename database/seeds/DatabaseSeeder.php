<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Company;
use App\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        //for DB testing
        Company::create([
            'name' => 'Google',
            'email' => 'Google@google.com',
            'website' => 'google.com',
            //must be uploaded from a dir
            'logo' => 'GoogleLogo.jpg'
        ]);

        Employee::create([
            'Fname' => 'Karim',
            'Lname' => 'Mohamed',
            'email' => 'K@test.com',
            'phone' => '01012223157',
            'company' => (App\Company::where('name', 'Google')->get())[0]['id']
        ]);
    }
}
