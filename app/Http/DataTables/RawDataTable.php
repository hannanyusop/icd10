<?php

namespace App\Http\DataTables;

use App\Models\Raw;
use Redbastie\Crudify\Traits\BuildsTables;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RawDataTable extends DataTable
{
    use BuildsTables;

    protected $model = Raw::class;

    public function dataTable($query)
    {
        return $this->dataTables($query)->editColumn('action', 'raws.action');
    }

    public function query(Raw $raw)
    {
        return $raw->newQuery();
    }

    public function html()
    {
        return $this->tableBuilder()->orderBy(0, 'desc');
    }

    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')->title(''),
        ];
    }
}
