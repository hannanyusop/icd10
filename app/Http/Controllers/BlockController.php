<?php

namespace App\Http\Controllers;

use App\Http\DataTables\BlockDataTable;
use App\Models\Block;

class BlockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(BlockDataTable $blockDataTable)
    {
        return $blockDataTable->render('blocks.index');
    }

    public function getCreate()
    {
        return view('blocks.create');
    }

    public function postCreate()
    {
        request()->validate(Block::rules());

        Block::query()->create(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function getShow(Block $block)
    {
        return view('blocks.show', compact('block'));
    }

    public function getEdit(Block $block)
    {
        return view('blocks.edit', compact('block'));
    }

    public function patchEdit(Block $block)
    {
        request()->validate(Block::rules($block));

        $block->update(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function deleteDestroy(Block $block)
    {
        $block->forceDelete();

        return response()->json([
            'reload_table' => true,
        ]);
    }
}
