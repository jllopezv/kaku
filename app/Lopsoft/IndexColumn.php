<?php

    namespace App\Lopsoft;

    class IndexColumn
    {
        public $title;
        public $name;
        public $field;
        public $visible;
        public $sortable;
        public $width;              // tailwindcss class format (ex.  w-20)
        public $columnclass;
        public $fieldclass;

        public function __construct($name, $title, $field, $visible = true, $sortable = true, $width = 'w-20', $columnclass = '', $fieldclass = '')
        {
            $this->name = $name;
            $this->title = $title;
            $this->field = $field;
            $this->width = $width;
            $this->visible = $visible;
            $this->sortable = $sortable;
            $this->columnclass = $columnclass;
            if ($fieldclass!='') 
            {
                $this->fieldclass = $fieldclass;
            }
            else
            {
                $this->fieldclass = $columnclass;
            }
        }
    }