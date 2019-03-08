<?php

$cakeDescription = 'Asiakasrekisteri';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/webroot/css/oma.css') ?>
    
    <?= $this->fetch('meta') ?>

</head>
<body>

<!-- Navbar  TÄMÄ PITÄÄ VIELÄ KORJATA!! -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Asiakasrekisteri</a>
  <!--<?php echo $this->Html->link('Asiakasrekisteri', '/'); ?></a> -->

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">       
        <?php echo $this->Html->link('Etusivu', '/'); ?>
      </li>
      <li class="nav-item">       
        <?php echo $this->Html->link('Käyttäjät', '/users'); ?>
      </li>
    </ul>


    <ul class="navbar-nav right">
      <li class="nav-item"><?= $this->Html->link(__(' Logout'), ['controller'=>'users', 'action'=>'logout']); ?></li>
    </ul>
  </div>
</nav>
<!-- END Navbar -->


    <?= $this->Flash->render() ?>
    <div class="container clearfix">
      <div class="row">
          <div class="col-md-3 col-lg-2 col-sm-3">
            
          </div>
          <div class="col-md-9 col-lg-10 col-sm-9">
              <?= $this->fetch('content') ?> <!-- this will show the content from the "routes"   -->
          </div>
      </div>        
    </div>

    <footer>
    </footer>
</body>
</html>
