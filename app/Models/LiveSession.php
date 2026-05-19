<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LiveSession extends Model
{
    protected $fillable = ['trainer_id', 'title', 'session_date', 'meeting_link', 'platform'];

    public function trainer() {
        return $this->belongsTo(User::class, 'trainer_id');
    }
}
