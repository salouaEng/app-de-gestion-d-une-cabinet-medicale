<?php

namespace App\Controllers;

use App\Models\CompteModel;
use CodeIgniter\Email\Email;
class Auth extends BaseController
{
  public function __construct(){
    helper(['url','form']);
  }
    public function index(){
            echo view('templates/header'); 
           // echo view('templates/background');
            echo view('compte/authentification');
            // view('templates/navbar');
            echo view('templates/footer');
    }
   
    public function accueil() {
      echo view('templates/header');
      echo view('compte/authentification');
      echo view ('templates/footer');}



public function authentifier(){
      $user = [
        'user_name' => request()->getPost('user_name'),
        'pass_word' => request()->getPost('pass_word')
      ];
      
      $cpt = new CompteModel();
      $comptes = $cpt->where('etat','0')->findAll(); 
      
      $loggedIn = false; // Variable pour suivre si l'utilisateur est connecté
      $id=null;
      foreach ($comptes as $row) {
        if ($row['user_name'] === $user['user_name'] && password_verify(\Config\Services::request()->getPost('pass_word'),$row['pass_word'])) {
          $id=$row['id_compte'];
          $loggedIn = true; // L'utilisateur est connecté
          break; // Pas besoin de vérifier les autres comptes si on en a trouvé un
        
      }}
      if ($loggedIn) {
        session()->set('loggedUser',$id);
       
        return  view('templates/navbar');
      } else {

        //echo view('templates/header'); 
        return redirect()->to(base_url('/public/accueil'))->with('fail','info incorrect ');
        //echo view('templates/footer'); 
      }
    }
  
public  function formulaire()
{    
    echo view('templates/header');
    // echo view('templates/navbar');
     echo view('compte/enregistrement');
     echo view('templates/footer');
}
public function crudCompte(){
    $compte=new CompteModel();
    $data['compte'] = $compte->where('etat','0')->findAll();
     return view('compte/crud', $data);

}
    public function enregistrer(){
      helper('url','form');
        $newcpt=new CompteModel();
        $rules=[
          'user_name'=>'required',  
          'pass_word'=>'required|min_length[3]',
          'email'=>'required|min_length[12]|valid_email|is_unique[compte.email]',
          'confirm'=>'required|matches[pass_word]'
          ];
        $data=[
            'user_name'=>request()->getPost('user_name'),
            'pass_word' =>password_hash(\Config\Services::request()->getPost('pass_word'), PASSWORD_DEFAULT), // Encrypte le mot de passe
            'id_role'=>request()->getPost('id_role'),
            'email'=>request()->getPost('email')
        ];
        $validation=$this->validate($rules);
        if(!$validation){
      echo view('templates/header');
    // echo view('templates/navbar');
     echo view('compte/enregistrement',['validation'=>$this->validator]);
     echo view('templates/footer');

        }
        else{ $newcpt->save($data);
          return redirect()->to(base_url('/public/crudCompte'))->with('status','le compte est ajouter ');
      }
       }
       
  public function modifier($id){
    $cpt=new CompteModel();
    $data['compte']=$cpt->find($id);
    echo view('templates/header'); 
    echo view('compte/modif',$data);
    echo view('templates/footer'); 
  }


  public function update($id){
    $cpt=new CompteModel();
    $data=[
        'user_name'=>request()->getPost('user_name'),
        'pass_word'=>request()->getPost('pass_word'),
        'email'=>request()->getPost('email'),
        'id_role'=>request()->getPost('id_role')
    ];
    $cpt->update($id,$data);
    return redirect()->to(base_url('/public/crudCompte'))->with('status','le compte est MODIFIER ');

  }


  public function supprimer($id){
    $cpt=new CompteModel();
    
    $etat=
    ['etat'=>1];
    $cpt->update($id,$etat);
    return redirect()->to(base_url('/public/crudCompte'))->with('status','le compte a été bloqué ');

  } 
  
  
  public function recupererMp(){

    return view('compte/motPassOublier');
  }
  


    public function resetPassword()
    {
        // Récupérer l'email depuis l'URL
        $email =request()->getPost('email');


        // Générer un mot de passe aléatoire
        $newPassword =rand(999,9999);

        // Mettre à jour le mot de passe dans la base de données
        $userModel = new CompteModel();
    $user = $userModel->where('email', $email)->get()->getRow();

    if ($user) {
        // Mettre à jour le mot de passe dans la base de données
        $data = ['pass_word' => $newPassword];
        $userModel->where('id_compte', $user->id_compte)->update($data);

        // Envoyer le nouveau mot de passe par e-mail
        $this->sendPasswordEmail($email, $newPassword);

        return "Nouveau mot de passe généré et envoyé à l'e-mail : $email";
    } else {
        return "Aucun compte trouvé avec l'e-mail : $email";
    }
}



   

 


    // ...

    private function sendPasswordEmail($email, $password)
    {
        // Configuration de l'email
        $config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'votre-hote-smtp',
            'SMTPUser' => 'votre-nom-d-utilisateur-smtp',
            'SMTPPass' => 'votre-mot-de-passe-smtp',
            'SMTPPort' => 587,
            'mailType' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        // Initialisation de la classe Email
        $emailService = new Email($config);

        $emailService->setFrom('votre-adresse-email', 'Votre Nom')
                     ->setTo($email)
                     ->setSubject('Votre nouveau mot de passe')
                     ->setMessage("Votre nouveau mot de passe est : $password");

        // Envoyer l'email
        if ($emailService->send()) {
            return "Nouveau mot de passe envoyé à l'email : $email";
        } else {
            return "Échec de l'envoi de l'email.";
        }
    }
}





