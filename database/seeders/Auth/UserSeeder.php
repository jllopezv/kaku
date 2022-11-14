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
        $user=new User;
        $user->username='lop';
        $user->name='José Luís López';
        $user->email='jllopezvicente@gmail.com';
        $user->password=Hash::make('secret');
        $user->level=1;
        $user->timezone_id=Timezone::where('name',config('lopsoft.timezone_default'))->first()->id??null;
        $user->country_id=Country::where('country',config('lopsoft.country_default'))->first()->id??null;
        $user->language_id=Language::where('code','es')->first()->id??null;
        $user->dateformat=config('lopsoft.date_format');
        $user->save();
        $user->roles()->sync([(Role::where('level',1)->first())->id, (Role::where('level',5)->first())->id]);


        $user=new User;
        $user->username='jose';
        $user->name='Jose';
        $user->email='jllopez@gmail.com';
        $user->password=Hash::make('secret');
        $user->level=5;
        $user->timezone_id=Timezone::where('name',config('lopsoft.timezone_default'))->first()->id??null;
        $user->country_id=Country::where('country',config('lopsoft.country_default'))->first()->id??null;
        $user->language_id=Language::where('code','es')->first()->id??null;
        $user->dateformat=config('lopsoft.date_format');
        $user->save();
        $user->roles()->sync([  (Role::where('level',5)->first())->id,
                                (Role::where('level',1000)->first())->id,
                                (Role::where('level',1002)->first())->id,
                                (Role::where('level',1003)->first())->id,
                                (Role::where('level',1004)->first())->id,
                            ]);


        $user=new User;
        $user->username='condo';
        $user->name='Condo Admin';
        $user->email='jlopez@lopsoft.com';
        $user->password=Hash::make('secret');
        $user->level=6;
        $user->timezone_id=Timezone::where('name',config('lopsoft.timezone_default'))->first()->id??null;
        $user->country_id=Country::where('country',config('lopsoft.country_default'))->first()->id??null;
        $user->language_id=Language::where('code','es')->first()->id??null;
        $user->dateformat=config('lopsoft.date_format');
        $user->save();
        $user->roles()->sync([  (Role::where('level',2004)->first())->id ]);



        // Factory

        $users=User::factory()->count(50)->create();
        foreach($users as $user)
        {
            $user->roles()->sync([
                                (Role::where('level',1000)->first())->id,

                            ]);
        }
    }
}
