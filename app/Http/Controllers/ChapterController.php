<?php

namespace App\Http\Controllers;

use App\Http\DataTables\ChapterDataTable;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(ChapterDataTable $chapterDataTable)
    {
        return $chapterDataTable->render('chapters.index');
    }

    public function getCreate()
    {
        return view('chapters.create');
    }

    public function postCreate()
    {
        request()->validate(Chapter::rules());

        Chapter::query()->create(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function getShow(Chapter $chapter)
    {
        return view('chapters.show', compact('chapter'));
    }

    public function getEdit(Chapter $chapter)
    {
        return view('chapters.edit', compact('chapter'));
    }

    public function patchEdit(Chapter $chapter)
    {
        request()->validate(Chapter::rules($chapter));

        $chapter->update(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function deleteDestroy(Chapter $chapter)
    {
        $chapter->forceDelete();

        return response()->json([
            'reload_table' => true,
        ]);
    }
}
