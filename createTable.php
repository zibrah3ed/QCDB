<?php
function makeTable($agg_Type){
  include 'config.php';
  include 'opendb.php';

  $jobNum = $_GET["jobNum"];
  $sql = "SELECT Jobs_job_id, aggPercent, Aggregate_agg_id, sieve2inch, sieve15inch, sieve1inch,
            sieve34inch, sieveNo4, sieve12inch, sieve38inch, sieveNo8, sieveNo16, sieveNo30,
            sieveNo50,sieveNo100,sieveNo200, Jobs.KossProjNum, aggregate.aggLocalName,
            aggregate.aggProducer,aggregate.aggType
            FROM Jobs
            INNER JOIN gradations ON Jobs.job_id = gradations.Jobs_job_id
            INNER JOIN aggregate ON gradations.aggregate_agg_id = aggregate.agg_id
            where Jobs.kossProjNum = '$jobNum' AND aggregate.aggType = '$agg_Type'";
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
      echo "<table class='table-test table'>"; //begin table tag...
      echo "<tr>
              <th class='col-xs-3'>Sieve</th>
              <th class='col-xs-3'>% Retained</th>
            </tr>";
      $result = $conn->query($sql);
    while($rowitem = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>2.0</td>";
      echo "<td>" . $rowitem['sieve2inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>1.5</td>";
      echo "<td>" . $rowitem['sieve15inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>1.0</td>";
      echo "<td>" . $rowitem['sieve1inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>3/4</td>";
      echo "<td>" . $rowitem['sieve34inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>1/2</td>";
      echo "<td>" . $rowitem['sieve12inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>3/8</td>";
      echo "<td>" . $rowitem['sieve38inch'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.4</td>";
      echo "<td>" . $rowitem['sieveNo4'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.8</td>";
      echo "<td>" . $rowitem['sieveNo8'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.16</td>";
      echo "<td>" . $rowitem['sieveNo16'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.30</td>";
      echo "<td>" . $rowitem['sieveNo30'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.50</td>";
      echo "<td>" . $rowitem['sieveNo50'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.100</td>";
      echo "<td>" . $rowitem['sieveNo100'] . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>No.200</td>";
      echo "<td>" . $rowitem['sieveNo200'] . "</td>";
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
        echo "<table class='table-test table'>"; //begin table tag...
        echo "<tr>
                <th class='col-xs-3'>Sieve</th>
                <th class='col-xs-3'>% Retained</th>
              </tr>";
              echo "<tr>";
              echo "<td>2.0</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>1.5</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>1.0</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>3/4</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>1/2</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>3/8</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.4</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.8</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.16</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.30</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.50</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.100</td>";
              echo "<td> -- </td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>No.200</td>";
              echo "<td> -- </td>";
              echo "</tr>";

  }
  echo "</table>";
  echo "</div></div>";

}
$conn->close();
?>
