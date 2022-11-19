<?php

namespace Database\Seeders\Auth;

use App\Models\Auth\Role;
use App\Models\Auth\User;
use App\Models\Aux\Country;
use App\Models\Aux\Language;
use App\Models\Aux\Timezone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'username'      =>  'lop',
            'name'          =>  'José Luís López',
            'email'         =>  'jllopezvicente@gmail.com',
            'password'      =>  Hash::make('password'),
            'level'         =>  1,
            'timezone_id'   =>  Timezone::where('name',config('lopsoft.timezone_default'))->first()->id??null,
            'country_id'    =>  Country::where('country',config('lopsoft.country_default'))->first()->id??null,
            'language_id'   =>  Language::where('code','es')->first()->id??null,
            'date_format'   =>  config('lopsoft.date_format'),
        ]);

        User::create([
            'username'      =>  'jose',
            'name'          =>  'Jose Luis',
            'email'         =>  'llopez@gmail.com',
            'password'      =>  Hash::make('password'),
            'level'         =>  5,
            'timezone_id'   =>  Timezone::where('name',config('lopsoft.timezone_default'))->first()->id??null,
            'country_id'    =>  Country::where('country',config('lopsoft.country_default'))->first()->id??null,
            'language_id'   =>  Language::where('code','es')->first()->id??null,
            'date_format'   =>  config('lopsoft.date_format'),
        ]);
        
        // Factory

        $users=User::factory()->count(50)->create();
        /*foreach($users as $user)
        {
            $user->roles()->sync([
                                (Role::where('level',1000)->first())->id,

                            ]);
        }*/
    }
}
