<?php
namespace App\Controllers;

use App\Models\RvModel;
use App\Models\CompteModel;
use App\Models\PatientModel;


class ControlleurRv extends BaseController
{public function __construct(){
    helper(['url']);
}
    public function index(){
      /*  $rv=new RvModel();
        $pat=new PatientModel();
        $data['rv'] = $rv->where('statut','actif')->findAll();
        foreach($data['rv'] as $row){
        $p['patient']=$pat->find($rv['id_patient']);}*/
        
            // Créez une instance du modèle RvModel
            $rvModel = new RvModel();
        
            // Récupérez tous les enregistrements de la table "rendez_vous" avec le statut 'actif'
            $data['rv'] = $rvModel->where('statut', 'actif')->findAll();
        
            // Créez une instance du modèle PatientModel
            $patModel = new PatientModel();
        
            // Parcourez chaque enregistrement RV pour associer le nom et le prénom du patient
            foreach ($data['rv'] as &$rv) {
                // Récupérez les détails du patient correspondant à partir de id_patient
                $patient =$patModel->find($rv['id_patient']);
        
                // Vérifiez si le patient a été trouvé
                if ($patient) {
                    // Associez les noms et prénoms du patient aux données RV
                    $rv['nom_patient'] = $patient['nom'];
                    $rv['prenom_patient'] = $patient['prenom'];
                } else {
                    // Si le patient n'est pas trouvé, vous pouvez gérer cela ici
                    $rv['nom_patient'] = 'Patient introuvable';
                    $rv['prenom_patient'] = 'Patient introuvable';
                }
            }
        
            return view('rendez_vous/crudR', $data); 
        
        

        

    }

    public function formulaire(){
        $newPat=new PatientModel();
      
        $dataP['patient']=$newPat->findAll();
        
            echo view('templates/header');
            // echo view('templates/navbar');
             echo view('rendez_vous/enregistrement',$dataP);
             echo view('templates/footer');
        
    }
    public function enregistrer()
    {
        $newcpt = new RvModel();
        $pat = new PatientModel();
    
        $rules = [
            'cin_patient' => 'required',
            'date_rv' => 'required'
        ];
    
        $cin_patient = $this->request->getPost('cin_patient');
        var_dump($cin_patient);
        $pt = $pat->find($cin_patient);
        var_dump($pt);
        $cin_patient = $this->request->getPost('cin_patient');
        $query = $pat->query("SELECT id_patient FROM patient WHERE cin_patient = ?", [$cin_patient]);
        
        
            $row = $query->getRow();
            $id_patient = $row->id_patient;
            
            $data = [
                'date_rv' => $this->request->getPost('date_rv'),
                'id_compte' => session()->get('loggedUser'),
                'id_patient' => $id_patient
            ];
       
        
    
        if(($this->validate($rules))){
            echo 'etape 3';
            $newcpt->save($data);
            return redirect()->to(base_url('/public/crudRv'))->with('status','le rendez vous est ajouté ');
         
        }
        else{
            $error['validation']=$this->validator;
            echo view('templates/header');
            // echo view('templates/navbar');
             echo view('rendez_vous/enregistrement',$error);
             echo view('templates/footer');            }

    }
    public function modifier($id){
        $newPat=new PatientModel();
        $dataP['patient']=$newPat->findAll();
        $pat=new RvModel();
        $data['rv']=$pat->find($id);
        $combinedData = [
            'dataP' => $dataP,
            'd' => $data
        ];
        //echo view('templates/header'); 
        echo view('rendez_vous/modif',$combinedData);
        //echo view('templates/footer'); 
    }
      public function update($id){
        $newcpt=new RvModel();
        $pat=new PatientModel();
      
        $rules=[
            'date_rv'=>'required'
            ];

         $cin_patient = $this->request->getPost('cin_patient');
        var_dump($cin_patient);
        $pt = $pat->find($cin_patient);
        var_dump($pt);
        $cin_patient = $this->request->getPost('cin_patient');
        $query = $pat->query("SELECT id_patient FROM patient WHERE cin_patient = ?", [$cin_patient]);
        
        
            $row = $query->getRow();
            $id_patient = $row->id_patient;
            $data = [
                'date_rv' => $this->request->getPost('date_rv'),
                'id_compte' => session()->get('loggedUser'),
                'id_patient' => $id_patient
            ];
        if(($this->validate($rules))){
            
            $newcpt->update($id,$data);
            return redirect()->to(base_url('/public/crudRv'))->with('status','les information du rendez vous  sont MODIFIER ');
        
        }
        else{
            $error['validation']=$this->validator;
            echo view('templates/header');
            // echo view('templates/navbar');
             echo view('rendez_vous/modif',$error);
             echo view('templates/footer');            
            }
      }
      public function supprimer($id){
        $pat=new RvModel();
        $data=$pat->find($id);
    
        $data=['statut'=>'annulee'];
        echo "la valeur de statut est changé";
        $pat->update($id,$data);
       
        return redirect()->to(base_url('/public/crudRv'))->with('status','le rendez vous est annulé ');
    }

   public function ajax(){
    $term=$this->request->getVar('term');
    $patient=new patientModel();
    $cin=$patient->where('statut','actif')->like('cin_patient',$term,'poth')->findColumn('cin_patient');
    return $this->response->setJSON($cin);

   }
   public function calendrier(){
    $rv = new RvModel();
    $p=new PatientModel();
    
    $rdv['rv'] = $rv->findAll(); // Récupérer tous les rendez-vous depuis la base de données
    foreach ($rdv['rv'] as &$rv) {
        // Récupérez les détails du patient correspondant à partir de id_patient
        $patient =$p->find($rv['id_patient']);
        
        // Vérifiez si le patient a été trouvé
        if ($patient) {
            // Associez les noms et prénoms du patient aux données RV
            $rv['nom_patient'] = $patient['nom'];
            $rv['prenom_patient'] = $patient['prenom'];

        } else {
            // Si le patient n'est pas trouvé, vous pouvez gérer cela ici
            $rv['nom_patient'] = 'Patient introuvable';
            $rv['prenom_patient'] = 'Patient introuvable';
        }
    }
    $today = new \DateTime();
    $moisActuel = $today->format('F'); // 'F' représente le nom complet du mois
    
    // Passer les rendez-vous à la vue
    return view('rendez_vous/calendrier', ['moisActuel' => $moisActuel,'rdv' => $rdv]);
}

}
?>
