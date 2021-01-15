<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ["Name","IndustryTitle","Address"];

    public function employees()
    {
        return $this->HasMany("App\Models\Employee");

    }

}
