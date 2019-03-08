<!-- file: src/Template/Customers/view.ctp -->


<div class="users view large-9 medium-8 columns content">
    <h1><?= h($customer->nimi) ?></h1>
    <br>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nimi') ?></th>
            <!-- h() escapes user content -->
            <td><?= h($customer->nimi) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sähköposti') ?></th>
            <td><?= h($customer->sposti) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puhelin') ?></th>
            <td><?= h($customer->puhelin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Osoite') ?></th>
            <td><?= h($customer->osoite) ?></td>
        </tr>
       
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($customer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($customer->modified) ?></td>
        </tr>
    </table>
</div>
<br>

<button type="button" class="btn btn-primary btn-lg"><?= $this->Html->link(__('Paluu etusivulle'), ['action' => 'index']) ?> </button>