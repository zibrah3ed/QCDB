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
      <h1>Plastic Concrete Tests</h1>
    </div>
  </div>
<!-- End Banner -->
  <div class="sidebar">

  </div>
  <div class="mainContent">

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
</body>
</html>
