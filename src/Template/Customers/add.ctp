<!-- File: /src/Template/Customers/add.ctp -->

<h1>Lisää uusi asiakas</h1>
<?php

echo $this->Form->create($customer);

echo $this->Form->control('nimi', array(
    'label' => 'Nimi',
    'type' => 'text',
    'class' => 'form-control',
    'placeholder' => 'asiakkaan nimi'
));

echo $this->Form->control('osoite', array(
    'label' => 'Osoite',
    'type' => 'text',
    'class' => 'form-control',
    'placeholder' => 'osoite'
)); 

echo $this->Form->control('sposti', array(
    'label' => 'Sähköposti',
    'type' => 'email',
    'class' => 'form-control',
    'placeholder' => 'sähköpostiosoite'
));
echo $this->Form->control('puhelin', array(
    'label' => 'Puhelin',
    'type' => 'text',
    'class' => 'form-control',
    'placeholder' => 'puhelinnumero'
));

echo $this->Form->control('tyyppikoodi', array(
    'label'=> 'Asiakastyyppi',
    'type' => 'select',
    'class'=> 'form-control',
    'empty'=> 'Valitse asiakkaan tyyppi',
    'options'=> [10=>'yritysasiakas', 20=>'yksityisasiakas']
));

echo '<br>';
echo $this->Form->button(__('Lisää uusi asiakas'));
echo $this->Form->button('Lisää rekisteriin', ['type' => 'submit', 'class' =>'btn btn-primary']);
echo $this->Form->end();  //closes the form


?>
 