<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = ['program_id', 'title', 'day_number', 'description'];

    public function program() {
        return $this->belongsTo(Program::class);
    }
    public function exercises() {
        return $this->hasMany(Exercise::class);
    }
}
