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
      <h4>Job Number</h4>
      <div class="result-table z-depth-2">
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

          <table>
        </div>
      </div>
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
    // Job
    // Date
    // Air Content
    // Air Temperature
    // Technician
    include 'config.php';
    include 'opendb.php';

    $sql = "SELECT * FROM plastictests WHERE 'id' IS NOT NULL";
      // The following if statements create the dynamic functionailty of the SQL
      // query above. "IS NOT NULL" will stop the query and the if statements will
      // not be evaluated. If it passes the query will have the following appended
      // Selector for job number
      if ($_POST['job']) {
        $sql .= " AND 'job' = :job";
      }
      if ($_POST['date']) {
        $sql .= " AND 'date' = :date";
      }
      if ($_POST['airContent']) {
        $sql .= " AND 'airContent' = :airContent";
      }
      if ($_POST['airTemperature']) {
        $sql .= " AND 'airTemperature' = :airTemperature";
      }
      if ($_POST['technician']) {
        $sql .= " AND 'technician' = :technician";
      }
      if ($_POST['concTemperature']) {
        $sql .= " AND 'concTemperature' = :concTemperature";
      }

      $stmt = $dbh->prepare($sql);

      if ($_POST['job']){
        $stmt->bindValue(':job', $_POST['job']);
      }
      if ($_POST['date']){
        $stmt->bindValue(':date', $_POST['date']);
      }
      if ($_POST['airContent']){
        $stmt->bindValue(':airContent', $_POST['airContent']);
      }
      if ($_POST['airTemperature']){
        $stmt->bindValue(':airTemperature', $_POST['airTemperature']);
      }
      if ($_POST['technician']){
        $stmt->bindValue(':technician', $_POST['technician']);
      }
      if ($_POST['concTemperature']){
        $stmt->bindValue(':concTemperature', $_POST['concTemperature']);
      }

      $stmt->execute();
