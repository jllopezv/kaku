<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

        'max'       =>
        [
            'string'    =>  'LA LONGITUD MÁXIMA ES DE :max',
            'numeric'   =>  'EL VALOR MÁXIMO ES :max',
            'file'      => 'EL TAMAÑO DEL ARCHIVO NO PUEDE SER MAYOR DE :max Kb.',

        ],
        'min'       =>
        [
            'string'    =>  'LA LONGITUD MÍNIMA ES DE :min',
            'numeric'   =>  'EL VALOR MÍNIMO ES :min',
        ],
        'required'  =>  'EL CAMPO NO PUEDE QUEDAR VACÍO',
        'unique'    =>  'EL VALOR YA EXISTE. DEBE SER ÚNICO',
        'integer'   =>  'ESTE CAMPO DEBE SER UN NÚMERO',
        'uploaded'  =>  'NO SE PUDO SUBIR EL ARCHIVO',
        'image'     =>  'EL ARCHIVO DEBE SER UNA IMAGEN',
        'mimes'     =>  'EL ARCHIVO DEBE SER DE UN TIPO: :values.',
        'mimetypes' =>  'EL ARCHIVO DEBE SER DE UNO DE ESTOS TIPOS: :values.',
        'string'    =>  'ESTE CAMPO DEBE SER UN TEXTO',
        'exists'    =>  'VALOR NO VÁLIDO',
        'array_size'=>  'DEBE SER UN ARRAY',
        'numeric'   =>  'DEBE INTRODUCIR UN NÚMERO',
        'date'      =>  'LA FECHA NO ES CORRECTA',
        'email'     =>  'EL CORREO ELECTRÓNICO NO ES VÁLIDO',
        'after'     =>  'LA FECHA DE FIN DEBE SER POSTERIOR A LA DE COMIENZO',
        'confirmed' =>  'LAS CONTRASEÑAS NO COINCIDEN',
        'current_password' => 'CONTRASEÑA INCORRECTA',
        'regex'     =>  'EL FORMATO NO ES VÁLIDO',
        'date_format'  => 'EL FORMATO DE LA FECHA NO ES VÁLIDO. DEBE SER :format',
        'after_or_equal' => 'LA FECHA DEBE SER IGUAL O POSTERIOR A :date'

];
