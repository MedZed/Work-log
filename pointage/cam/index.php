<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>How to Use Webcam In PHP</title>
    <link href="lib/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="lib/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container jumbotron">
        <h2 id="space_tit" class="col-md-12"><br></h2>
        <div class="col-md-12">
            <div class="text-center">
        <div id="camera_info"></div>
    <div id="camera"></div><br>
    <button id="take_snapshots" style="display:none;" class="btn btn-success btn-sm">Capture d'image</button><br><br>
      </div>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th><th>Nom d'image</th>
                </tr>
            </thead>
            <tbody id="imagelist">
            
            </tbody>
        </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
<style>
#camera {
  width: 100%;
  height: 350px;
}

</style>
<script type="text/javascript" src="lib/js/jquery.js"></script>
<script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script>
    var options = {
      shutter_ogg_url: "jpeg_camera/shutter.ogg",
      shutter_mp3_url: "jpeg_camera/shutter.mp3",
      swf_url: "jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);
  
  $('#take_snapshots').click(function(){
    var snapshot = camera.capture();
    snapshot.show();
    snapshot.upload({api_url: "action.php"}).done(function(response) {
$('#imagelist').prepend("<tr><td><img src='"+response+"' width='160px' height='100px'></td><td>"+response+"</td></tr>");
}).fail(function(response) {
  alert("Upload failed with status " + response);
});

})




$(document).ready(function() {
      setTimeout(function() {



        $('#space_tit').html('CLICKER SUR ESPACE <img src="../assets/images/spacebar.jpg" width="250px" height="45px">');
        $('body').keyup(function(e){
          if(e.keyCode == 32){
          // user has pressed space
          $('#take_snapshots').click()
          setTimeout(function(){
            window.location.href = "http://localhost/pointage/logger/generate/";
        }, 1000);
        }
      });
    }, 2000);
});



function done(){
    $('#snapshots').html("uploaded");
}
</script>