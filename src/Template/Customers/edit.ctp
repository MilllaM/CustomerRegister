<!-- File: /src/Template/Customers/edit.ctp -->
<!--
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

-->

<!-- File: /src/Template/Users/edit.ctp -->
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav> -->
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Edit Customer') ?></legend>
        <?php
            echo $this->Form->control('nimi');
            echo $this->Form->control('sposti');
            echo $this->Form->control('osoite');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>