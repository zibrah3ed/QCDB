<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>QC DB Front End</title>
  <link rel="stylesheet" href="styles.css">

  <!-- Bootstrap -->
  <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
      </script>

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
        <a class="navbar-brand" href="#">QC Database</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <form class="navbar-form navbar-right">
          <div class="form-group">
            <input type="text" placeholder="Email" class="form-control" autocomplete="off">
          </div>
          <div class="form-group">
            <input type="password" placeholder="Password" class="form-control" autocomplete="off">
          </div>
          <button type="submit" class="btn btn-success">Sign in</button>
        </form>
      </div><!--/.navbar-collapse -->
    </div>
  </nav>
  <!-- Banner at top of page -->
  <div class="jumbotron">
    <div class="container">
      <h1>Aggregate Gradation Search</h1>
    </div>
  </div>
<!-- End Banner -->


  <!-- PHP Scripts -->
  <?php
      $servername = "localh.dev";
      $username = "root";
      $password = "pittsburg";
      $dbName = "QCDB";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbName);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected successfully";


        $sql = "SELECT * FROM 'gradations'";

        $result = $conn->query($sql);



        echo "<div class='result-table container'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table-test table'>"; //begin table tag...

        // if ($result->num_rows > 0) {
        // //you can add thead tag here if you want your table to have column headers
        //   while($rowitem = mysqli_fetch_array($result)) {
        //     echo "<tr>";
        //     echo "<td>" . $rowitem['sieve34inch'] . "</td>";
        //     echo "<td>" . $rowitem['sieve12inch'] . "</td>";
        //     echo "<td>" . $rowitem['sieve38inch'] . "</td>";
        //     echo "<td>" . $rowitem['sieveNo4'] . "</td>";
        //     echo "</tr>";
        //   }
        //     } else {
        //   echo "0 results";
        // }
        // echo "</table>";
        // echo "</div></div>"; //end table tag

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "3/4: " . $row["sieve34inch"]. " - 1/2: " . $row["sieve12inch"]. " - No. 4: " . $row["sieveNo4"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
  <!-- End PHP -->
  </body>
</html>
