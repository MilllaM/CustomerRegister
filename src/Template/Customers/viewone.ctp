<!-- file: src/Template/Customers/viewone.ctp -->

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php
//echo 'Päästiin viewone.ctp -fileen asti'; 
//echo ('Haun tulos ctp.filessä, sposti: ' . $loydetty['sposti']. '<br>'); 
?>

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
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($loydetty['nimi']) ?></h3>
    <h4> viewone.ctp </h4>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nimi') ?></th>
            <td><?= h($loydetty->nimi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
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
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($loydetty->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($loydetty->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($loydetty->modified) ?></td>
        </tr>
    </table>
</div>