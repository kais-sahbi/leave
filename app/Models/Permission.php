<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];

    /*Cette ligne de code est en PHP et elle indique que la colonne 'name' de la table associée à ce modèle Eloquent sera automatiquement convertie en tableau lorsqu'
elle sera récupérée à partir de la base de données. Cela signifie que lorsque vous accédez à la propriété 'name' de l'objet modèle,
elle sera retournée sous forme de tableau plutôt que sous forme de chaîne de caractères.*/

    /* si on fait pas error : Array to string conversion*/
    protected $casts = [
        'name' => 'array',
    ];

/* est ce que c possible de lemeeter dans table de migration ou non*/
    public function role(){
        return $this->belongsTo(Role::class);//all permission belong to 1role many to one
    }

}
