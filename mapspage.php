<?php
    session_start();
    include 'dbconnection.php';
    $sql = "SELECT * FROM Local ORDER BY id DESC LIMIT 1";
    $result = filterTable($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $x      = $row["Coordenada X"];
            $y      = $row["Coordenada Y"];
        }
    }
    function filterTable($sql)
    {
      $connect = mysqli_connect("localhost", "root", "usbw", "location");
      $filter_Result = mysqli_query($connect, $sql);
      return $filter_Result;
    }
    //echo $x . "<br>";
    //echo $y;
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>
    <link rel="stylesheet" type="text/css" href="styles/mainstyle.css">
    <link rel="stylesheet" type="text/css" href="./style.css" />
	<meta charset="utf-8">
    <script src="./index.js"></script>
    <script>
        // Initialize and add the map
        function initMap() {
          // The location of Fastwave
          //var location = { lat: -23.608914830711026, lng: -46.66516906749283 };
          var location = { lat: parseFloat("<?php echo $x?>"), lng: parseFloat("<?php echo $y ?>") };
          // The map, centered at Fastwave
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 18,
            center: location,
          });
          // The marker, positioned at Fastwave
          const marker = new google.maps.Marker({
            position: location,
            map: map,
          });
        }
      </script>
  </head>
  <body>
        <div class="center-screen">
            <!--The div element for the map -->
            <div id="map"></div>
            <!--<div id="teste">
              <table>
                <tr>
                  <td>ID</td>
                  <td>Local</td>
                  <td>Coordenada X</td>
                  <td>Coordenada Y</td>
                </tr>
                <?php while($row = mysqli_fetch_array($result)): ?>
                <tr>
                  <td><?php echo $row["ID"]; ?></td>
                  <td><?php echo $row["Local"]; ?></td>
                  <td><?php echo $row["Coordenada X"]; ?></td>
                  <td><?php echo $row["Coordenada Y"]; ?></td>
                </tr>
                <?php endwhile; ?>
              </table>
            </div>-->
        </div> 

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRvFx9cCcPlvGhQGFuCUDfWoe3JZa56Ew&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>