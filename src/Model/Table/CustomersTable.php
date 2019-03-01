<?php
// file:  scr/Model/Table/CustomersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class CustomersTable extends Table {
    public function initialize(array $config) {
        $this->addBehavior('Timestamp'); //automatically populates created&modified columns of the DB table
    } 

    public function hae($etsittavanimi, $etsittavatyyppi) {
//SQL haku
//$query = $this->find()
//->where('nimi' => $etsittavanimi AND 'asiakastyyppi' => $etsittavatyyppi);
//debug($query);

//return 'data'
$asiakas = $this->find()
->where(['nimi =' => $etsittavanimi]);

echo $asiakas;

    }

    // The $query argument is a query builder instance.
// The $options array will contain the 'tags' option we passed
// to find('tagged') in our controller action.
public function hakuyritys(Query $query, array $options)
{
    $asiakas = $this->find()
        ->select(['nimi', 'asiakastyyppi']);
  

    return $asiakas;
}
}

?>