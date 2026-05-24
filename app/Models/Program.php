<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'trainer_id',
        'title',
        'description',
        'duration_weeks',
        'difficulty_level',
        'category',
        'image'
    ];

    public function trainer() {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function workouts() {
        return $this->hasMany(Workout::class);
    }

    public function dietPlans() {
        return $this->hasMany(DietPlan::class);
    }
    public function enrollments() {
        return $this->hasMany(Enrollment::class);
    }
}
