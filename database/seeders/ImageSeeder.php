<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use App\Models\User;
use App\Models\Product;
use App\Models\Center;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        // Programs
        $programImages = [
            'fitness' => 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=1000&auto=format&fit=crop',
            'mind_body' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=1000&auto=format&fit=crop'
        ];
        
        foreach (Program::all() as $program) {
            if (!$program->image) {
                $category = $program->category ?? 'fitness';
                $program->update(['image' => $programImages[$category]]);
            }
        }

        // Users (Trainers)
        $trainerImages = [
            'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1594381898411-846e7d193883?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1548690312-e3b507d8c110?q=80&w=1000&auto=format&fit=crop'
        ];
        
        $trainers = User::where('role', 'trainer')->get();
        foreach ($trainers as $index => $trainer) {
            if (!$trainer->profile_picture) {
                $trainer->update(['profile_picture' => $trainerImages[$index % count($trainerImages)]]);
            }
        }

        // Products
        $productImages = [
            'https://images.unsplash.com/photo-1517438476312-10d79c077509?q=80&w=1000&auto=format&fit=crop', // Dumbbells
            'https://images.unsplash.com/photo-1518611012118-696072aa579a?q=80&w=1000&auto=format&fit=crop', // Mat
            'https://images.unsplash.com/photo-1522898467493-49726bf28798?q=80&w=1000&auto=format&fit=crop', // Supplements
            'https://images.unsplash.com/photo-1584735935682-2f2b69dff9d2?q=80&w=1000&auto=format&fit=crop', // Gym Wear
            'https://images.unsplash.com/photo-1571744041014-c473132c1e7f?q=80&w=1000&auto=format&fit=crop', // Kettlebell
            'https://images.unsplash.com/photo-1595152772835-219674b2a8a6?q=80&w=1000&auto=format&fit=crop', // Water bottle
        ];

        // Seed 6 demo products if none exist
        if (Product::count() === 0) {
            $productNames = ['Pro Dumbbell Set', 'Premium Yoga Mat', 'Whey Protein Isolate', 'Performance T-Shirt', 'Cast Iron Kettlebell', 'Insulated Water Bottle'];
            $categories = ['Equipment', 'Accessories', 'Supplements', 'Apparel', 'Equipment', 'Accessories'];
            $prices = [120.00, 45.00, 59.99, 29.99, 85.00, 24.99];

            for ($i = 0; $i < 6; $i++) {
                Product::create([
                    'name' => $productNames[$i],
                    'description' => 'High quality fitness product to support your training journey.',
                    'price' => $prices[$i],
                    'image' => $productImages[$i],
                    'category' => $categories[$i],
                    'stock' => 50
                ]);
            }
        } else {
            foreach (Product::all() as $index => $product) {
                if (!$product->image) {
                    $product->update(['image' => $productImages[$index % count($productImages)]]);
                }
            }
        }

        // Centers
        $centerImages = [
            'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?q=80&w=1000&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=1000&auto=format&fit=crop'
        ];

        // Seed 3 demo centers if none exist
        if (Center::count() === 0) {
            $centerNames = ['FitSphere Downtown HQ', 'FitSphere Yoga Studio', 'FitSphere Powerhouse'];
            $locations = ['New York, NY', 'Brooklyn, NY', 'Jersey City, NJ'];
            $addresses = ['123 Main St, New York, NY', '456 Wellness Blvd, Brooklyn, NY', '789 Iron Ave, Jersey City, NJ'];
            
            for ($i = 0; $i < 3; $i++) {
                Center::create([
                    'name' => $centerNames[$i],
                    'location' => $locations[$i],
                    'address' => $addresses[$i],
                    'image' => $centerImages[$i],
                    'features' => json_encode(['Cardio Equipment', 'Free Weights', 'Locker Rooms', 'Group Classes'])
                ]);
            }
        } else {
            foreach (Center::all() as $index => $center) {
                if (!$center->image) {
                    $center->update(['image' => $centerImages[$index % count($centerImages)]]);
                }
            }
        }
    }
}
