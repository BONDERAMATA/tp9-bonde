<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tutteur;

class etudiant extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'nom',
        'prenom',
        'classe',
        'image',
    ];
   
    public function tutteur()
    {
     return $this->belongsTo(tutteur::class);   
        
    } 
}
