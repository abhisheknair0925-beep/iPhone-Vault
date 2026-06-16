<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shops = [
            [
                'name' => 'iPhone Vault - Kazhakkoottam',
                'address' => 'Ground Floor, Carmel Towers, Kazhakkoottam, Thiruvananthapuram, Kerala 695582',
                'phone' => '+91 98765 43210',
                'location' => 'https://maps.google.com/?q=Kazhakkoottam+Thiruvananthapuram',
                'status' => 'Active',
            ],
            [
                'name' => 'iPhone Vault - Pattom',
                'address' => 'TC 2/3452, Plaza Building, Pattom Junction, Thiruvananthapuram, Kerala 695004',
                'phone' => '+91 98765 43211',
                'location' => 'https://maps.google.com/?q=Pattom+Thiruvananthapuram',
                'status' => 'Active',
            ],
            [
                'name' => 'iPhone Vault - Technopark',
                'address' => 'Phase 1 Main Gate, Bypass Road, Technopark, Kazhakkoottam, Kerala 695581',
                'phone' => '+91 98765 43212',
                'location' => 'https://maps.google.com/?q=Technopark+Thiruvananthapuram',
                'status' => 'Active',
            ],
            [
                'name' => 'iPhone Vault - Kesavadasapuram',
                'address' => 'Vrindavan Shopping Complex, Kesavadasapuram, Thiruvananthapuram, Kerala 695004',
                'phone' => '+91 98765 43213',
                'location' => 'https://maps.google.com/?q=Kesavadasapuram+Thiruvananthapuram',
                'status' => 'Active',
            ],
            [
                'name' => 'iPhone Vault - Attingal',
                'address' => 'Near Private Bus Stand, Kacheri Junction, Attingal, Kerala 695101',
                'phone' => '+91 98765 43214',
                'location' => 'https://maps.google.com/?q=Attingal+Thiruvananthapuram',
                'status' => 'Active',
            ],
            [
                'name' => 'iPhone Vault - Neyyattinkara',
                'address' => 'Al-Saj Complex, Near Town Hall, Neyyattinkara, Kerala 695121',
                'phone' => '+91 98765 43215',
                'location' => 'https://maps.google.com/?q=Neyyattinkara+Thiruvananthapuram',
                'status' => 'Active',
            ],
            [
                'name' => 'iPhone Vault - Karamana',
                'address' => 'Main Road, Near Karamana Bridge, Karamana, Thiruvananthapuram, Kerala 695002',
                'phone' => '+91 98765 43216',
                'location' => 'https://maps.google.com/?q=Karamana+Thiruvananthapuram',
                'status' => 'Active',
            ],
            [
                'name' => 'iPhone Vault - Varkala',
                'address' => 'Temple Road, Near Helipad, Varkala Cliff, Varkala, Kerala 695141',
                'phone' => '+91 98765 43217',
                'location' => 'https://maps.google.com/?q=Varkala+Thiruvananthapuram',
                'status' => 'Active',
            ],
            [
                'name' => 'iPhone Vault - East Fort',
                'address' => 'Fort Plaza, Opp. KSRTC Bus Stand, East Fort, Thiruvananthapuram, Kerala 695023',
                'phone' => '+91 98765 43218',
                'location' => 'https://maps.google.com/?q=East+Fort+Thiruvananthapuram',
                'status' => 'Active',
            ],
            [
                'name' => 'iPhone Vault - Trivandrum Central',
                'address' => 'Station Road, Opp. Railway Station, Thampanoor, Thiruvananthapuram, Kerala 695001',
                'phone' => '+91 98765 43219',
                'location' => 'https://maps.google.com/?q=Thampanoor+Thiruvananthapuram',
                'status' => 'Active',
            ],
        ];

        foreach ($shops as $shop) {
            Shop::create($shop);
        }
    }
}
