<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Plastic Tests</title>

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

  <div class="container-fluid ">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h1 class='lobster-text findme'>
					Plastic Test Search
				</h1>
			</div>
			<ul class="breadcrumb">
				<li>
					<a href="index.html">Home</a><span class="divider"></span>
				</li>
        <li>
					<a href="dashboard.php">Plastic Dashboard</a><span class="divider"></span>
				</li>
				<li class="active">
					Plastic Test Drilldown
				</li>
			</ul>
		</div>
	</div>
  <div class="row">
    <div class="col-md-12">
      <?php
        include 'config.php';
        include 'opendb.php';
        $jobNum = $_GET["jobNum"];
        $listLimit = 10;

# Select the last 10 results of the matching project.
        $sql =  "SELECT * , Jobs.KossProjNum
                FROM plasticTests
                INNER JOIN Jobs ON Jobs_job_id = Jobs.job_id
                WHERE Jobs.kossProjNum = '$jobNum'
                ORDER BY plasticTests.date DESC LIMIT $listLimit";

        $result = $conn->query($sql);

        if ($result->num_rows > 0){
          echo "<div class='result-table z-depth-2'>
                  <div class='table-responsive'>
                    <table class='table-test table table-striped'>
                      <tr>
                        <th colspan='10' style='text-align: center'>Koss Project: ".$jobNum."</th>
                      </tr>
                      <tr>
                        <th class='col'><strong>Date</strong></th>
                        <th class='col'>Time</th>
                        <th class='col'>Station</th>
                        <th class='col'>Offset</th>
                        <th class='col'>Air %</th>
                        <th class='col'>Slump</th>
                        <th class='col'>Air Temp</th>
                        <th class='col'>Conc Temp</th>
                        <th class='col'>Unit Weight</th>
                        <th class='col'>Inspector</th>
                      </tr>";
          while($rowitem = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<td>" . htmlspecialchars($rowitem['date']) . "</td>";
              echo "<td>" . htmlspecialchars($rowitem['time']) . "</td>";
              echo "<td>" . htmlspecialchars($rowitem['station']) . "</td>";
              echo "<td>" . htmlspecialchars($rowitem['offset']) . "</td>";
              echo "<td>" . htmlspecialchars($rowitem['air']) . "</td>";
              echo "<td>" . htmlspecialchars($rowitem['slump']) . "</td>";
              echo "<td>" . htmlspecialchars($rowitem['amb_temp']) . "</td>";
              echo "<td>" . htmlspecialchars($rowitem['conc_temp']) . "</td>";
              echo "<td>" . htmlspecialchars($rowitem['unit_weight']) . "</td>";
              echo "<td>" . htmlspecialchars($rowitem['inspector']) . "</td>";
              echo "</tr>";
          }
          echo "</table></div></div>";
        } else {
          echo "<p>0 Results</p>";
        }
        $conn->close();
      ?>
    </div>
  </div>
</div>
  <!-- Footer Fixed -->
  <footer class="footer navbar-fixed-bottom myFooter">
      <p class="text-muted">
        -- © 2017 Tyson Funk --
      </p>
  </footer>
  <!-- End Footer Fixed -->

  <!-- Load JS at end of page -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    function goBack() {
        window.history.back();
    };
    </script>
    <!-- Google Analytics Script -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-103616182-1', 'auto');
        ga('send', 'pageview');
    </script>

    <?php

?>
</body>
</html>
