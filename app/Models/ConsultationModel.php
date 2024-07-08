<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultationModel extends Model
{
    protected $table ='consultation';
    protected $primaryKey ='code';

    protected $useAutoIncrement = true;

    

    protected $allowedFields = ['description','date_cons','heure','id_compte','id_rv','statut'];
 
} ?>
