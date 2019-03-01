<?php

//file:  src/Model/Entity/Customer.php 

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Customer extends Entity {
    //the _accessible property controls how props can be modified by 'Mass Assignment'
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

?>