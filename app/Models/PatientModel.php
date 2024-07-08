<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table ='patient';
    protected $primaryKey ='id_patient';

    protected $useAutoIncrement = true;
protected $returnType= 'array';
    

    protected $allowedFields = ['cin_patient','nom','prenom','date_naissance','telephone','adresse','id_compte','sexe','statut'];

   
 /*protected function beforeInsert(array $data){
    $data=$this->passwordHach($data);
     return $data;
 }
 protected function beforeUpdate(array $data){
   $data=$this->passwordHach($data);
   return $data;
 }
 protected function passwordHach(array $data){
    if(!isset($data['data']['password']))
    $data['data']['password']=password_hash($data['data']['password'],PASSWORD_DEFAULT);
    return $data;
 }*/

    
    
} ?>
