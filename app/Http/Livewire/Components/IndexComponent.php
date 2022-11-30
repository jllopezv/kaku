<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Lopsoft\IndexColumn;

class IndexComponent extends Component
{

    /*********************************************/
    /* PROPERTIES
    /*********************************************/

    public $columns = [];
    public $showedcolumns = [];
    public $sort;               // 'id,-age'
    public $search = '';
    
    public $dataset = [];       // Current subset showed in tables

    protected $query;           // Query Builder
    protected $alldata;         // Data Collection without pagination

    public $rowsselected=[];
    public $pagerowsselected=[];
    public $pagerows=[];

    public $page_total;
    public $page_current;
    public $page_perpage;
    public $page_offset;
    public $page_navigator = [];
    public $page_showed;

    public $showtable = false;      // Can be show table

    public $pagefixed = true;

    /*********************************************/
    /* MOUNT
    /*********************************************/
    public function mount()
    {
        // Defaults
        $this->page_current = 1;
        $this->page_perpage = config('lopsoft.default_paginate');
        $this->page_offset = 0;
        $this->sort='id';

    }

    public function hydrate()
    {
        //delayCom();
    }

    /*********************************************/
    /* LISTENERS
    /*********************************************/
    protected function getListeners()
    {

    }

    /*********************************************/
    /* METHODS
    /*********************************************/

    public function addColumn(IndexColumn $column)
    {
        $this->columns[]=(array)$column;
        if ($column->visible) $this->showedcolumns[]=count($this->columns)-1;
    }

    public function initComponent()
    {
        $this->showtable = true;
        $this->setColumns();            // Set Columns Info
        $this->reloadData();               // Get Data from query building
        $this->setPaginate();           // Set paginate
    }

    // Paginate Methods

    public function setPaginate()
    {

        // Only work with query builders     
        $this->page_total=$this->query->count();
        $this->query->offset($this->page_offset)->limit($this->page_perpage); // Pagination
        $this->getPaginationData();
    }

    public function paginationNext()
    {
        if ($this->page_current < $this->page_pages)
        {
            $this->page_offset+=$this->page_perpage;
            $this->page_current++;
        }
        $this->reloadData();
        //$this->getQueryData();
        //$this->setSelectAll();
    }

    public function paginationPrevious()
    {
        if ($this->page_current > 1)
        {
            $this->page_offset-=$this->page_perpage;
            $this->page_current--;
        }
        $this->reloadData();
        //$this->getQueryData();
        //$this->setSelectAll();
    }

    public function paginationFirst()
    {
        $this->page_offset=0;
        $this->page_current=1;
        $this->reloadData();
        //$this->getQueryData();
        //$this->setSelectAll();
    }

    public function paginationLast()
    {
        $this->page_offset=($this->page_pages-1)*$this->page_perpage;
        $this->page_current=$this->page_pages;
        $this->reloadData();
        //$this->getQueryData();
        //$this->setSelectAll();
    }

    public function navigateTo($page)
    {
        $this->page_current=$page;
        $this->page_offset=($page-1)*$this->page_perpage;
        $this->reloadData();
        //$this->getQueryData();
        //$this->setSelectAll();

    }

    public function getPaginationData()
    {
        $this->page_pages=ceil($this->page_total / $this->page_perpage);
        $this->page_showed=( $this->page_offset + $this->page_perpage > $this->page_total ) ? $this->page_total-$this->page_offset : $this->page_perpage;

        // Get pages arrays
        $this->page_navigator=[];
        for($i=$this->page_current-3;$i<$this->page_current;$i++)
        {
            if ($i>0) $this->page_navigator[]=$i;
        }
        $this->page_navigator[]=$this->page_current;
        for($i=$this->page_current+1;$i<=$this->page_current+3;$i++)
        {
            if ($i<=$this->page_pages) $this->page_navigator[]=$i;
        }

        $ids=$this->query->pluck('id');

        // get page selected
        $this->pagerowsselected=$ids
            ->filter(function ($value, $key) {
                return in_array($value, $this->rowsselected);
            })
            ->map(fn($id) => (string) $id)->toArray();

        // get page rows
        $this->pagerows=$ids->map(fn($id) => (string) $id)->toArray();
    }

    // Data Management

    public function getData()
    {
        $this->query = $this->getQuery();
        if ($this->search!='') $this->query->search($this->search);
    }
    
    public function reloadData()
    {
        $this->getData();
        $this->sortData();
        $this->setPaginate();
    }

    public function sortData()
    {
        $sorts = explode(',',$this->sort);
        foreach($sorts as $field)
        {
            $this->sortByField($field);
        }
    }

    

    // Fields Management

    public function renderField(String $field, Int $index, Int $row)
    {
        return $this->dataset[$index][$field];
    }

    public function setSort(String $field)
    {
        if (!$this->isSortable($field))
        {
            $this->reloadData();
            return;
        }
        $oldsort = $this->getSortDirection($field);
        if ( $oldsort===false )
        {
            $this->sort = $field;
        }
        else
        {
            if ( $oldsort == 'asc' ) $this->sort='-'.$field;
            if ( $oldsort == 'desc' ) $this->sort=$field;
        }
        $this->navigateTo(1);

    }

    public function getSortDirection(String $field) : String | bool
    {
        $sorts = explode(',',$this->sort);
        foreach($sorts as $sortitem)
        {
            if ($field==$sortitem) return 'asc';
            if ('-'.$field==$sortitem) return 'desc';
        }
        return false;
    }

    public function isActiveSort(String $field)
    {
        $sorts = explode(',',$this->sort);
        foreach($sorts as $sortitem)
        {
            if ($field==$sortitem || '-'.$field==$sortitem) return true;
        }
        return false;
    }

    public function sortByField(String $field)
    {
        if (Str::startsWith($field, '-'))
        {
            $this->query->orderByDesc(Str::replace('-','',$field));
        }
        else
        {
            $this->query->orderBy($field);
        }
    }

    public function isSortable(String $field)
    {
        foreach($this->columns as $column)
        {
            if ($column['field'] == $field) return $column['sortable'];
        }
        return false;
    }

    // Update properties

    public function updatedSearch()
    {
        $this->navigateTo(1);
        $this->select_page=false;
        $this->select_all=false;
        $this->rowsselected=[];
        $this->pagerowsselected=[];
    }

    // Events

    public function updateshowedcolumns()
    {
        foreach($this->columns as $index=>$column)
        {
            if (in_array($index, $this->showedcolumns))
            {
                $this->columns[$index]['visible']=true;
            }
            else
            {
                $this->columns[$index]['visible']=false;
            }
        }
        $this->reloadData();
    }

    public function updatepagefixed()
    {
        $this->reloadData();
    }

    /*********************************************/
    /* RENDER
    /*********************************************/

    public function render()
    {
        if ($this->showtable)
        {
            $this->dataset=($this->query!=null)?$this->query->get():collect([]);
        }
        else
        {
            $this->dataset=collect([]);
        }
        return view('livewire.index-component');
    }
}
