<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity
{

     protected $_accessible = [
          'username' => true,
          'name' => true,
          'gender' => true,
          'email' => true,
          'city' => true,
     ];
}