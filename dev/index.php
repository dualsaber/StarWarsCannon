<?php
error_reporting(E_ALL);
include_once('includes/simple_html_dom.php');

// Create DOM from URL or file
$html = file_get_html('http://starwars.wikia.com/wiki/Timeline_of_canon_media');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Star Wars Canon</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
  <link rel="stylesheet" href="css/main.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <center><h1>STAR WARS CANON LİSTESİ</h1><br />
    <small>bir amme hizmeti</small>
  </center>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <section class="film">
          <h2>FİLMLER <sup>AÇ / KAPA</sup></h2>
          <span class="list ">
            <?php
            foreach($html->find('tr.film') as $tr) {
              $years = $tr->find('td', 0)->outertext = '';
              $release = $tr->find('td', 4);
              $reDate = $release->outertext = '<div class="year">' . $release->outertext . '</div>';
              $films = $tr->find('td', 2)->find('a',0);
              $upDate = date('2015-12-18');
              echo $films . $release . '<br>';
            }

            ?>
          </span>
        </section>
      </div>
      <div class="col-md-6 col-xs-12">
        <section class="vg">
          <h2>OYUNLAR <sup>AÇ / KAPA</sup></h2>
          <span class="list ">
            <?php
            foreach($html->find('tr.videogame') as $tr){
              $years = $tr->find('td', 0)->outertext = '';
              $release = $tr->find('td', 4);
              $reDate = $release->outertext = '<div class="year">' . $release->outertext . '</div>';
              $vg = $tr->find('td', 2)->find('a',0);
              $upDate = date('2015-12-18');
              echo $vg . $release . '<br>';
            }

            ?>
          </span>
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <section class="comic">
          <h2>Ç. ROMAN <sup>AÇ / KAPA</sup></h2>
          <span class="list ">
            <?php
            foreach($html->find('tr.comic') as $tr){
              $years = $tr->find('td', 0)->outertext = '';
              $release = $tr->find('td', 4);
              $reDate = $release->outertext = '<div class="year">' . $release->outertext . '</div>';
              $comic = $tr->find('td', 2)->find('a',0);
              $upDate = date('2015-12-18');
              echo $comic . $release . '<br>';
            }

            ?>
          </span>
        </section>
      </div>

      <div class="col-md-6 col-xs-12">
        <section class="tv">
          <h2>DİZİLER <sup>AÇ / KAPA</sup></h2>
          <span class="list ">
            <?php
            foreach($html->find('tr.tv') as $tr){
              $years = $tr->find('td', 0)->outertext = '';
              $release = $tr->find('td', 4);
              $reDate = $release->outertext = '<div class="year">' . $release->outertext . '</div>';
              $tv = $tr->find('td', 2)->find('a',0);
              $upDate = date('2015-12-18');
              echo $tv . $release . '<br>';
            }

            ?>
          </span>
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <section class="novel">
          <h2>KİTAPLAR <sup>AÇ / KAPA</sup></h2>
          <span class="list">
            <?php
            foreach($html->find('tr.novel') as $tr){
              $years = $tr->find('td', 0)->outertext = '';
              $release = $tr->find('td', 4);
              $reDate = $release->outertext = '<div class="year">' . $release->outertext . '</div>';
              $novel = $tr->find('td', 2)->find('a',0);
              $upDate = date('2015-12-18');
              echo $novel . $release . '<br>';
            }

            ?>
          </span>
        </section>
      </div>
      <div class="col-md-6 col-xs-12">
        <section class="unpublished">
          <h2>PEK YAKINDA <sup>AÇ / KAPA</sup></h2>
          <span class="list">
            <?php
            foreach($html->find('tr.unpublished') as $tr){
              $years = $tr->find('td', 0)->outertext = '';
              $type = $tr->find('td', 1);
              $release = $tr->find('td', 4);
              $reDate = $release->outertext = '<div class="year">' . $release->outertext . '</div>';
              $typeClass = $type->outertext = '<div class="type">' . $type->outertext . '</div>';
              $unpublished = $tr->find('td', 2)->find('a',0);
              $upDate = date('2015-12-18');
              echo $typeClass . $unpublished . $release . '<br>';
            }

            ?>
          </span>
        </section>
      </div>

    </div>
  </div>
  <footer style="margin:100px 0 ">
    <span class="center"><center>v0.1.1</center></span>
  </footer>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
