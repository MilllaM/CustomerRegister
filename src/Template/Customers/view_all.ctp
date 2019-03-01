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
</tr> 
<?php endforeach; ?>

</table>

<!--toinen vaihtoehto:   created->format(DATE_RFC850)  --> 