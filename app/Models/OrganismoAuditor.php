<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganismoAuditor extends Model
{
    use HasFactory;
    protected $table = 'organismo_auditores';
    protected $guarded = [];
}
