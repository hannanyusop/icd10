<?php

namespace App\Http\DataTables;

use App\Models\Chapter;
use Redbastie\Crudify\Traits\BuildsTables;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ChapterDataTable extends DataTable
{
    use BuildsTables;

    protected $model = Chapter::class;

    public function dataTable($query)
    {
        return $this->dataTables($query)->editColumn('action', 'chapters.action');
    }

    public function query(Chapter $chapter)
    {
        return $chapter->newQuery();
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
