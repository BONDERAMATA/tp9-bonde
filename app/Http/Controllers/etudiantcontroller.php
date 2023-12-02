<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Tutteur;
class etudiantcontroller extends Controller
{
    public function liste_etudiant()
    {
      $etudiants = Etudiant::all();
     return view('etudiant.liste', compact('etudiants'));   
    }
    
    public function ajouter_etudiant()
    {
      $tutteurs = tutteur::all();
      $etudiants = etudiant::all();
      return view('etudiant.ajouter', compact('tutteurs')) ;  
    }
    
    public function ajouter_etudiant_traitement(Request $request)
    {
      $request->validate([
        'Nom' => 'required',
        'Prenom' => 'required',
        'Classe' => 'required',
        'image' => 'required',
      ]);
      
      $etudiant = new Etudiant();
      $etudiant->nom = $request->Nom;
      $etudiant->prenom = $request->Prenom;
      $etudiant->classe = $request->Classe;
      $etudiant->image = $request->image;
      $etudiant->tutteur_id = $request->tuteur;
      
      
      
      
      $etudiant ->save();
      
      return redirect('/etudiant')->with('status', 'L\'etudiant a bien ete ajouter avec succes.');
    }
   
        public function update_etudiant($id){
          $etudiants = Etudiant::find($id);
          $tutteurs = Tutteur::all();
          return view('etudiant.update', compact('etudiants', 'tutteurs'));
        }
        
        
        
        public function update_etudiant_traitement(Request $request){
      
      $request->validate([
        'Nom' => 'required',
        'Prenom' => 'required',
        'Classe' => 'required',
        'image' => 'required',
        'tutteur' => 'required',
      ]);
      $etudiant = Etudiant::find($request->id);
      $etudiant ->Nom = $request->Nom;
      $etudiant ->Prenom = $request->Prenom;
      $etudiant ->Classe = $request->Classe;
      $etudiant ->image = $request->image;
      $etudiant ->tutteur_id = $request -> tutteur;
      $etudiant ->update();
      return redirect('/etudiant')->with('status', 'L\'etudiant a bien ete modifier avec succes.');
    }
    
    public function delete_etudiant($id){ 
      $etudiant = Etudiant::find($id);
      $etudiant->delete();
      return redirect('/etudiant')->with('status', 'L\'etudiant a bien ete suprimer avec succes.');
    }  
    
    
}
