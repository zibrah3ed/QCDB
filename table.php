<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>QC DB Front End</title>

    <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Lobster|Raleway:400,500" rel="stylesheet">
    <!-- Personal Style Sheet -->
      <link rel="stylesheet" href="styles.css">

      <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Optional theme -->
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      <!-- Chartist -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
      <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">QC Database</a>
      </div>
      <!-- <div id="navbar" class="navbar-collapse collapse">
        <form class="navbar-form navbar-right">
          <div class="form-group">
            <input type="text" placeholder="Email" class="form-control" autocomplete="off">
          </div>
          <div class="form-group">
            <input type="password" placeholder="Password" class="form-control" autocomplete="off">
          </div>
          <button type="submit" class="btn btn-success">Sign in</button>
        </form>
      </div></.navbar-collapse -->
    </div>
  </nav>
  <!-- Banner at top of page -->
  <div class="jumbotron">
    <div class="container lobster-text">
      <h1>Aggregate Gradation Search</h1>
    </div>
  </div>
<!-- End Banner -->


<!-- PHP Scripts -->
<?php
    include 'config.php';
    include 'opendb.php';
    include 'createTable.php';
    include 'createTableLong.php';
    $jobNum = $_GET["jobNum"];
    //makeTableLong($jobNum);
?>
<!-- End PHP -->

<!-- Gradation Tables -->
  <div class="container">
      <div class="row">
        <div class="col-md-3">
          <?php
            $type = "Coarse";
            makeTable($type);
          ?>
        </div>
        <div class="col-md-3">
          <?php
            $type = "Int";
            makeTable($type);
          ?>
        </div>
        <div class="col-md-3">
          <?php
          $type = "Int2";
          makeTable($type);
          ?>
        </div>
        <div class="col-md-3">
          <?php
            $type = "Fine";
            makeTable($type);
          ?>
        </div>
      </div>
    </div>
<!-- End Gradation Tables -->

<div class="container bottom-margin">
  <div class="ct-chart ct-golden-section" id="chart1"></div>
</div>
<!-- Graph Creation Script -->
<script>
  // Initialize a Line chart in the container with the ID chart1

  new Chartist.Line('#chart1', {
    labels: ['#200', '#100', '#50', '#30', '#16', '#8', '#4', '3/8"', '1/2"', '3/4"', '1.0"', '1.5"', '2.0"' ],
    series: [
              // Fine Aggregate
              [document.getElementById('Fine13').innerHTML,
              document.getElementById('Fine12').innerHTML,
               document.getElementById('Fine11').innerHTML,
               document.getElementById('Fine10').innerHTML,
               document.getElementById('Fine9').innerHTML,
               document.getElementById('Fine8').innerHTML,
               document.getElementById('Fine7').innerHTML,
               document.getElementById('Fine6').innerHTML,
               document.getElementById('Fine5').innerHTML,
               document.getElementById('Fine4').innerHTML,
               document.getElementById('Fine3').innerHTML,
               document.getElementById('Fine2').innerHTML,
               document.getElementById('Fine1').innerHTML,
            ],
            //Coarse Aggregate
              [ document.getElementById('Coarse13').innerHTML,
               document.getElementById('Coarse12').innerHTML,
               document.getElementById('Coarse11').innerHTML,
               document.getElementById('Coarse10').innerHTML,
               document.getElementById('Coarse9').innerHTML,
               document.getElementById('Coarse8').innerHTML,
               document.getElementById('Coarse7').innerHTML,
               document.getElementById('Coarse6').innerHTML,
               document.getElementById('Coarse5').innerHTML,
               document.getElementById('Coarse4').innerHTML,
               document.getElementById('Coarse3').innerHTML,
               document.getElementById('Coarse2').innerHTML,
               document.getElementById('Coarse1').innerHTML
            ],
            //Intermediate Aggregate
              [ document.getElementById('Int13').innerHTML,
               document.getElementById('Int12').innerHTML,
               document.getElementById('Int11').innerHTML,
               document.getElementById('Int10').innerHTML,
               document.getElementById('Int9').innerHTML,
               document.getElementById('Int8').innerHTML,
               document.getElementById('Int7').innerHTML,
               document.getElementById('Int6').innerHTML,
               document.getElementById('Int5').innerHTML,
               document.getElementById('Int4').innerHTML,
               document.getElementById('Int3').innerHTML,
               document.getElementById('Int2').innerHTML,
               document.getElementById('Int1').innerHTML
            ]
         ]
  });
</script>


    <!-- Footer Fixed -->
    <footer class="footer navbar-fixed-bottom myFooter">
        <p class="text-muted">
          -- © 2017 Tyson Funk --
        </p>
    <!-- End Footer Fixed -->

  <!-- Load JS at end of page -->
  <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
