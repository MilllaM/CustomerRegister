<!-- file: src/Template/Customers/viewone.ctp -->

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="users view large-9 medium-8 columns content">
    <h1><?= h($loydetty['nimi']) ?></h1>
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
    <div class="valinnat">         
        <br><button type="button" class="btn btn-primary btn-lg"><?= $this->Html->link(__('Muuta tämän asiakkaan tietoja'), ['action' => 'edit', $loydetty->id]) ?></button>
        
        <br>
        <button type="button" class="btn btn-danger btn-lg"> <?= $this->Form->postLink(__('Poista tämä asiakas'), 
        ['action' => 'delete', $loydetty->id], 
        ['confirm' => __('Are you sure you want to delete # {0}?', $loydetty->id)]
        ) ?> </button>
        <br>
        <button type="button" class="btn btn-primary btn-lg"><?= $this->Html->link(__('Tee uusi haku'), ['action' => 'search']) ?></button>
    </div>
</div>