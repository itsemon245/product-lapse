<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Release extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //make validation rules for this model

    public static function rules()
    {
        return [
            'name' => 'required|string',
            'version' => 'required|string',
            'release_date' => 'required|date',
            'description' => 'required|string',
        ];
    }
}
