<?php

namespace App\Http\DataTables;

use App\Models\Map;
use Redbastie\Crudify\Traits\BuildsTables;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MapDataTable extends DataTable
{
    use BuildsTables;

    protected $model = Map::class;

    public function dataTable($query)
    {
        return $this->dataTables($query)->editColumn('action', 'maps.action');
    }

    public function query(Map $map)
    {
        return $map->newQuery();
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
