<?php

namespace Database\Seeders;

use App\Models\IphoneModel;
use App\Models\Phone;
use App\Models\PhoneImage;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = IphoneModel::all();
        $shops = Shop::all();

        $colors = [
            'Space Gray', 'Silver', 'Gold', 'Midnight', 'Starlight', 
            'Blue', 'Pink', 'Natural Titanium', 'Desert Titanium', 
            'Black Titanium', 'White Titanium', 'Deep Purple', 
            'Sierra Blue', 'Alpine Green'
        ];

        $storages = ['128GB', '256GB', '512GB', '1TB'];
        $conditions = ['Excellent', 'Very Good', 'Good'];

        foreach ($models as $model) {
            // Ensure exactly 5 phones per model
            for ($i = 0; $i < 5; $i++) {
                $shop = $shops->random();
                $color = $colors[array_rand($colors)];
                
                // Keep 1TB storage rarer
                $storageRand = rand(1, 100);
                if ($storageRand > 90) {
                    $storage = '1TB';
                } elseif ($storageRand > 65) {
                    $storage = '512GB';
                } elseif ($storageRand > 30) {
                    $storage = '256GB';
                } else {
                    $storage = '128GB';
                }

                $condition = $conditions[array_rand($conditions)];
                $battery = rand(80, 100);

                // Price calculation based on starting price, storage and condition
                $basePrice = $model->starting_price;
                
                // Storage modifier
                $storageMultiplier = 1.0;
                if ($storage === '256GB') $storageMultiplier = 1.08;
                if ($storage === '512GB') $storageMultiplier = 1.18;
                if ($storage === '1TB') $storageMultiplier = 1.30;

                // Condition modifier
                $conditionMultiplier = 1.0;
                if ($condition === 'Very Good') $conditionMultiplier = 0.92;
                if ($condition === 'Good') $conditionMultiplier = 0.85;

                // Battery health modifier (degrade slightly if battery is lower)
                $batteryMultiplier = 0.90 + (($battery - 80) / 20) * 0.10;

                $finalPrice = round($basePrice * $storageMultiplier * $conditionMultiplier * $batteryMultiplier / 500) * 500;

                // Generate description
                $description = "This verified pre-owned {$model->name} in beautiful {$color} comes with {$storage} storage. It has been fully tested and certified by our technicians. It features {$battery}% battery health and is in {$condition} physical condition. Includes a charging cable and our 30-day store warranty. Available for immediate pickup at our {$shop->name} outlet.";

                $phone = Phone::create([
                    'model_id' => $model->id,
                    'shop_id' => $shop->id,
                    'color' => $color,
                    'storage' => $storage,
                    'battery_health' => $battery,
                    'condition_grade' => $condition,
                    'price' => $finalPrice,
                    'description' => $description,
                    'status' => 'Available',
                ]);

                // Create 3 images for the phone detail gallery
                // Use the model's base image and two related high quality iPhone photos
                PhoneImage::create([
                    'phone_id' => $phone->id,
                    'image' => $model->image,
                ]);

                // Fallback secondary and tertiary images
                PhoneImage::create([
                    'phone_id' => $phone->id,
                    'image' => 'https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?w=600&q=80',
                ]);

                PhoneImage::create([
                    'phone_id' => $phone->id,
                    'image' => 'https://images.unsplash.com/photo-1616348436168-de43ad0db179?w=600&q=80',
                ]);
            }

            // Update model stock count and starting price cache
            $minPrice = Phone::where('model_id', $model->id)->min('price');
            $stockCount = Phone::where('model_id', $model->id)->where('status', 'Available')->count();
            
            $model->update([
                'starting_price' => $minPrice ?? $model->starting_price,
                'stock' => $stockCount,
            ]);
        }
    }
}
