<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a detailed page for a specific pre-owned phone unit.
     */
    public function show($id)
    {
        $phone = Phone::with(['model', 'shop', 'images'])->findOrFail($id);

        // Map technical specifications dynamically based on model name
        $specs = $this->getModelSpecs($phone->model->name);

        return view('phones.show', compact('phone', 'specs'));
    }

    /**
     * Helper to return standard specifications based on iPhone model name.
     */
    private function getModelSpecs(string $modelName): array
    {
        $specs = [
            'Display' => '6.1-inch Super Retina XDR OLED',
            'Processor' => 'Apple A16 Bionic',
            'RAM' => '6 GB',
            'Camera' => '48MP Main + 12MP Ultra Wide',
            'Front Camera' => '12MP TrueDepth',
            'Battery Capacity' => '3349 mAh',
            'Operating System' => 'iOS 17 (Upgradable to iOS 18)',
        ];

        // Specific modifications per model family
        if (str_contains($modelName, '16 Pro Max')) {
            $specs['Display'] = '6.9-inch Super Retina XDR OLED ProMotion (120Hz)';
            $specs['Processor'] = 'Apple A18 Pro (3nm)';
            $specs['RAM'] = '8 GB';
            $specs['Camera'] = '48MP Main + 48MP Ultra Wide + 12MP 5x Telephoto';
            $specs['Battery Capacity'] = '4685 mAh';
            $specs['Operating System'] = 'iOS 18';
        } elseif (str_contains($modelName, '16 Pro')) {
            $specs['Display'] = '6.3-inch Super Retina XDR OLED ProMotion (120Hz)';
            $specs['Processor'] = 'Apple A18 Pro (3nm)';
            $specs['RAM'] = '8 GB';
            $specs['Camera'] = '48MP Main + 48MP Ultra Wide + 12MP 5x Telephoto';
            $specs['Battery Capacity'] = '3582 mAh';
            $specs['Operating System'] = 'iOS 18';
        } elseif (str_contains($modelName, '16 Plus')) {
            $specs['Display'] = '6.7-inch Super Retina XDR OLED';
            $specs['Processor'] = 'Apple A18 (3nm)';
            $specs['RAM'] = '8 GB';
            $specs['Camera'] = '48MP Fusion + 12MP Ultra Wide';
            $specs['Battery Capacity'] = '4674 mAh';
            $specs['Operating System'] = 'iOS 18';
        } elseif (str_contains($modelName, '16')) {
            $specs['Display'] = '6.1-inch Super Retina XDR OLED';
            $specs['Processor'] = 'Apple A18 (3nm)';
            $specs['RAM'] = '8 GB';
            $specs['Camera'] = '48MP Fusion + 12MP Ultra Wide';
            $specs['Battery Capacity'] = '3561 mAh';
            $specs['Operating System'] = 'iOS 18';
        } elseif (str_contains($modelName, '15 Pro Max')) {
            $specs['Display'] = '6.7-inch Super Retina XDR OLED ProMotion (120Hz)';
            $specs['Processor'] = 'Apple A17 Pro (3nm)';
            $specs['RAM'] = '8 GB';
            $specs['Camera'] = '48MP Main + 12MP Ultra Wide + 12MP 5x Telephoto';
            $specs['Battery Capacity'] = '4441 mAh';
        } elseif (str_contains($modelName, '15 Pro')) {
            $specs['Display'] = '6.1-inch Super Retina XDR OLED ProMotion (120Hz)';
            $specs['Processor'] = 'Apple A17 Pro (3nm)';
            $specs['RAM'] = '8 GB';
            $specs['Camera'] = '48MP Main + 12MP Ultra Wide + 12MP 3x Telephoto';
            $specs['Battery Capacity'] = '3274 mAh';
        } elseif (str_contains($modelName, '15 Plus')) {
            $specs['Display'] = '6.7-inch Super Retina XDR OLED';
            $specs['Processor'] = 'Apple A16 Bionic';
            $specs['RAM'] = '6 GB';
            $specs['Camera'] = '48MP Main + 12MP Ultra Wide';
            $specs['Battery Capacity'] = '4383 mAh';
        } elseif (str_contains($modelName, '15')) {
            $specs['Display'] = '6.1-inch Super Retina XDR OLED';
            $specs['Processor'] = 'Apple A16 Bionic';
            $specs['RAM'] = '6 GB';
            $specs['Camera'] = '48MP Main + 12MP Ultra Wide';
            $specs['Battery Capacity'] = '3349 mAh';
        } elseif (str_contains($modelName, '14 Pro Max')) {
            $specs['Display'] = '6.7-inch Super Retina XDR OLED ProMotion (120Hz)';
            $specs['Processor'] = 'Apple A16 Bionic';
            $specs['RAM'] = '6 GB';
            $specs['Camera'] = '48MP Main + 12MP Ultra Wide + 12MP Telephoto';
            $specs['Battery Capacity'] = '4323 mAh';
        } elseif (str_contains($modelName, '14 Pro')) {
            $specs['Display'] = '6.1-inch Super Retina XDR OLED ProMotion (120Hz)';
            $specs['Processor'] = 'Apple A16 Bionic';
            $specs['RAM'] = '6 GB';
            $specs['Camera'] = '48MP Main + 12MP Ultra Wide + 12MP Telephoto';
            $specs['Battery Capacity'] = '3200 mAh';
        } elseif (str_contains($modelName, '14 Plus')) {
            $specs['Display'] = '6.7-inch Super Retina XDR OLED';
            $specs['Processor'] = 'Apple A15 Bionic';
            $specs['RAM'] = '6 GB';
            $specs['Camera'] = '12MP Main + 12MP Ultra Wide';
            $specs['Battery Capacity'] = '4325 mAh';
        } elseif (str_contains($modelName, '14')) {
            $specs['Display'] = '6.1-inch Super Retina XDR OLED';
            $specs['Processor'] = 'Apple A15 Bionic';
            $specs['RAM'] = '6 GB';
            $specs['Camera'] = '12MP Main + 12MP Ultra Wide';
            $specs['Battery Capacity'] = '3279 mAh';
        } elseif (str_contains($modelName, '13 Pro Max')) {
            $specs['Display'] = '6.7-inch Super Retina XDR OLED ProMotion (120Hz)';
            $specs['Processor'] = 'Apple A15 Bionic';
            $specs['RAM'] = '6 GB';
            $specs['Camera'] = '12MP Triple with LiDAR';
            $specs['Battery Capacity'] = '4352 mAh';
        } elseif (str_contains($modelName, '13 Pro')) {
            $specs['Display'] = '6.1-inch Super Retina XDR OLED ProMotion (120Hz)';
            $specs['Processor'] = 'Apple A15 Bionic';
            $specs['RAM'] = '6 GB';
            $specs['Camera'] = '12MP Triple with LiDAR';
            $specs['Battery Capacity'] = '3095 mAh';
        } elseif (str_contains($modelName, '13 Mini')) {
            $specs['Display'] = '5.4-inch Super Retina XDR OLED';
            $specs['Processor'] = 'Apple A15 Bionic';
            $specs['RAM'] = '4 GB';
            $specs['Camera'] = '12MP Dual';
            $specs['Battery Capacity'] = '2406 mAh';
        } elseif (str_contains($modelName, '13')) {
            $specs['Display'] = '6.1-inch Super Retina XDR OLED';
            $specs['Processor'] = 'Apple A15 Bionic';
            $specs['RAM'] = '4 GB';
            $specs['Camera'] = '12MP Dual';
            $specs['Battery Capacity'] = '3227 mAh';
        } elseif (str_contains($modelName, '12 Mini')) {
            $specs['Display'] = '5.4-inch Super Retina XDR OLED';
            $specs['Processor'] = 'Apple A14 Bionic';
            $specs['RAM'] = '4 GB';
            $specs['Camera'] = '12MP Dual';
            $specs['Battery Capacity'] = '2227 mAh';
        } elseif (str_contains($modelName, '12')) {
            $specs['Display'] = '6.1-inch Super Retina XDR OLED';
            $specs['Processor'] = 'Apple A14 Bionic';
            $specs['RAM'] = '4 GB';
            $specs['Camera'] = '12MP Dual';
            $specs['Battery Capacity'] = '2815 mAh';
        }

        return $specs;
    }
}
