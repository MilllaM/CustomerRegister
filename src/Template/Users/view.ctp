<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users view large-9 medium-8 columns content">
    <h3>Käyttäjätiedot: <?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nimi') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sähköposti') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Salainen sana') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Luotu rekisteriin') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Viimesin muokkaus') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <button class ="btn btn-info btn-lg"><?= $this->Html->link(__('Muuta tietoja'), ['action' => 'edit', $user->id]) ?></button>
    <button class ="btn btn-danger btn-lg"><?= $this->Form->postLink(__('Poista tämä käyttäjä'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?></button>

</div>
