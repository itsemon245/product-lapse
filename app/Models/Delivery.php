<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'items' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'administrator' => 'required|string|max:255',
        ];
    }
}
