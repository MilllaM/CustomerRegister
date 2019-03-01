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

    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css') ?>
    <?= $this->Html->css('\webroot\css\oma.css') ?>
    
    <?= $this->fetch('meta') ?>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><?= $this->fetch('title') ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#"><?php echo $this->Html->link('Home', '/'); ?><span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<!-- END Navbar -->


    <?= $this->Flash->render() ?>
    <div class="container clearfix">
    <div class="row">
        <div class="col-md-4 col-lg-3 col-sm-4">
        <h4>* placeholder * in default.ctp</h4>
           
        </div>
        <div class="col-md-8 col-lg-9 col-sm-8">
            <?= $this->fetch('content') ?> <!-- this will show the content from the "routes"   -->
        </div>
    </div>
        
    </div>


    <footer>
    </footer>
</body>
</html>
