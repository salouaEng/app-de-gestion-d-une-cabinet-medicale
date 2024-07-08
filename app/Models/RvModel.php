<?php

namespace App\Models;

use CodeIgniter\Model;

class RvModel extends Model
{
    
    protected $table ='rendez_vous';
    protected $primaryKey ='id_rv';

    protected $useAutoIncrement = true;

    

    protected $allowedFields = ['date_rv','id_compte','id_patient','statut'];

}
?>