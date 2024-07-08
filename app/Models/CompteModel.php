<?php

namespace App\Models;

use CodeIgniter\Model;

class CompteModel extends Model
{
    protected $table ='compte';
    protected $primaryKey ='id_compte';

    protected $useAutoIncrement = true;

    

    protected $allowedFields = ['user_name','pass_word','email','etat','id_role'];

   
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
