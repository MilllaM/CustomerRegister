<!-- file: src/Template/Customers/search.ctp -->

<h1>Etsi asiakas</h1>
<?php
echo $this->Form->create("", ['type' => 'get']);

// yo. tulos: <form method="get" accept-charset="utf-8" action="/asiakasDb/search?nimi=Laila&amp;tyyppikoodi=20">



echo $this->Form->control('nimi', array(
    'label' => 'Nimi',
    'type' => 'text',
    'class' => 'form-control',
    'placeholder' => 'asiakkaan nimi'
));
echo $this->Form->control('tyyppikoodi', array(
    'label'=> 'Asiakastyyppi',
    'type' => 'select',
    'class'=> 'form-control',
    'empty'=> 'Valitse asiakkaan tyyppi listalta',
    'options'=> [10=>'yritysasiakas', 20=>'yksityisasiakas']
));

echo '<br>';
echo $this->Form->button('Etsi tämä asiakas', ['type' => 'submit', 'class'=> 'btn btn-primary btn-lg']);

echo $this->Form->end();  //closes the form

?>


