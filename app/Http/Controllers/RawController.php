<?php

namespace App\Http\Controllers;

use App\Http\DataTables\RawDataTable;
use App\Models\Raw;

class RawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(RawDataTable $rawDataTable)
    {
        return $rawDataTable->render('raws.index');
    }

    public function getCreate()
    {
        return view('raws.create');
    }

    public function postCreate()
    {
        request()->validate(Raw::rules());

        Raw::query()->create(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function getShow(Raw $raw)
    {
        return view('raws.show', compact('raw'));
    }

    public function getEdit(Raw $raw)
    {
        return view('raws.edit', compact('raw'));
    }

    public function patchEdit(Raw $raw)
    {
        request()->validate(Raw::rules($raw));

        $raw->update(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function deleteDestroy(Raw $raw)
    {
        $raw->forceDelete();

        return response()->json([
            'reload_table' => true,
        ]);
    }
}
