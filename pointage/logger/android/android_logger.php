<link rel="stylesheet" href="animate.css">
<link rel="stylesheet" href="style.css">

<?php
  require_once ("../../conection/connect.php");
  check_connection();
  date_default_timezone_set('Africa/Tunis');

  //function to convert any time to minutes
  function minutes($time){
    $time = explode(':', $time);
    return ($time[0]*60) + ($time[1]) + ($time[2]/60);
  }

  //http://localhost/pointage/logger/android_logger.php?code=037d83572f8062c02a63b4bf56d72271&tid=3



  $msg="";
  $date_today = date('Y-m-d');
  if(isset($_GET['code'], $_GET['tid'])){
     $tid = $_GET['tid']; 
     if(md5($date_today)==$_GET['code']){
      //echo "correct url <br>";
      $date = date("Y-m-d G:i:s");
      $sql_sel=mysqli_query($con, "SELECT * FROM teacher_tbl WHERE teacher_id = '$tid'");
      $count = mysqli_num_rows($sql_sel);
      if($count>0){
    //$msg="This teacher id is valid!";
         $sql_sel=mysqli_query($con, "SELECT * FROM log_tbl WHERE teacher_id = '$tid' AND date = '$date_today'");
         $count = mysqli_num_rows($sql_sel);
         if($count>0){
          $msg="He was already working today";
          $row=mysqli_fetch_array($sql_sel,MYSQLI_ASSOC);
          $time_in = new DateTime($row["time_in"]);
          $time_now = new DateTime();
          $minutes = ($time_now->diff($time_in))->format('%H:%i:%s');
          $minutes = minutes($minutes);
          if($row["status"]=="in"){
            $minutes_from_db = $row["minutes"];
            $minutes = $minutes + $minutes_from_db;
            //if he was already inside = update him to be outside
            $sql_update=mysqli_query($con, "UPDATE log_tbl SET 
            status='out' ,
            time_out='$date',
            minutes=$minutes
            WHERE
            teacher_id=$tid AND date = '$date_today'");
            if($sql_update==true) {
              $msg="SORTIE";
            //header('Location: ../logger/leave.php');
            }
            else {
            //header('Location: ../logger/error.php');
            }
          }
          else{
              //if he was inside and then outside = update him to be inside
              $sql_update=mysqli_query($con, "UPDATE log_tbl SET 
              status='in' ,
              time_in='$date' 
              WHERE
              teacher_id=$tid AND date = '$date_today'");
            if($sql_update==true) {
               $msg="RETOUR";
              //header('Location: ../logger/enter.php');
            }
            else {
              //header('Location: ../logger/error.php');
            }
          }
        }
        else{
          //if he was never inside = let him be inside
          $sql_ins=mysqli_query($con, "INSERT INTO log_tbl VALUES( NULL,'$tid','in' ,'$date','$date', 0, '$date_today')");
          if($sql_ins==true) {
            $msg="ENTRER";
            //header('Location: ../logger/enter.php');
          }else{
            $msg =  mysqli_error($con);
            //header('Location: ../logger/error.php');
          }
      }
        }
        else{
          $msg="ID INVALID";
          // $jq='color("#e74c3c");';
          //header('Location: ../logger/error_dontexist.php');
          // echo mysqli_error($con);
      } 
    }else{
      $msg="CODE INVALID";
    }
  }
  //echo $msg;
$time_   = date('H:i:s'); 
switch ($msg) {
    case "CODE INVALID":
        echo "<body style='background-color:#e74c3c;'><h1 class='animated flash'>".$msg."</h1></body>";
        break;
    case "ENTRER":
        echo "<body style='background-color:#2ecc71;'><h1 class='animated flash'>".$msg." - ".$time_."</h1></body>";
        break;
    case "RETOUR":
        echo "<body style='background-color:#2ecc71;'><h1 class='animated flash'>".$msg." - ".$time_."</h1></body>";
        break;
    case "ID INVALID":
        echo "<body style='background-color:#e74c3c;'><h1 class='animated flash'>".$msg."</h1></body>";
        break;
    case "SORTIE":
        echo "<body style='background-color:#e67e22;'><h1 class='animated flash'>".$msg." - ".$time_."</h1></body>";
        break;
    // default:
    //     echo "";
   
  // echo "<br><h1>".$time_."</h1>";
}
?>




