<h1><?php echo $haku['nimi']; ?></h1>
         
        <?php echo $haku['created']; ?>
        <p>Osoite: <?php echo $haku['osoite']; ?></p>
        <p>Email: <?php echo $haku['sposti']; ?></p> 
        <hr>
        <a href="<?php  echo ROOT_URL; ?>edit.php?id=<?php echo $haku['id']; ?>" class="btn btn-warning">Edit</a>
        <a href="<?php  echo ROOT_URL; ?>poista.php?id=<?php echo $haku['id']; ?>" class="btn btn-danger">Delete</a>
    
    </div>

<!-- vaihtoehto ? ? -->
<?php
    foreach ($results as $row):
        echo "<tr><td>".$row->id."</td>";
        echo "<td>".$row->nimi."</td>";
        echo "<td>".$row->osoite."</td>";
        echo "<td><a href = '".$this->Url->build
        (["controller" => "customers","action"=>"edit",$row->id])."'>Edit</a></td>";
        
    endforeach;
?>