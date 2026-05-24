<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LiveSession;
use App\Models\User;
use Carbon\Carbon;

class LiveSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainer = User::where('role', 'trainer')->first();
        if (!$trainer) {
            $trainer = User::factory()->create(['role' => 'trainer', 'name' => 'John Doe Trainer']);
        }

        $titles = [
            'HIIT Burn Workout',
            'Yoga Flow & Meditation',
            'Full Body Strength',
            'Core Blaster Session'
        ];

        for ($i = 0; $i < 4; $i++) {
            LiveSession::create([
                'trainer_id' => $trainer->id,
                'title' => $titles[$i],
                'session_date' => Carbon::now()->addWeeks($i)->addDays(rand(1, 4))->setTime(18, 0),
                'meeting_link' => 'https://zoom.us/j/mock' . rand(1000, 9999),
                'platform' => 'zoom',
            ]);
        }
    }
}
