<!-- file: src/Template/Users/login.ctp -->
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<h1>Login</h1>
<?php 
echo $this->Form->create();

echo $this->Form->control('email', array(
    'label' => 'Sähköposti',
    'type' => 'text',
    'class' => 'form-control',
    'placeholder' => 'sposti'
)); 
echo $this->Form->control('password', array(
    'label' => 'Salasana',
    'type' => 'password',
    'class' => 'form-control',
    'placeholder' => 'salasana',
    'required' => true
    
));

echo '<br>';

echo $this->Form->button('Kirjaudu sisään', ['type' => 'submit', 'class' =>'btn btn-primary']);

echo $this->Form->end();

?>


