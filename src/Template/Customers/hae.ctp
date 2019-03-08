<!-- File: src/Template/Customers/hae.ctp -->

<h1>Hae asiakas</h1>
<?php
    //echo $this->Form->create($customer);
    echo $this->Form->create();
    echo $this->Form->control('nimi');
    echo $this->Form->radio('tyyppikoodi', ['10' =>'yritysasiakas', '20'=> 'yksityisasiakas'] );
    echo '<br>';
    echo $this->Form->button(__('Etsi'));
    echo $this->Form->end();
?>



<!--
<div class="input text"><label for="nimi">Nimi</label><input type="text" name="nimi" id="nimi"></div>    
<label for="tyyppikoodi-10"><input type="radio" name="tyyppikoodi" value="10" id="tyyppikoodi-10">yritysasiakas</label>
-->

<?php  echo $this->element('testi', $haku); ?>