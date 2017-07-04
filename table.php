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
      <script src="js/chartist-plugin-axistitle.js"></script>

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
        <button class="btn btn-danger navbar-btn" onclick="goBack()">Back</button>
        <a class="navbar-brand" href="index.html">QC Database</a>
      </div>
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

<div class="container bottom-margin z-depth-2">
  <div class="ct-chart ct-golden-section" id="chart1"></div>
</div>
<!-- Graph Creation Script -->
<script>

// Create array in preparation for chartist. Aggregate type as string
// array name to be appended, and size of array
function createAggArray(aggregate,array,size){
    var search = '';
    for (i = 0; i < size; i++){
      search = aggregate + (i + 1).toString();
      array[i] = document.getElementById(search).innerHTML;
    };
  };
  // Fine agg array
  var fineArray = []
  createAggArray('Fine',fineArray,13);

  // Coarse agg array
  var coarseArray = [];
  createAggArray("Coarse",coarseArray,13);

  // Intermediate Aggregate One, test for existence of tag default value of " -- " to
  // determine if the line should be created
  var intArray = [];
  intTest = document.getElementById('Int13').innerHTML;

  if (intTest !== null ) {
    createAggArray("Int",intArray,13);
  };

  var intArray2 = [];
  intTest2 = document.getElementById('Int213').innerHTML;

  if (intTest2 !== null ) {
    createAggArray("Int2",intArray2,13);
  };

  // Initialize a Line chart in the container with the ID chart1
  new Chartist.Line('#chart1', {
    labels: ['2.0"','1.5"','1.0"','3/4"', '1/2"','3/8"','#4', '#8','#16','#30','#50','#100','#200'],
    series: [
                // Fine Aggregate
              fineArray,
                //Coarse Aggregate
              coarseArray,
                //Intermediate Aggregate
              intArray,
                // Intermediate Aggregate 2
              intArray2
         ]
  }, {
    chartPadding: {
      top: 20,
      right: 0,
      bottom: 30,
      left: 0
    },
    axisY: {
      onlyInteger: true
    },
    plugins: [
      Chartist.plugins.ctAxisTitle({
        axisX: {
          axisTitle: 'Sieve Size',
          axisClass: 'ct-axis-title',
          offset: {
            x: 0,
            y: 50
          },
          textAnchor: 'middle'
        },
        axisY: {
          axisTitle: '% Retained',
          axisClass: 'ct-axis-title',
          offset: {
            x: 0,
            y: 0
          },
          textAnchor: 'middle',
          flipTitle: false
        }
      })
    ]
  });
</script>


    <!-- Footer Fixed -->
    <footer class="footer navbar-fixed-bottom myFooter">
        <p class="text-muted">
          -- © 2017 Tyson Funk --
          <script>
            createAggArray('Fine',fineArray,13);
          </script>
        </p>
    <!-- End Footer Fixed -->

  <!-- Load JS at end of page -->
  <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    function goBack() {
        window.history.back();
    };
    </script>
  </body>
</html>
