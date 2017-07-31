<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>IP</title>
  </head>
  <body>
    <div class="mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.8223413000383!2d-76.5420516858258!3d3.39350739752985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a15a8cf5000d%3A0x19d293e4cb7722ff!2sCra.+70+%2311a-2%2C+Cali%2C+Valle+del+Cauca!5e0!3m2!1ses-419!2sco!4v1493214595632" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div id="pais">

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    $.getJSON('http://api.wipmania.com/jsonp?callback=?', function (data) {
      $("#pais").append(data.address.country+"<br>");
      $("#pais").append("Latitud: "+data.latitude+"<br>");
      $("#pais").append("Longitud: "+data.longitude+"<br>");
      console.log(data);
    });
    </script>
  </body>
</html>




<?php




// print getRealIP();
// Obtener direccío ip del usuario
function getRealIP()
{

    if (isset($_SERVER["HTTP_CLIENT_IP"]))
    {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
    {
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"]))
    {
        return $_SERVER["HTTP_FORWARDED"];
    }
    else
    {
        return $_SERVER["REMOTE_ADDR"];
    }

}



?>
