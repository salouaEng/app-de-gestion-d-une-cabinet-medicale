<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;

use App\Models\ConsultationModel;
use App\Models\RvModel;
use App\Models\PatientModel;
use App\Models\CompteModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class ControlleurCons extends BaseController{
    public function __construct(){
        helper(['url','form']);
     }
     public function index()
     {
         $pat = new ConsultationModel();
         $data['cons'] = $pat->where('statut', 'succes')->findAll();
         $rdvmodel = new RvModel();
         $patmodel = new PatientModel();
         foreach ($data['cons'] as &$row) { // Notez le & pour modifier la variable $row directement
             $rdv = $rdvmodel->find($row['id_rv']);
             $pat = $patmodel->find($rdv['id_patient']);
     
             // Vérifiez si $rdv et $pat ne sont pas nuls avant d'accéder à leurs indices
             if ($rdv !== null && $pat !== null) {
                 $row['nom'] = $pat['nom'];
                 $row['prenom'] = $pat['prenom'];
             } else {
                 // Gérez le cas où l'une des recherches a échoué (par exemple, en affectant des valeurs par défaut)
                 $row['nom'] = 'N/A'; // Remplacez 'N/A' par la valeur par défaut souhaitée
                 $row['prenom'] = 'N/A';
             }
         }
         return view('Cons/crudCons',$data); 
     }
     
public function formulaire(){
    $rv=new RvModel();
        $data['v']=$rv->findAll();
    echo view('templates/header');
    // echo view('templates/navbar');
     echo view('Cons/enregistrement',$data);
     echo view('templates/footer');  
}
public function enregistrer(){
    $newcpt=new ConsultationModel();
    $rules=[
        'date_cons'=>'required', 
        'heure'=>'required', 
        'id_rv'=>'required'

        ];
    $data=['description'=>request()->getPost('description'),
        'date_cons'=>request()->getPost('date_cons'),
        'id_compte'=>session()->get('loggedUser'),
        'heure'=>request()->getPost('heure'),
        'id_rv'=>request()->getPost('id_rv')
    ];
    if(($this->validate($rules))){
        echo $data['date_cons'];
        $newcpt->save($data);
        return redirect()->to(base_url('/public/crudCons'))->with('status','la consultation est ajouté ');
     
    }
    else{
        $rv=new RvModel();
        $data['v']=$rv->findAll();
        $error['validation']=$this->validator;
        $inf=['data'=>$data,'error'=>$error];
        echo view('templates/header');
        // echo view('templates/navbar');
         echo view('Cons/enregistrement',$inf);
         echo view('templates/footer');           
         }

}
public function modifier($id){

    $pat=new ConsultationModel();
    $all['cons']=$pat->findAll();
    $data['cons']=$pat->find($id);
    $inf=['all'=>$all,'data'=>$data];
    echo view('templates/header'); 
    echo view('Cons/modif',$inf);
    echo view('templates/footer'); 
  }
  public function update($id){
    $newcpt=new ConsultationModel();
    $rules=[
        'date_cons'=>'required', 
        'heure'=>'required', 
        'id_rv'=>'required'

        ];
    $data=['description'=>request()->getPost('description'),
        'date_cons'=>request()->getPost('date_cons'),
        'id_compte'=>session()->get('loggedUser'),
        'heure'=>request()->getPost('heure'),
        'id_rv'=>request()->getPost('id_rv')
    ];
    if(($this->validate($rules))){
        echo $data['date_cons'];
        $newcpt->update($id,$data);
        return redirect()->to(base_url('/public/crudCons'))->with('status','la consultation est modifiée ');
     
    }
    else{
        $rv=new ConsultationModel();
        $all['cons']=$rv->findAll();
        $data['cons']=$rv->find($id);

        $error['validation']=$this->validator;
        $inf=['data'=>$data,'error'=>$error,'all'=>$all];
        echo view('templates/header');
        // echo view('templates/navbar');
         echo view('Cons/modif',$inf);
         echo view('templates/footer');           
         }
  }
  public function supprimer($id){
    $pat=new ConsultationModel();
    $data=$pat->find($id);

    $data=['statut'=>'echoue'];
    echo "la valeur de statut est changé";
    $pat->update($id,$data);
   
    return redirect()->to(base_url('/public/crudRv'))->with('status','la consultation a echouée  ');
}
public function enregistrerConsultation($id,$id_rv){
    $cons=new ConsultationModel();
    $currentTime =Time::now(); 
    $dateFormat = 'Y-m-d';
$heureFormat = 'H:i:s'; 
$data=[
'heure'=>$currentTime->format($heureFormat),
'date_cons'=>$currentTime->format($dateFormat),
'id_compte'=>session()->get('loggedUser'),
'id_rv'=>$id_rv,
'description'=>request()->getPost('description')
];
$cons->save($data);
return redirect()->to(base_url('/public/generer_consultation/'.$id.'/'.$id_rv))->with('status','la consultation est enregistrer  ');

}
public function afficheConsultation($id,$id_rv){
    $pat=new PatientModel();
    $patient=$pat->find($id);
return view('Cons/cons',['patient'=>$patient,'id_rv'=>$id_rv]);
}

   
        public function generatePdf()
        {
            // Créer une instance de Dompdf avec des options
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
    
            $dompdf = new Dompdf($options);
    
            // Votre contenu HTML à convertir en PDF
            $html = view('Cons/certificat');
            // Charger le contenu HTML dans Dompdf
            $dompdf->loadHtml($html);
    
            // (Optionnel) Définir la taille du papier et de l'orientation
            $dompdf->setPaper('A4', 'portrait');
    
            // Rendre le PDF (vous pouvez également le sauvegarder sur le serveur)
            $dompdf->render();
    
            // Afficher le PDF dans le navigateur
            $dompdf->stream();
        }
        public function afficherPopup(){
            return view('Cons/certificat');
        }
        public function affichePopup(){
            return view('Cons/ord');
        }
        public function genererPdf()
        {
            // Créer une instance de Dompdf avec des options
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
    
            $dompdf = new Dompdf($options);
    
            // Votre contenu HTML à convertir en PDF
            $html = view('Cons/ord');
            // Charger le contenu HTML dans Dompdf
            $dompdf->loadHtml($html);
    
            // (Optionnel) Définir la taille du papier et de l'orientation
            $dompdf->setPaper('A4', 'portrait');
    
            // Rendre le PDF (vous pouvez également le sauvegarder sur le serveur)
            $dompdf->render();
    
            // Afficher le PDF dans le navigateur
            $dompdf->stream();
        }
    }
    




