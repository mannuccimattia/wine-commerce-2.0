<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Denomination;
use App\Models\Region;
use App\Models\Wine;
use Illuminate\Http\Request;

class WineController extends Controller
{
    /**
     * Get wines metadata for search interface.
     */
    public function filters()
    {
        return response()->json([
            'data' => [
                'regions' => Region::has('wines')->orderBy('name')->get(['name', 'slug']),

                'denominations' => Denomination::orderBy('name')->pluck('name'),

                'price_range' => [
                    'min' => 0,
                    'max' => (float) Wine::max('price')
                ],
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $wines = Wine::query()
            ->with('category', 'region', 'denomination', 'winemaker')

            ->search($request->query('search'))

            ->when($request->category, fn($q, $slug) => $q->ofCategory($slug))
            ->when($request->min_price, function ($q, $min) use ($request) {
                $q->priceBetween($min, $request->max_price ?? 500);
            })
            ->when($request->region, fn($q, $slug) => $q->fromRegion($slug))
            ->when($request->winemaker, fn($q, $slug) => $q->fromWinemaker($slug))
            ->when($request->denomination, fn($q, $slug) => $q->ofDenominaiton($slug))

            ->sortBy(
                $request->input('sort', 'name'),
                $request->input('direction', 'asc')
            )

            ->get();

        return $wines->toResourceCollection();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wine $wine)
    {
        $wine->load('category', 'region', 'denomination', 'winemaker');

        return $wine->toResource();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
