<?php
function makeTable($agg_Type){
  include 'config.php';
  include 'opendb.php';

  // Array of column names of sql database
  $sieveRowArray = array("sieve2inch", "sieve15inch", "sieve1inch",
            "sieve34inch", "sieveNo4", "sieve12inch", "sieve38inch", "sieveNo8", "sieveNo16", "sieveNo30",
            "sieveNo50","sieveNo100","sieveNo200");
  // Array if sieve labels
  $sieveDescArray = array('2.0"','1.5"','1.0"','3/4"','1/2"','3/8"','#4','#8','#16','#30','#50','#100','#200');
  // Get job number from url on form submit
  $jobNum = $_GET["jobNum"];

  // SQL select statement using a join between jobs, aggregates, and gradations
  $sql = "SELECT Jobs_job_id, aggPercent, Aggregate_agg_id, sieve2inch, sieve15inch, sieve1inch,
            sieve34inch, sieveNo4, sieve12inch, sieve38inch, sieveNo8, sieveNo16, sieveNo30,
            sieveNo50,sieveNo100,sieveNo200, Jobs.KossProjNum, aggregate.aggLocalName,
            aggregate.aggProducer,aggregate.aggType
            FROM Jobs
            INNER JOIN gradations ON Jobs.job_id = gradations.Jobs_job_id
            INNER JOIN aggregate ON gradations.aggregate_agg_id = aggregate.agg_id
            where Jobs.kossProjNum = '$jobNum' AND aggregate.aggType = '$agg_Type'";

  // Establish connection
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Title bar at top of table
      $rowitem = mysqli_fetch_array($result);
      echo "<div class='table-top z-depth-1'";
      echo "<p>Koss # : " . htmlspecialchars($rowitem['KossProjNum']) . "</p>";
      echo "<p>Agg Name : " . htmlspecialchars($rowitem['aggLocalName']) . "</p>";
      echo "<p>Producer : " . htmlspecialchars($rowitem['aggProducer']) . "</p>";
      echo "<p>Agg Type : " . htmlspecialchars($rowitem['aggType']) . "</p>";
      echo "<p>JMF% : " . $rowitem['aggPercent'] . "</p>";
      echo "</div>";
    // End Titlebar
    // Table Container
      echo "<div class='result-table z-depth-2'>";
      echo "<div class='table-responsive'>";
      echo "<table class='table-test table table-striped'>"; //begin table tag...
      echo "<tr>
              <th class='col-xs-3'>Sieve</th>
              <th class='col-xs-3'>% Retained</th>
            </tr>";
      $result = $conn->query($sql);
    while($rowitem = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>2.0</td>";
      echo "<td id=".$agg_Type."1>" . $rowitem['sieve2inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>1.5</td>";
      echo "<td id=".$agg_Type."2>" . $rowitem['sieve15inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>1.0</td>";
      echo "<td id=".$agg_Type."3>" . $rowitem['sieve1inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>3/4</td>";
      echo "<td id=".$agg_Type."4>" . $rowitem['sieve34inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>1/2</td>";
      echo "<td id=".$agg_Type."5>" . $rowitem['sieve12inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>3/8</td>";
      echo "<td id=".$agg_Type."6>" . $rowitem['sieve38inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.4</td>";
      echo "<td id=".$agg_Type."7>" . $rowitem['sieveNo4'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.8</td>";
      echo "<td id=".$agg_Type."8>" . $rowitem['sieveNo8'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.16</td>";
      echo "<td id=".$agg_Type."9>" . $rowitem['sieveNo16'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.30</td>";
      echo "<td id=".$agg_Type."10>" . $rowitem['sieveNo30'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.50</td>";
      echo "<td id=".$agg_Type."11>" . $rowitem['sieveNo50'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.100</td>";
      echo "<td id=".$agg_Type."12>". $rowitem['sieveNo100'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.200</td>";
      echo "<td id=".$agg_Type."13>" . $rowitem['sieveNo200'] . "</td>";
      echo "</tr>";
    }
      } else {
        echo "<div class='table-top z-depth-1'";
        echo "<p>Koss # : -- </p>";
        echo "<p>Agg Name : -- </p>";
        echo "<p>Producer : -- </p>";
        echo "<p>Agg Type : -- </p>";
        echo "<p>JMF% : -- </p>";
        echo "</div>";
      // End Titlebar
      // Table Container
        echo "<div class='result-table z-depth-2'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table-test table table-striped'>"; //begin table tag...
        echo "<tr>
                <th class='col-xs-3'>Sieve</th>
                <th class='col-xs-3'>% Retained</th>
              </tr>";
              echo "<tr>";
              echo "<td>2.0</td>";
              echo "<td id=".$agg_Type."1>" . "--</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>1.5</td>";
              echo "<td id=".$agg_Type."2>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>1.0</td>";
              echo "<td id=".$agg_Type."3>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>3/4</td>";
              echo "<td id=".$agg_Type."4>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>1/2</td>";
              echo "<td id=".$agg_Type."5>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>3/8</td>";
              echo "<td id=".$agg_Type."6>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.4</td>";
              echo "<td id=".$agg_Type."7>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.8</td>";
              echo "<td id=".$agg_Type."8>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.16</td>";
              echo "<td id=".$agg_Type."9>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.30</td>";
              echo "<td id=".$agg_Type."10>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.50</td>";
              echo "<td id=".$agg_Type."11>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.100</td>";
              echo "<td id=".$agg_Type."12>" . " -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.200</td>";
              echo "<td id=".$agg_Type."13>" . " -- </td>";
              echo "</tr>";

  }
  echo "</table>";
  echo "</div></div>";

}
$conn->close();
?>
