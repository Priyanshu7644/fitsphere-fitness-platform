<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Trainer;
use App\Models\Program;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\LiveSession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@fitsphere.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Trainers
        $trainer1 = User::create([
            'name' => 'Alex Johnson',
            'email' => 'alex@fitsphere.com',
            'password' => Hash::make('password'),
            'role' => 'trainer',
            'profile_picture' => 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?q=80&w=2070&auto=format&fit=crop'
        ]);
        Trainer::create([
            'user_id' => $trainer1->id,
            'specialization' => 'Strength & Conditioning',
            'experience' => '10 years of experience helping people build muscle and get stronger.'
        ]);

        $trainer2 = User::create([
            'name' => 'Sarah Connor',
            'email' => 'sarah@fitsphere.com',
            'password' => Hash::make('password'),
            'role' => 'trainer',
            'profile_picture' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1976&auto=format&fit=crop'
        ]);
        Trainer::create([
            'user_id' => $trainer2->id,
            'specialization' => 'Yoga & Flexibility',
            'experience' => 'Certified Yoga instructor focusing on mindfulness and core strength.'
        ]);

        // Create Normal User
        User::create([
            'name' => 'John Doe',
            'email' => 'user@fitsphere.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create Programs
        $program1 = Program::create([
            'title' => '12-Week Muscle Builder',
            'description' => 'A comprehensive 12-week program designed to maximize muscle hypertrophy and strength gains.',
            'duration_weeks' => 12,
            'difficulty_level' => 'advanced',
            'trainer_id' => $trainer1->id,
            'image' => 'https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?q=80&w=2070&auto=format&fit=crop'
        ]);

        $program2 = Program::create([
            'title' => 'Beginner Yoga Journey',
            'description' => 'Start your yoga journey with this beginner-friendly 4-week program focusing on basic poses and breathing.',
            'duration_weeks' => 4,
            'difficulty_level' => 'beginner',
            'trainer_id' => $trainer2->id,
            'image' => 'https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?q=80&w=2070&auto=format&fit=crop'
        ]);

        // Create Workouts and Exercises for Program 1
        $workout1 = Workout::create([
            'program_id' => $program1->id,
            'title' => 'Chest and Triceps',
            'day_number' => 1,
            'description' => 'Heavy compound movements for the chest.'
        ]);
        Exercise::create(['workout_id' => $workout1->id, 'name' => 'Bench Press', 'sets' => 4, 'repetitions' => 10]);
        Exercise::create(['workout_id' => $workout1->id, 'name' => 'Tricep Extensions', 'sets' => 3, 'repetitions' => 12]);

        // Create Live Sessions
        LiveSession::create([
            'trainer_id' => $trainer1->id,
            'title' => 'Weekly Q&A: Nutrition Tips',
            'session_date' => now()->addDays(2),
            'meeting_link' => 'https://meet.google.com/abc-defg-hij'
        ]);
        LiveSession::create([
            'trainer_id' => $trainer2->id,
            'title' => 'Morning Guided Meditation',
            'session_date' => now()->addDays(1)->setTime(7, 0),
            'meeting_link' => 'https://meet.google.com/xyz-uvwx-qrs'
        ]);
    }
}
