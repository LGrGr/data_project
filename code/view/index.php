<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link type="stylesheet" href="style.css">
</head>
<body>
   <?php
   
   /* Auto-chargement des classes lors du chargement du site*/ 
   require 'class/autoloader.php'; 
   Autoloader :: register();
   
      
   ?>
    <!--<div id="map">
      <script>
          var map; 
          function initMap(){
    //Constructor creates a new map -only center and zoom are required.
              map = new google.maps.Map(document.getElementById('map'),{
        center : {lat :47.393906, lng : -0.675324 },
        zoom : 13; 
        
    });
}
        </script>  
    </div>-->
    
    <!--<script async defer src="https://maps.googleapis.com/maps/api/js?keyAIzaSyDJsgq7sWbHPwVkubO1h6ktG8PACnPpcv8&v=3&callback=initMap">
    </script>-->
    
</body>
</html>