<?php

namespace App\Http\DataTables;

use App\Models\Block;
use Redbastie\Crudify\Traits\BuildsTables;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BlockDataTable extends DataTable
{
    use BuildsTables;

    protected $model = Block::class;

    public function dataTable($query)
    {
        return $this->dataTables($query)->editColumn('action', 'blocks.action');
    }

    public function query(Block $block)
    {
        return $block->newQuery();
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
