este es el contenido del user


{{ auth()->user()->mainRole->permissions }}

acceso: {{ auth()->user()->hasAbility('users.index') }}
