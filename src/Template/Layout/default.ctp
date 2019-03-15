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

  <?= $this->Html->css(array(
    'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
    '/webroot/css/oma.css', 
    'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css'
  )); ?> 
  
  <?php
  echo $this->Html->script(array(  //vaihtoehtoinen tapa eli kaikki niputettuna
    'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',
    'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.full.js'
  ));  
  ?>

<?= $this->fetch('meta') ?>
<?= $this->fetch('css') ?>
<?= $this->fetch('script') ?>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Asiakasrekisteri</a>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">       
        <?php echo $this->Html->link('Etusivu', '/'); ?>
      </li>
      <li class="nav-item">       
        <?php echo $this->Html->link('Käyttäjät', '/users'); ?>
      </li>
    </ul>

    <!-- Navbar, oikealla -->
    <ul class="navbar-nav right">
      <li class="nav-item"><?= $this->Html->link(__(' Logout'), ['controller'=>'users', 'action'=>'logout']); ?></li>
    </ul>
  </div>
</nav>
<!-- END Navbar -->


    <?= $this->Flash->render() ?>
    <div class="container clearfix">
      <div class="row">
          <div class="col-md-3 col-lg-2 col-sm-3"></div>

          <div class="col-md-9 col-lg-10 col-sm-9">
              <?= $this->fetch('content') ?> <!-- this will show the content from the "routes"   -->
          </div>
      </div>        
    </div>

    <footer>
    </footer>
    <script>
   
    </script>
</body>
</html>
