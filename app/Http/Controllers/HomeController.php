<?php

namespace App\Http\Controllers;

use App\Models\IphoneModel;
use App\Models\Phone;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the application homepage.
     */
    public function index()
    {
        // Fetch stats dynamically
        $storesCount = Shop::where('status', 'Active')->count();
        $devicesCount = Phone::where('status', 'Available')->count();
        $happyCustomers = 1200; // Static premium stat: 1200+ customers

        // Fetch all models
        $models = IphoneModel::orderBy('id', 'asc')->get();

        // Get Deal of the Day: pick the phone with highest battery health
        $dealPhone = Phone::with(['model', 'shop', 'images'])
            ->where('status', 'Available')
            ->orderByDesc('battery_health')
            ->first();

        // Fetch shops with available stock count
        $shops = Shop::withCount(['phones' => function ($query) {
            $query->where('status', 'Available');
        }])->where('status', 'Active')->get();

        // Fetch latest arrivals (10 most recent devices)
        $latestArrivals = Phone::with(['model', 'shop', 'images'])
            ->where('status', 'Available')
            ->orderByDesc('created_at')
            ->take(10)
            ->get();

        return view('home', compact(
            'storesCount', 
            'devicesCount', 
            'happyCustomers', 
            'models', 
            'dealPhone',
            'shops',
            'latestArrivals'
        ));
    }
}
