<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['user_id', 'specialization', 'experience', 'facebook_link', 'instagram_link', 'twitter_link'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
