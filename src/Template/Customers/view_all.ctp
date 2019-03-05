<!-- file: src/Template/Customers/view_all.ctp -->

<h1>Customers</h1>
<table>
<tr>
    <th>Nimi</th>
    <th>Sähköposti</th>
    <th>Luotu tietokantaan</th>
</tr>

<!--iterate through the query object -->
<?php foreach ($customers as $asiakas):  ?>
<tr>
    <td>
    <?= $asiakas->nimi ?>
    </td>
    <td>
        <?= $asiakas->sposti ?>
    </td>
    <td>
        <?= $asiakas->created->format('Y-m-d H:i:s') ?>
    </td>
    <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $asiakas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $asiakas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $asiakas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asiakas->id)]) ?>
                </td>
</tr> 
<?php endforeach; ?>

</table>

<!--toinen vaihtoehto:   created->format(DATE_RFC850)  --> 