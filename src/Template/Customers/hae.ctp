<!-- File: src/Template/Customers/hae.ctp -->

<h1>Hae asiakas</h1>
<?php
    //echo $this->Form->create($customer);
    echo $this->Form->create();
    echo $this->Form->radio('tyyppikoodi', ['10' =>'yritysasiakas', '20'=> 'yksityisasiakas'] );  
    echo $this->Form->control('nimi', array(
        'label' => 'Etsittävä',
        'type' => 'text',
        'class' => 'form-control',
        'placeholder' => 'anna etsittävä nimi'
    ));    
    echo '<br>';

/*
  //select2 trial
    echo $this->Ajax->autoComplete_ui('Customer.search', array(
        'source' => array(
            'controller' => 'Customers',
            'action' => 'autoComplete',
        ),
    ));
*/

    echo $this->Form->button(__('Etsi'));
  
    echo $this->Form->end();
?>




<?php
if(!empty($haku)) {
    echo $this->element('asnaytto'); 
    
}
else {
    echo 'Eipä löytynyt moista.';
}
?>


<!-- <?php  echo $this->element('asnaytto'); ?> -->


