<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Purchase extends Model
{
    protected $fillable = [
        "id",
        "supplier",
        "pay_term",
        "date",
        "created_by",
        "status",
        "observations"
    ];
}
