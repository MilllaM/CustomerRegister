<!-- file: src/Template/Customers/search.ctp -->

<h1>Etsi asiakas</h1>
<?php
echo $this->Form->create("", ['type' => 'get']);

// yo. tulos: <form method="get" accept-charset="utf-8" action="/asiakasDb/search?nimi=Laila&amp;tyyppikoodi=20">




echo $this->Form->control('nimi');
echo $this->Form->control('tyyppikoodi', array(
    'label'=> 'Asiakastyyppi',
    'type' => 'select',
    'class'=> 'form-control',
    'empty'=> 'Valitse asiakkaan tyyppi listalta',
    'options'=> [10=>'yritysasiakas', 20=>'yksityisasiakas']
));

//ao. tekee tämän: <button type="submit">Etsi tämä asiakas</button>
echo $this->Form->button(__('Etsi tämä asiakas'));

// echo $this->Form->submit('Etsi');
//echo $this->Form->button('Etsi', ['type' => 'submit']);
echo $this->Form->end();  //closes the form

?>

<!-- IF found, show: -->
<?= $this->Element('cust_result'); ?> 

<!-- KOKEILU 
<table>
   <tr>
      <td>ID</td>
      <td>Username</td>
      <td>Password</td>
      <td>Edit</td>
      <td>Delete</td>
   </tr>

   <?php
      foreach ($results as $row):
         echo "<tr><td>".$row->id."</td>";
         echo "<td>".$row->nimi."</td>";
         echo "<td>".$row->osoite."</td>";
         echo "<td><a href = '".$this->Url->build
         (["controller" => "Customers","action"=>"edit",$row->id])."'>Edit</a></td>";
         
      endforeach;
   ?>
</table>
-->