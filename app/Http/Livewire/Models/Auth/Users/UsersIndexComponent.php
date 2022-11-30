<?php

    namespace App\Http\Livewire\Models\Auth\Users;

    use App\Http\Livewire\Components\IndexComponent;
    use App\Models\Auth\User;
    use App\Lopsoft\IndexColumn;
    
    class UsersIndexComponent extends IndexComponent
    {
        public function setColumns()
        {
            $this->addColumn(new IndexColumn(transup('id'), transup('id'), 'id', true, false, 'w-24', 'justify-center', 'justify-end' ));
            $this->addColumn(new IndexColumn(transup('avatar'), '', 'photo', true, false, 'w-20', 'justify-center bg-red-500' ));
            $this->addColumn(new IndexColumn(transup('user'), transup('user'), 'username', true, true, 'w-48'));
            $this->addColumn(new IndexColumn(transup('name'), transup('name'), 'name', true, false, 'w-48'));
            $this->addColumn(new IndexColumn(transup('email'), transup('email'), 'email', true, false, 'w-96'));
        }

        public function getQuery()
        {
            return User::query();
        }

        public function renderField(String $field, Int $index, Int $row)
        {
            switch($field)
            {
                case 'photo':
                    return "photo";
                    break;
                default:
                    return parent::renderField($field, $index, $row);
            }

        }

    }