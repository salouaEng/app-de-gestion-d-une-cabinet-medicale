<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificatModel extends Model
{
    protected $table ='certificat';
    protected $primaryKey ='id_certificat';

    protected $useAutoIncrement = true;

    

    protected $allowedFields = ['nbrJour','dateDebut','dateFin','id_consultation','id_compte'];
 
} ?>
