<?PHP
  include 'config.php';
  include 'opendb.php';
      // Get variable from form submit
      function makeTableLong($job,$lot) {

      // Get job number from url on form submit
      $jobNum = $_GET["jobNum"];
      
      $sql = "SELECT Jobs_job_id, aggPercent, Aggregate_agg_id, sieve2inch, sieve15inch, sieve1inch,
                sieve34inch, sieveNo4, sieve12inch, sieve38inch, sieveNo8, sieveNo16, sieveNo30,
                sieveNo50,sieveNo100,sieveNo200, Jobs.KossProjNum, aggregate.aggLocalName,
                aggregate.aggProducer
                FROM Jobs
                INNER JOIN gradations ON Jobs.job_id = gradations.Jobs_job_id
                INNER JOIN aggregate ON gradations.aggregate_agg_id = aggregate.agg_id
                where Jobs.kossProjNum = '$job'";

      $result = $conn->query($sql);

      echo "<div class='result-table container'>";
      echo "<div class='table-responsive'>";
      echo "<table class='table-test table'>"; //begin table tag...
      if ($result->num_rows > 0) {
        echo "<tr>
                <th>Job</th>
                <th>Agg Name</th>
                <th>Producer</th>
                <th>Agg Percent</th>
                <th>2.0</th>
                <th>1.5</th>
                <th>1.0</th>
                <th>3/4</th>
                <th>1/2</th>
                <th>3/8</th>
                <th>No.4</th>
                <th>No.8</th>
                <th>No.16</th>
                <th>No.30</th>
                <th>No.50</th>
                <th>No.100</th>
                <th>No.200</th>
              </tr>";
      //you can add thead tag here if you want your table to have column headers
        while($rowitem = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($rowitem['KossProjNum']) . "</td>";
          echo "<td>" . htmlspecialchars($rowitem['aggLocalName']) . "</td>";
          echo "<td>" . htmlspecialchars($rowitem['aggProducer']) . "</td>";
          echo "<td>" . $rowitem['aggPercent'] . "</td>";
          echo "<td>" . $rowitem['sieve2inch'] . "</td>";
          echo "<td>" . $rowitem['sieve15inch'] . "</td>";
          echo "<td>" . $rowitem['sieve1inch'] . "</td>";
          echo "<td>" . $rowitem['sieve34inch'] . "</td>";
          echo "<td>" . $rowitem['sieve12inch'] . "</td>";
          echo "<td>" . $rowitem['sieve38inch'] . "</td>";
          echo "<td>" . $rowitem['sieveNo4'] . "</td>";
          echo "<td>" . $rowitem['sieveNo8'] . "</td>";
          echo "<td>" . $rowitem['sieveNo16'] . "</td>";
          echo "<td>" . $rowitem['sieveNo30'] . "</td>";
          echo "<td>" . $rowitem['sieveNo50'] . "</td>";
          echo "<td>" . $rowitem['sieveNo100'] . "</td>";
          echo "<td>" . $rowitem['sieveNo200'] . "</td>";
          echo "</tr>";
        }
          } else {
        echo "0 results";
      }
      echo "</table>";
      echo "</div></div>"; //end table tag
      $conn->close();
}
      // Close Connection later in page

?>
