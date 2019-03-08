<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Lisää uusi käyttäjä') ?></legend>
        <?php
            echo $this->Form->control('name', array(
                'label' => 'Nimi',
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'käyttäjän nimi'
            ));  
            
            echo $this->Form->control('email', array(
                'label' => 'Sähköposti',
                'type' => 'email',
                'class' => 'form-control',
                'placeholder' => 'sähköpostiosoite'
            ));
            echo $this->Form->control('password', array(
                'label' => 'Salasana',
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'salasana',
                'templateVars' => ['help' => 'At least 8 characters long']
            )); 
        ?>
    </fieldset>
    <?php 
    echo '<br>';

    echo $this->Form->button('Lisää rekisteriin', ['type' => 'submit', 'class' =>'btn btn-primary']);
    echo $this->Form->end();  //closes the form
    ?>
</div>
