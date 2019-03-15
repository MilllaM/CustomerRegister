
<h1><?php echo $haku['nimi']; ?></h1>
        
<p>Osoite: <?php echo $haku['osoite']; ?></p>
<p>Email: <?php echo $haku['sposti']; ?></p>
<p>Rekisterissä <?php echo date('d/m/Y', strtotime($haku['created'])); ?> lähtien.</p> 


<button class ="btn btn-info btn-lg"><?= $this->Html->link(__('Tee tiedosto'), ['action' => 'teefilu', $haku->id]) ?></button>