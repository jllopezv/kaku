<?php

namespace Database\Seeders\Aux;

use App\Models\Aux\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $record=new Language;
        $record->language="Spanish";
        $record->code='es';
        $record->save();
        $record->setTranslation('language', 'es', mb_strtoupper('Español') );
        
        $record=new Language;
        $record->language="English";
        $record->code='en';
        $record->save();
        $record->setTranslation('language', 'es', mb_strtoupper('Inglés') );

    }
}
