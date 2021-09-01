<?php
    include 'dbconnection.php';


?>
<html>
    <head>
        <title>Localizador WEB Teste</title>
        <link rel="stylesheet" type="text/css" href="styles/mainstyle.css">
        <script type="text/javascript" src="jquery.js"></script>
        <meta charset="utf-8">
    </head>
    <body>
        <!--CONTAINER-->
        <div class="container">
            <div class="center-screen">
                <div id="mapa"></div>
                
            </div>
            <!--<div class="local">
                    <?php
                        $sql = "SELECT * FROM  Local ORDER BY id";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0)
                        {
                            //Output data of each row
                            while($row = $result->fetch_assoc())
                            {
                                echo "ID ". $row["ID"] . "<br>" . "Local " . $row["Local"] . "<br>" . "Coordenada X " . $row["Coordenada X"] . "<br>" . "Coordenada Y " . $row["Coordenada Y"] . "<br>";
                            }
                        }
                        else
                        {
                            echo "0 results";
                        }
                    ?>
                </div>-->
        </div>
           <!--SCRIPT-->
	    <script type="text/javascript">
            $(document).ready( function(){
                //mapa
                $('#mapa').load('mapspage.php');
                refresh();
            });
            function refresh()
            {
                setTimeout( function(){
                    //mapa
                    $('#mapa').fadeOut('slow').load('mapspage.php').fadeIn('slow');
                    refresh();
                }, 600000);
            }
	    </script>
    </body>
</html>