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
            <div id="mapa" class="center-screen"></div>
        </div>
           <!--SCRIPT-->
	    <script type="text/javascript">
            $(document).ready( function(){
                //mapa
                $('#mapa').load('mapspage.html');
                refresh();
            });
            function refresh()
            {
                setTimeout( function(){
                    //mapa
                    $('#mapa').fadeOut('slow').load('mapspage.html').fadeIn('slow');
                    refresh();
                }, 600000);
            }
	    </script>
    </body>
</html>