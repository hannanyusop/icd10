<?php

namespace App\Http\Controllers;

use App\Http\DataTables\ReportDataTable;
use App\Models\Report;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(ReportDataTable $reportDataTable)
    {
        return $reportDataTable->render('reports.index');
    }

    public function getCreate()
    {
        return view('reports.create');
    }

    public function postCreate()
    {
        request()->validate(Report::rules());

        Report::query()->create(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function getShow(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    public function getEdit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function patchEdit(Report $report)
    {
        request()->validate(Report::rules($report));

        $report->update(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function deleteDestroy(Report $report)
    {
        $report->forceDelete();

        return response()->json([
            'reload_table' => true,
        ]);
    }
}
