<?php

namespace App\Http\DataTables;

use App\Models\Report;
use Redbastie\Crudify\Traits\BuildsTables;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ReportDataTable extends DataTable
{
    use BuildsTables;

    protected $model = Report::class;

    public function dataTable($query)
    {
        return $this->dataTables($query)->editColumn('action', 'reports.action');
    }

    public function query(Report $report)
    {
        return $report->newQuery();
    }

    public function html()
    {
        return $this->tableBuilder()->orderBy(0, 'desc');
    }

    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('report_id'),
            Column::make('report_chapter'),
            Column::make('report_block'),
            Column::make('report_blockdesc'),
            Column::computed('action')->title(''),
        ];
    }
}
