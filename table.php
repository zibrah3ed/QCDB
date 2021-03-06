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
      <script src="js/javascript.js"></script>

</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
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
  <div class="container-fluid">
  <!-- Banner at top of page -->
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1 class='lobster-text findme'>
          Quality Database
        </h1>
      </div>
      <ul class="breadcrumb">
        <li>
          <a href="index.html">Home</a><span class="divider"></span>
        </li>
        <li class="active">
          Aggregate Gradation Search
        </li>
      </ul>
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
      <div class="row">
        <div class="col-md-12">
          <div class="result-table z-depth-5">
            <div class="table-responsive">
              <table class='table-test table table-striped'>
              <tr>
                <th class="col"><strong>Date</strong></th>
                <th class="col">Time</th>
                <th class="col">Station</th>
                <th class="col">Offset</th>
                <th class="col">Air %</th>
                <th class="col">Slump</th>
                <th class="col">Air Temp</th>
                <th class="col">Conc Temp</th>
                <th class="col">Unit Weight</th>
                <th class="col">Inspector</th>
            </tr>
            <tr>
              <td></td>
            </tr>
            </div>
          </div>
        </div>
      </div>

<!-- End Gradation Tables -->
<div class="row">
  <div class="col-md-12">
      <!-- Add Line lable to chart using vector graphics -->
      <div class="chart-title">
        <h1 class="chart-title">Individual Aggregates</h1>
        <!-- Start Chart Labels -->
        <div id="labels"> Coarse:
          <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
            <rect x="0" y="0"
            width="14" height="14"
            rx="2" ry="2"
            class="label-series-coarse"
            />
          </svg>
      &nbsp;&nbsp;Fine:
          <svg width="10" height="10" viewBox="0 0 10 10"  xmlns="http://www.w3.org/2000/svg">
            <rect x="0" y="0"
            width="14" height="14"
            rx="2" ry="2"
            class="label-series-fine"
            />
          </svg>
      &nbsp;&nbsp;Intermediate One:
          <svg width="10" height="10" viewBox="0 0 10 10"  xmlns="http://www.w3.org/2000/svg">
            <rect x="0" y="0"
            width="14" height="14"
            rx="2" ry="2"
            class="label-series-int1"
            />
          </svg>
      &nbsp;&nbsp;Intermediate Two:
          <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
            <rect x="0" y="0"
              width="14" height="14"
              rx="2" ry="2"
              class="label-series-int2"
            />
          </svg>
        </div>
      </div>
      <!-- End Labels -->
  <div class="ct-chart ct-golden-section" id="chart1">

  </div>
  </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="chart-title">
        <h1 class="chart-title">JMF</h1>
      </div>
    <div class="ct-chart ct-golden-section" id="chart2">

    </div>
    </div>
  </div>
</div>
<!-- Graph Creation Script -->
<script>
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

  // JMF Variables, from SQL QUERY
  var fineJMF = parseInt(document.getElementById("FineJMF").innerHTML);
  var coarseJMF = parseInt(document.getElementById("CoarseJMF").innerHTML);
  var intJMF = parseInt(document.getElementById("IntJMF").innerHTML);
  var int2JMF = parseInt(document.getElementById("Int2JMF").innerHTML);

  // Arrays to temporarily hold weighted JMF data defaulted to 0
  var fineJMFArray = new Uint8Array(13);
  var coarseJMFArray = new Uint8Array(13);
  var intJMFArray = new Uint8Array(13);
  var int2JMFArray = new Uint8Array(13);
  var addedJMFArray = new Uint8Array(13);

  // Weight array values

  function jmfWeighted(inputArray,jmf,outputArray){
    if (jmf == "--") {
      for (var i=0; i < inputArray.length; i++){
        outputArray[i] = inputArray[i] * jmf / 100;
      };
    };
      return outputArray;
  };

  function addArrays(arr1,arr2,arr3,arr4,outputArray) {
    for(i=0; i < arr1.length; i++ ) {
      outputArray = arr1[i] + arr2[i] + arr3[i] + arr4[i];
      return outputArray;
    };
  };

  addArrays(              jmfWeighted(fineArray,fineJMF,fineJMFArray),
                          jmfWeighted(coarseArray,coarseJMF,coarseJMFArray),
                          jmfWeighted(intArray,intJMF,intJMFArray),
                          jmfWeighted(intArray2,int2JMF,int2JMFArray),
                          addedJMFArray);




  // Initialize a Line chart in the container with the ID chart1
  new Chartist.Line('#chart1', {
    labels: ['2.0"','1.5"','1.0"','3/4"', '1/2"','3/8"','#4', '#8','#16','#30','#50','#100','#200'],
    series: [
              {
                // Fine Aggregate
                name: 'Fine_Aggregate',
                data: fineArray
              },
              {
                //Coarse Aggregate
                name: 'Coarse_Aggregate',
                data: coarseArray
              },
              {
                //Intermediate Aggregate
                name: 'Intermediate_One',
                data: intArray
              },
              {
                // Intermediate Aggregate 2
                name: 'Intermediate_Two',
                data: intArray2
              }
         ]
  }, {
    chartPadding: {
      top: 20,
      right: 0,
      bottom: 50,
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

  // Chart 2
  new Chartist.Line('#chart2', {
    labels: ['2.0"','1.5"','1.0"','3/4"', '1/2"','3/8"','#4', '#8','#16','#30','#50','#100','#200'],
    series: [
              {
                // Intermediate Aggregate 2
                name: 'JMF',
                data: addedJMFArray
              }
         ]
  }, {
    chartPadding: {
      top: 20,
      right: 0,
      bottom: 50,
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

          </script>
        </p>
    <!-- End Footer Fixed -->

  <!-- Load JS at end of page -->
  <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Google Analytics Script -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-103616182-1', 'auto');
        ga('send', 'pageview');
    </script>
  </body>
</html>
