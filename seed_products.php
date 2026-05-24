<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;
use Illuminate\Support\Facades\DB;

Product::truncate();

// Local images served from public/images/products/
$img = [
    'supplements' => '/images/products/supplements.png',
    'dumbbells'   => '/images/products/dumbbells.png',
    'yoga_mat'    => '/images/products/yoga_mat.png',
    'tshirt'      => '/images/products/gym_tshirt.png',
    'bag'         => '/images/products/gym_bag.png',
    'kettlebell'  => '/images/products/kettlebell.png',
    'shaker'      => '/images/products/shaker.png',
    'leggings'    => '/images/products/leggings.png',
];

$products = [
    // SUPPLEMENTS
    ['name' => 'Premium Whey Protein Chocolate 2kg', 'category' => 'Supplements', 'price' => 2499, 'image' => $img['supplements']],
    ['name' => 'Elite Pre-Workout Powder Watermelon', 'category' => 'Supplements', 'price' => 1799, 'image' => $img['supplements']],
    ['name' => 'BCAA Amino Acids Mango Flavour', 'category' => 'Supplements', 'price' => 1399, 'image' => $img['supplements']],
    ['name' => 'Creatine Monohydrate Unflavoured 500g', 'category' => 'Supplements', 'price' => 999, 'image' => $img['supplements']],
    ['name' => 'Mass Gainer Vanilla Dream 3kg', 'category' => 'Supplements', 'price' => 3299, 'image' => $img['supplements']],
    ['name' => 'Multivitamin Gold Formula 60 Tabs', 'category' => 'Supplements', 'price' => 799, 'image' => $img['supplements']],
    ['name' => 'L-Glutamine Recovery Formula 300g', 'category' => 'Supplements', 'price' => 1199, 'image' => $img['supplements']],
    ['name' => 'Micellar Casein Protein Night Fuel', 'category' => 'Supplements', 'price' => 2799, 'image' => $img['supplements']],
    ['name' => 'Omega-3 Fish Oil 1000mg 90 Caps', 'category' => 'Supplements', 'price' => 699, 'image' => $img['supplements']],
    ['name' => 'Plant Protein Pea & Brown Rice 1kg', 'category' => 'Supplements', 'price' => 1899, 'image' => $img['supplements']],
    ['name' => 'ZMA Recovery Complex 90 Caps', 'category' => 'Supplements', 'price' => 849, 'image' => $img['supplements']],
    ['name' => 'Thermogenic Fat Burner 60 Caps', 'category' => 'Supplements', 'price' => 1299, 'image' => $img['supplements']],

    // EQUIPMENT
    ['name' => 'Hex Dumbbell Set 10kg Pair', 'category' => 'Equipment', 'price' => 2999, 'image' => $img['dumbbells']],
    ['name' => 'Adjustable Dumbbell Set 5–25kg', 'category' => 'Equipment', 'price' => 8999, 'image' => $img['dumbbells']],
    ['name' => 'Cast Iron Kettlebell 16kg', 'category' => 'Equipment', 'price' => 1999, 'image' => $img['kettlebell']],
    ['name' => 'Competition Kettlebell 24kg', 'category' => 'Equipment', 'price' => 2799, 'image' => $img['kettlebell']],
    ['name' => 'Professional Yoga Mat Non-Slip 6mm', 'category' => 'Equipment', 'price' => 899, 'image' => $img['yoga_mat']],
    ['name' => 'Resistance Bands Set of 5 Levels', 'category' => 'Equipment', 'price' => 699, 'image' => $img['yoga_mat']],
    ['name' => 'Speed Jump Rope Steel Cable', 'category' => 'Equipment', 'price' => 499, 'image' => $img['dumbbells']],
    ['name' => 'Deep Tissue Foam Roller 60cm', 'category' => 'Equipment', 'price' => 1199, 'image' => $img['yoga_mat']],
    ['name' => 'Door-Mount Pull-Up Bar Steel', 'category' => 'Equipment', 'price' => 1499, 'image' => $img['dumbbells']],
    ['name' => 'Ab Roller Pro with Knee Mat', 'category' => 'Equipment', 'price' => 799, 'image' => $img['dumbbells']],
    ['name' => 'Olympic Barbell 7ft Knurled', 'category' => 'Equipment', 'price' => 7999, 'image' => $img['dumbbells']],
    ['name' => 'TRX Suspension Trainer Kit', 'category' => 'Equipment', 'price' => 3499, 'image' => $img['yoga_mat']],
    ['name' => 'Magnetic Exercise Cycle', 'category' => 'Equipment', 'price' => 14999, 'image' => $img['dumbbells']],
    ['name' => '3-in-1 Plyo Plyometric Box', 'category' => 'Equipment', 'price' => 4999, 'image' => $img['dumbbells']],

    // APPAREL
    ['name' => 'Dri-Fit Performance T-Shirt Black', 'category' => 'Apparel', 'price' => 799, 'image' => $img['tshirt']],
    ['name' => 'Dri-Fit Performance T-Shirt Navy', 'category' => 'Apparel', 'price' => 799, 'image' => $img['tshirt']],
    ['name' => 'Tapered Gym Joggers Slim Fit', 'category' => 'Apparel', 'price' => 1299, 'image' => $img['tshirt']],
    ['name' => 'Breathable Mesh Tank Top', 'category' => 'Apparel', 'price' => 599, 'image' => $img['tshirt']],
    ['name' => 'Zip-Up Hooded Sweatshirt Grey', 'category' => 'Apparel', 'price' => 1799, 'image' => $img['tshirt']],
    ['name' => "Women's High-Waist Leggings", 'category' => 'Apparel', 'price' => 1499, 'image' => $img['leggings']],
    ['name' => "Women's Seamless Sports Leggings", 'category' => 'Apparel', 'price' => 1699, 'image' => $img['leggings']],
    ['name' => "Women's Strappy Sports Bra Pro", 'category' => 'Apparel', 'price' => 899, 'image' => $img['leggings']],
    ['name' => 'Compression Shorts 7" Lined', 'category' => 'Apparel', 'price' => 999, 'image' => $img['tshirt']],
    ['name' => 'Slim Fit Training Jacket', 'category' => 'Apparel', 'price' => 2199, 'image' => $img['tshirt']],
    ['name' => 'Quarter Zip Fleece Pullover', 'category' => 'Apparel', 'price' => 1699, 'image' => $img['tshirt']],

    // ACCESSORIES
    ['name' => 'Heavy Duty Duffel Gym Bag 40L', 'category' => 'Accessories', 'price' => 1799, 'image' => $img['bag']],
    ['name' => 'BPA-Free Shaker Bottle 700ml', 'category' => 'Accessories', 'price' => 499, 'image' => $img['shaker']],
    ['name' => 'Stainless Steel Insulated Bottle 1L', 'category' => 'Accessories', 'price' => 899, 'image' => $img['shaker']],
    ['name' => 'Leather Weightlifting Belt 4"', 'category' => 'Accessories', 'price' => 2299, 'image' => $img['bag']],
    ['name' => 'Wrist Wraps Support Pair 24"', 'category' => 'Accessories', 'price' => 699, 'image' => $img['bag']],
    ['name' => 'Neoprene Knee Sleeves Pair 7mm', 'category' => 'Accessories', 'price' => 1199, 'image' => $img['bag']],
    ['name' => 'Microfibre Gym Towel 2-Pack', 'category' => 'Accessories', 'price' => 599, 'image' => $img['bag']],
    ['name' => 'Smart Fitness Tracker Band', 'category' => 'Accessories', 'price' => 3499, 'image' => $img['bag']],
    ['name' => 'Gym Workout Gloves with Wrist', 'category' => 'Accessories', 'price' => 799, 'image' => $img['bag']],
    ['name' => 'Deadlift Lifting Straps Pair', 'category' => 'Accessories', 'price' => 399, 'image' => $img['bag']],
    ['name' => 'Ankle Weights Pair 2kg Each', 'category' => 'Accessories', 'price' => 1099, 'image' => $img['yoga_mat']],
    ['name' => 'Lacrosse Massage Ball Set 3pc', 'category' => 'Accessories', 'price' => 499, 'image' => $img['bag']],
];

$inserts = [];
foreach ($products as $p) {
    $inserts[] = [
        'name'        => $p['name'],
        'description' => "Premium quality {$p['category']} product engineered for serious athletes and fitness enthusiasts.",
        'price'       => $p['price'],
        'category'    => $p['category'],
        'stock'       => rand(15, 80),
        'image'       => $p['image'],
        'created_at'  => now(),
        'updated_at'  => now(),
    ];
}

Product::insert($inserts);
echo "Seeded " . count($inserts) . " products with correct images.\n";
