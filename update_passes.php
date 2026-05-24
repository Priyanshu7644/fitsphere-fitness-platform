<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

\Illuminate\Support\Facades\DB::statement("ALTER TABLE passes MODIFY COLUMN type ENUM('elite', 'pro', 'home', 'lite')");

if (\App\Models\Pass::where('type', 'lite')->count() === 0) {
    \App\Models\Pass::create([
        'title' => 'FitSphere LITE',
        'description' => 'Basic access to beginner online workout videos.',
        'price' => 499,
        'duration_days' => 30,
        'type' => 'lite',
        'features' => json_encode(['Basic VOD Workouts', 'No Live Sessions', 'No Centers'])
    ]);
}
echo "Lite pass added.\n";
