<link href="assets/lib/font-awesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
<div class="col-lg-12">
    <a  href="everyone.php?tag=view_today_log">
    <div   class="col-lg-12 col-sm-12 col-xs-12 main-widget">
        <div id="working" class="main-box infographic-box">

            </div>
    </div>
    </a>
</div>

<script src="assets/lib/js/jquery-2.1.3.min.js"></script>

    <script>


    (function(){
    // do some stuff
    $.getJSON("http://localhost/pointage/api/public/api/working", function(result){

        var working_div = "";
        if(result.length<1){
            working_div = "<i class='fa fa-suitcase red-bg'></i><span class='headline'>Actuellement au travail</span><span id='working' class='value'>0</span>"
        }else{
            working_div = "<i class='fa fa-suitcase animated pulse green-bg'></i><span class='headline'>Actuellement au travail</span><span id='working' class='value'>"+result.length+"</span>"
        }
        $("#working").html(working_div);

    });
    setTimeout(arguments.callee, 1000);
})();



    </script>

