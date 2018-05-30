<!doctype html>
<html lang="en">
<link href="../../assets/lib/font-awesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
<?php 

 date_default_timezone_set('Africa/Tunis');
$today = date('Y-m-d');
$today_format = date('d M Y');


?>
<head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="lib/css/bootstrap.css">
    <link rel="stylesheet" href="lib/css/style.css">
</head>

<body id="">

<div  class="container">
        <div id="gradient" class="card text-center">
                <div class="card-header">
                      <div id="qrcode"></div>
                </div>
                <div class="card-body">
                      <div>
                        <p id="date"><?php echo $today_format ?>
                        <footer>Cliquer <a class="" href="#"  onclick="myFunction()">ici</a> Pour imprimer <i class="fa fa-print" aria-hidden="true"></i></footer>
                        </p></div>
                </div>
              </div>
</div>        



       


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="lib/js/jquery.js"></script>
    <script src="lib/js/popper.js"></script>
    <script src="lib/js/bootstrap.js"></script>
    <script src="lib/js/jquery_qrcode.js"></script>

    <script>


        $(document).ready(function () {
            $('#qrcode').qrcode({width: 400,height: 400,text: "<?php echo md5($today); ?>"});
            //$('#datetime').text(getdt());



        });


function myFunction() {
    window.print();
}




var colors = new Array(
  [170,35,255],
  [60,255,60],
  [255,35,98],
  [45,150,190],
  [255,0,255],
  [255,128,0]);

var step = 0;
//color table indices for: 
// current color left
// next color left
// current color right
// next color right
var colorIndices = [0,1,2,3];

//transition speed
var gradientSpeed = 0.002;

function updateGradient()
{
  
  if ( $===undefined ) return;
  
var c0_0 = colors[colorIndices[0]];
var c0_1 = colors[colorIndices[1]];
var c1_0 = colors[colorIndices[2]];
var c1_1 = colors[colorIndices[3]];

var istep = 1 - step;
var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
var color1 = "rgb("+r1+","+g1+","+b1+")";

var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
var color2 = "rgb("+r2+","+g2+","+b2+")";

 $('#gradient').css({
   background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
  
  step += gradientSpeed;
  if ( step >= 1 )
  {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
    
    //pick two new target color indices
    //do not pick the same as the current one
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    
  }
}

setInterval(updateGradient,1);

    </script>






        <!-- <h1 id="working" class="main-box infographic-box">

            </h1> -->

<script src="../../assets/lib/js/jquery-2.1.3.min.js"></script>
<script src="lib/js/jquery_qrcode.js"></script>

    <script>

 var old_count;
    (function(){
    // do some stuff
    $.getJSON("http://localhost/pointage/api/public/api/working", function(result){
        var working_div = "";
        if(result.length<1){
            working_div = "0"
        }else{
            working_div = result.length;
        }
        if(result.length>old_count){
            window.location = "http://localhost/pointage/cam";
        }
        
        old_count = result.length;
        // $("#working").html(working_div);
        document.title = working_div+" au travail";

    });
    setTimeout(arguments.callee, 1000);
})();



    </script>

</body>

</html>

