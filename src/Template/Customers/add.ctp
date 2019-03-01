<!-- File: /src/Template/Customers/add.ctp -->

<h1>Add a new customer</h1>
<?php

echo $this->Form->create($customer);

echo $this->Form->control('nimi');
echo $this->Form->control('osoite');
echo $this->Form->control('sposti');
echo $this->Form->control('puhelin');
echo $this->Form->control('tyyppikoodi', array(
    'label'=> 'Asiakastyyppi',
    'type' => 'select',
    'class'=> 'form-control',
    'empty'=> 'Valitse asiakkaan tyyppi',
    'options'=> [10=>'yritysasiakas', 20=>'yksityisasiakas']
));

echo $this->Form->button(__('Lisää uusi asiakas'));
echo $this->Form->end();  //closes the form


?>
 