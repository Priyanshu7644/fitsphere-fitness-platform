<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

\App\Models\Pass::where('type', 'lite')->delete();

$home = \App\Models\Pass::where('type', 'home')->first();
if ($home) $home->update(['features' => json_encode(['Access to all VOD Workouts', 'Beginner Yoga Journey Program', 'Daily Live Sessions', 'Basic Diet Plans'])]);

$pro = \App\Models\Pass::where('type', 'pro')->first();
if ($pro) $pro->update(['features' => json_encode(['3 Center Visits/mo', '12-Week Muscle Builder Program', 'Advanced Diet Plans', 'All HOME Features'])]);

$elite = \App\Models\Pass::where('type', 'elite')->first();
if ($elite) $elite->update(['features' => json_encode(['Unlimited Center Visits', 'Personal Coach Assigned', 'Exclusive Masterclasses', 'All PRO Features'])]);

echo "Passes updated.\n";
