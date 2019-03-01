<!-- File: /src/Template/Customers/edit.ctp -->

<h1>Edit existing customer data</h1>
<?php
echo $this->Form->create($customer); 

echo $this->Form->control('name');
echo $this->Form->control('address');
echo $this->Form->control('email');
echo $this->Form->control('phone');
echo $this->Form->control('y_tunnus');

echo $this->Form->button(__('Tallenna muutokset'));
echo $this->Form->end();  //closes the form  
?>