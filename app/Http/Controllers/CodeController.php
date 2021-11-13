<?php

namespace App\Http\Controllers;

use App\Http\DataTables\CodeDataTable;
use App\Models\Code;

class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(CodeDataTable $codeDataTable)
    {
        return $codeDataTable->render('codes.index');
    }

    public function getCreate()
    {
        return view('codes.create');
    }

    public function postCreate()
    {
        request()->validate(Code::rules());

        Code::query()->create(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function getShow(Code $code)
    {
        return view('codes.show', compact('code'));
    }

    public function getEdit(Code $code)
    {
        return view('codes.edit', compact('code'));
    }

    public function patchEdit(Code $code)
    {
        request()->validate(Code::rules($code));

        $code->update(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function deleteDestroy(Code $code)
    {
        $code->forceDelete();

        return response()->json([
            'reload_table' => true,
        ]);
    }
}
