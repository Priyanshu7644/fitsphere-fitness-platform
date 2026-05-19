<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietPlan extends Model
{
    protected $fillable = ['program_id', 'meal_schedule', 'calories', 'protein', 'meal_timing', 'water_intake_recommendations'];

    public function program() {
        return $this->belongsTo(Program::class);
    }
}
