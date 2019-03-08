<!-- File: /src/Template/Users/edit.ctp -->


</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Muuta tietoja') ?></legend>
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
    <br>
    <?= $this->Form->button('Tallenna', ['type' => 'submit', 'class' =>'btn btn-primary btn-lg']) ?>
    <?= $this->Form->end() ?>
</div>
<div>
    

<button class="btn btn-info btn-lg"> <?= $this->Html->link(__('Näytä kaikki käyttäjät'), ['action' => 'index']); ?></button>



</div>


