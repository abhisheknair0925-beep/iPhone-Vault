<?php

namespace App\Http\Controllers;

use App\Models\IphoneModel;
use App\Models\Phone;
use App\Models\Shop;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    /**
     * Display all available phones for the selected iPhone model.
     */
    public function show(Request $request, $id)
    {
        $model = IphoneModel::findOrFail($id);
        
        // Start builder for phones of this model
        $query = Phone::with(['shop', 'images'])
            ->where('model_id', $model->id)
            ->where('status', 'Available');

        // Apply filters if present
        if ($request->filled('storage')) {
            $query->where('storage', $request->storage);
        }

        if ($request->filled('condition')) {
            $query->where('condition_grade', $request->condition);
        }

        if ($request->filled('shop_id')) {
            $query->where('shop_id', $request->shop_id);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('min_battery')) {
            $query->where('battery_health', '>=', $request->min_battery);
        }

        if ($request->filled('color')) {
            $query->where('color', $request->color);
        }

        // Get the phones
        $phones = $query->orderBy('price', 'asc')->get();

        // Get unique colors, storages, and shops for filter dropdowns
        $availableStorages = Phone::where('model_id', $model->id)
            ->where('status', 'Available')
            ->distinct()
            ->pluck('storage');

        $availableConditions = Phone::where('model_id', $model->id)
            ->where('status', 'Available')
            ->distinct()
            ->pluck('condition_grade');

        $availableColors = Phone::where('model_id', $model->id)
            ->where('status', 'Available')
            ->distinct()
            ->pluck('color');

        $shopIds = Phone::where('model_id', $model->id)
            ->where('status', 'Available')
            ->distinct()
            ->pluck('shop_id');
            
        $availableShops = Shop::whereIn('id', $shopIds)->get();

        return view('models.show', compact(
            'model', 
            'phones', 
            'availableStorages', 
            'availableConditions', 
            'availableColors',
            'availableShops'
        ));
    }
}
