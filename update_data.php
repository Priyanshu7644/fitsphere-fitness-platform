<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

\App\Models\Pass::where('type', 'home')->update(['price' => 999]);
\App\Models\Pass::where('type', 'pro')->update(['price' => 1999]);
\App\Models\Pass::where('type', 'elite')->update(['price' => 3999]);

$products = \App\Models\Product::all();
$prices = [1599, 899, 2499, 999, 1899, 599];
foreach($products as $i => $p) {
    $p->update(['price' => $prices[$i % count($prices)]]);
}

$trainers = \App\Models\User::where('role', 'trainer')->get();
$names = ['Rahul Sharma', 'Priya Patel', 'Vikram Singh', 'Neha Gupta', 'Amit Kumar'];
foreach($trainers as $i => $t) {
    $t->update(['name' => $names[$i % count($names)]]);
}

$centers = \App\Models\Center::all();
$cNames = ['FitSphere Mumbai HQ', 'FitSphere Delhi Studio', 'FitSphere BLR Powerhouse'];
$cLocations = ['Mumbai, MH', 'New Delhi, DL', 'Bangalore, KA'];
$cAddresses = ['123 Bandra West, Mumbai', '456 Connaught Place, New Delhi', '789 Indiranagar, Bangalore'];
foreach($centers as $i => $c) {
    if(isset($cNames[$i])) {
        $c->update(['name' => $cNames[$i], 'location' => $cLocations[$i], 'address' => $cAddresses[$i]]);
    }
}
echo "Data updated successfully.";
