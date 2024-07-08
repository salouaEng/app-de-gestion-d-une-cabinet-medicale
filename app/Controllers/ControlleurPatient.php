<?php

namespace App\Controllers;

use App\Models\CompteModel;
use App\Models\PatientModel;


class ControlleurPatient extends BaseController {
    public function __construct(){
       helper(['url','form']);
    }
    public  function index(){
        $pat=new PatientModel();
    $data['patient'] =$pat->where('statut','actif')->findAll();
     return view('patient/crudP',$data); 
}
public function formulaire(){
    echo view('templates/header');
    // echo view('templates/navbar');
     echo view('patient/enregistrement');
     echo view('templates/footer');
}
    public function enregistrer(){
        $newcpt=new PatientModel();
        $rules=[
        'cin_patient'=>'required',  
        'nom'=>'required|min_length[3]',
        'prenom'=>'required|min_length[3]|max_length[15]',
        'telephone'=>'required|numeric|max_length[10]',
        'adresse'=>'required',
        'sexe'=>'required|max_length[5]'
        ];
        echo 'etape 1';
       /* $validation=$this->validate(['name'=>['rules'=>'required','error'=>['required'=>'le nom est un champ obli']]
    ,'cin_patient'=>['rules'=>'required','errors'=>['required'=>'le cin est obligatoire']]
    ,'prenom'=>[['rules'=>'required','errors'=>['required'=>'le prenom est obligatoire']]],
    'telephone'=>['rules'=>'required|numeric|max_length[10]','errors'=>['required'=>'ce champ est obli','numeric'=>'ce champ est numérique','max_length[10]'=>'ne depassé pas dix chiffre']]
,'adresse'=>['rules'=>'required','error'=>['required'=>'adresse est un champ obli']],
'sexe'=>['rules'=>'required','error'=>['required'=>'le sexe est un champ obli']]]);*/
        $data=[
            'cin_patient'=>request()->getPost('cin_patient'),
            'nom'=>request()->getPost('nom'),
            'prenom'=>request()->getPost('prenom'),
            'date_naissance'=>request()->getPost('date_naissance'),
            'telephone'=>request()->getPost('telephone'),
            'adresse'=>request()->getPost('adresse'),
            'id_compte'=>session()->get('loggedUser'),
            'sexe'=>request()->getPost('sexe')
        ];
        if(service('request')->getMethod()=='post'){
            echo 'etape 2';

            if(($this->validate($rules))){
                echo 'etape 3';
                $newcpt->save($data);
                return redirect()->to(base_url('/public/crudPatient'))->with('status','le patient est ajouté ');
             
            }
            else{
                $error['validation']=$this->validator;
                echo view('templates/header');
                // echo view('templates/navbar');
                 echo view('patient/enregistrement',$error);
                 echo view('templates/footer');            }
        }

    }
    public function modifier($id){
        $pat=new PatientModel();
        $data['patient']=$pat->find($id);
        echo $data['patient']['nom'];
        echo view('templates/header'); 
        echo view('patient/modif',$data);
        echo view('templates/footer'); 
      }

      public function update($id){
        $cpt=new PatientModel();
        $data=[
        'cin_patient'=>request()->getPost('cin_patient'),
        'nom'=>request()->getPost('nom'),
        'prenom'=>request()->getPost('prenom'),
        'date_naissance'=>request()->getPost('date_naissance'),
        'telephone'=>request()->getPost('telephone'),
         'adresse'=>request()->getPost('adresse'),
         'id_compte'=>session()->get('loggedUser'),
        'sexe'=>request()->getPost('sexe')];
         $cpt->update($id,$data);
         return redirect()->to(base_url('/public/crudPatient'))->with('status','le patient est modifier ');
       
      }
    public function supprimer($id){
        $pat=new PatientModel();
        $data=$pat->find($id);
        $data=['statut'=>'passif'];
        $pat->update($id,$data);
        return redirect()->to(base_url('/public/crudPatient'))->with('status','le patient a été supprimer avec succés ');
    }
    public function FichePatient($idpat,$rv){
            $pat = new PatientModel();
            $patient = $pat->find($idpat);
            $cpt=new CompteModel();
            $id=session()->get('loggedUser');
            $compte=$cpt->find($id);
           
            $role=$compte['id_role'];
            return view('patient/fiche',['patient' => $patient,'id_rv'=>$rv,'role'=>$role]);
        }
    }
    
    
   

