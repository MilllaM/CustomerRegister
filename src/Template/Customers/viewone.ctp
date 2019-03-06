<!-- file: src/Template/Customers/viewone.ctp -->

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<!--
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $loydetty->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete'), 
            ['action' => 'delete', $loydetty->id], 
            ['confirm' => __('Are you sure you want to delete # {0}?', $loydetty->id)]
            ) ?> 
        </li>
        <li><?= $this->Html->link(__('Uusi asiakas'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
-->
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($loydetty['nimi']) ?></h3>
    <br>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nimi') ?></th>
            <td><?= h($loydetty->nimi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sähköposti') ?></th>
            <td><?= h($loydetty->sposti) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puhelin') ?></th>
            <td><?= h($loydetty->puhelin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Osoite') ?></th>
            <td><?= h($loydetty->osoite) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($loydetty->created) ?></td>
        </tr>
     
    </table>
    <br>

    <ul class="">       
        <li><?= $this->Html->link(__('Muuta tämän asiakkaan tietoja'), ['action' => 'edit', $loydetty->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete'), 
            ['action' => 'delete', $loydetty->id], 
            ['confirm' => __('Are you sure you want to delete # {0}?', $loydetty->id)]
            ) ?> 
        </li>       
    </ul>
</div>