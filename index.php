<?php
    include 'dbconnection.php';

    $sql = "SELECT * FROM  Local ORDER BY id DESC LIMIT 1";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0)
    {
        //Output data of each row
        while($row = $result->fetch_assoc())
        {
           $ID = $row["ID"];
           $LOCAL = $row["Local"];
           $X = $row["Coordenada X"];
           $Y = $row["Coordenada Y"];
        }
    }
    else
    {
        echo "0 results";
    }

?>
<html>
    <head>
        <title>GPS</title>
        <link rel="stylesheet" type="text/css" href="styles/mainstyle.css">
        <link rel="shortcut icon" type="image/png" href="images/white_24dp.png"/>
        <script type="text/javascript" src="jquery.js"></script>
        <meta charset="utf-8">
    </head>
    <body>
        <!--CONTAINER-->
        <div class="container">
            
            <!--DIV CENTRALIZADA-->
            <div class="center-screen">
            <h3 class="titulo">LOCALIZADOR WEB</h3>
                <!--MAPA-->
                <div id="mapa"></div>
                <!--TABELA-->
                <div class="local">
                   <table>
                        <tr class="thead">
                            <td>ID</td>
                            <td>LOCAL</td>
                            <td>LATITUDE</td>
                            <td>LONGITUDE</td>
                        </tr>
                        <tr>
                            <td><?php echo $ID;?></td>
                            <td><?php echo $LOCAL;?></td>
                            <td><?php echo $X;?></td>
                            <td><?php echo $Y;?></td>
                        </tr>
                   </table>
                </div>
            </div>
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