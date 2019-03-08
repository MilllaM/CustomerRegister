<!-- File: /src/Template/Customers/edit.ctp -->

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Muuta asiakkaan tietoja') ?></legend>
        <?php
            
            echo $this->Form->control('nimi', array(
                'label' => 'Nimi',
                'type' => 'text',
                'class' => 'form-control'
            ));
            
            echo $this->Form->control('sposti', array(
                'label' => 'Sähköposti',
                'type' => 'text',
                'class' => 'form-control'
            ));
            
            echo $this->Form->control('puhelin', array(
                'label' => 'Puhelinnro',
                'type' => 'text',
                'class' => 'form-control'
            ));
            
            echo $this->Form->control('osoite', array(
                'label' => 'Osoite',
                'type' => 'text',
                'class' => 'form-control'
            ));
        ?>
    </fieldset>
    <br>
    
    <?= $this->Form->button('Tallenna muutokset', ['type' => 'submit', 'class'=> 'btn btn-primary btn-lg']); ?>
    
    <?= $this->Form->end() ?>
</div>