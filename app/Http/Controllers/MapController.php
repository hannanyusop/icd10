<?php

namespace App\Http\Controllers;

use App\Http\DataTables\MapDataTable;
use App\Models\Map;

class MapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(MapDataTable $mapDataTable)
    {
        return $mapDataTable->render('maps.index');
    }

    public function getCreate()
    {
        return view('maps.create');
    }

    public function postCreate()
    {
        request()->validate(Map::rules());

        Map::query()->create(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function getShow(Map $map)
    {
        return view('maps.show', compact('map'));
    }

    public function getEdit(Map $map)
    {
        return view('maps.edit', compact('map'));
    }

    public function patchEdit(Map $map)
    {
        request()->validate(Map::rules($map));

        $map->update(request()->all());

        return response()->json([
            'dismiss_modal' => true,
            'reload_table' => true,
        ]);
    }

    public function deleteDestroy(Map $map)
    {
        $map->forceDelete();

        return response()->json([
            'reload_table' => true,
        ]);
    }
}
