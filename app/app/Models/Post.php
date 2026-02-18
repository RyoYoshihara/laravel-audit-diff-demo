<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use AuditDiff\Laravel\Traits\Auditable;

class Post extends Model
{
    use Auditable;

    protected $guarded = [];
}
