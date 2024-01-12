<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

#use HasRoles;

use App\Models\ActivityLog;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'area',
        'cargo',
        'perfil_cs',
        'perfil_aca',
        'rol_aca',
        'perfil_cd',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
       
    }
    public function prospecto_comercial(): HasMany
    {
        return $this->HasMany(SolicitudProspectoProductosAca::class,'id_comercial','id');
    }
    public function prospecto_calidad(): HasMany
    {
        return $this->HasMany(SolicitudProspectoProductosAca::class,'id_calidad','id');
    }
    public function auditoria(): HasMany
    {
        return $this->HasMany(Auditoria::class,'id_responsable','id');
    }
    public function visita_inspectiva(): HasMany
    {
        return $this->HasMany(VisitaInspectiva::class,'id_responsable','id');
    }
    public function secciones_aca()
    {
        return $this->belongsToMany(Seccion::class, 'usuarios_secciones', 'id_usuario', 'codigo_seccion');
        #return $this->belongsToMany()
    }
}
