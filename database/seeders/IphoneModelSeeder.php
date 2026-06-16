<?php

namespace Database\Seeders;

use App\Models\IphoneModel;
use Illuminate\Database\Seeder;

class IphoneModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            [
                'name' => 'iPhone 12',
                'image' => 'https://images.unsplash.com/photo-1611791461233-a9330987b8f0?w=600&q=80',
                'starting_price' => 32000,
            ],
            [
                'name' => 'iPhone 12 Mini',
                'image' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?w=600&q=80',
                'starting_price' => 28000,
            ],
            [
                'name' => 'iPhone 13',
                'image' => 'https://images.unsplash.com/photo-1632661674596-df8be070a5c5?w=600&q=80',
                'starting_price' => 42000,
            ],
            [
                'name' => 'iPhone 13 Pro',
                'image' => 'https://images.unsplash.com/photo-1632661674596-df8be070a5c5?w=600&q=80',
                'starting_price' => 52000,
            ],
            [
                'name' => 'iPhone 13 Pro Max',
                'image' => 'https://images.unsplash.com/photo-1605787020600-b9ebd5df1d07?w=600&q=80',
                'starting_price' => 58000,
            ],
            [
                'name' => 'iPhone 14',
                'image' => 'https://images.unsplash.com/photo-1616348436168-de43ad0db179?w=600&q=80',
                'starting_price' => 50000,
            ],
            [
                'name' => 'iPhone 14 Plus',
                'image' => 'https://images.unsplash.com/photo-1510557880182-3d4d3cba35a5?w=600&q=80',
                'starting_price' => 55000,
            ],
            [
                'name' => 'iPhone 14 Pro',
                'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=600&q=80',
                'starting_price' => 68000,
            ],
            [
                'name' => 'iPhone 15',
                'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=600&q=80',
                'starting_price' => 62000,
            ],
            [
                'name' => 'iPhone 15 Plus',
                'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=600&q=80',
                'starting_price' => 68000,
            ],
            [
                'name' => 'iPhone 15 Pro',
                'image' => 'https://images.unsplash.com/photo-1695048130838-89cde99435b0?w=600&q=80',
                'starting_price' => 78000,
            ],
            [
                'name' => 'iPhone 15 Pro Max',
                'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=600&q=80',
                'starting_price' => 88000,
            ],
            [
                'name' => 'iPhone 16',
                'image' => 'https://images.unsplash.com/photo-1727375053069-42b781615d8f?w=600&q=80',
                'starting_price' => 76000,
            ],
            [
                'name' => 'iPhone 16 Plus',
                'image' => 'https://images.unsplash.com/photo-1727375053069-42b781615d8f?w=600&q=80',
                'starting_price' => 84000,
            ],
            [
                'name' => 'iPhone 16 Pro',
                'image' => 'https://images.unsplash.com/photo-1727375053069-42b781615d8f?w=600&q=80',
                'starting_price' => 94000,
            ],
            [
                'name' => 'iPhone 16 Pro Max',
                'image' => 'https://images.unsplash.com/photo-1727375053069-42b781615d8f?w=600&q=80',
                'starting_price' => 104000,
            ],
        ];

        foreach ($models as $model) {
            IphoneModel::create($model);
        }
    }
}
