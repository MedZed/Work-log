<!--for delete Record -->


<?php
	$msg="";
    $opr="";
    $date_today = date("Y-m-d");
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($con, "DELETE FROM teacher_tbl WHERE teacher_id=$id");
	if($del_sql) {
        {
            echo "<div>"
                . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
                . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
                . "</button>"
                . "<strong>Sucess!</strong> Record Deleted"
                . "</div>"
                . "</div>";
        }
    }
	else
		$msg="Could not Delete :".mysqli_error($del_sql);	
			
}
	echo $msg;
?>



<body>
<div class="col-md-12  view-form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h3 class="text-center">Journal d'aujourd'hui <?php echo date("d M Y") ?></h3>
        <!-- <a class="btn btn-primary right" href="?tag=teachers_entry">Add New Teacher</a> -->
    </div>
    <form role="form" data-toggle="validator" method="post" class="form-horizontal">
        <div class="form-group">
            <div class="col-md-9 col-md-offset-1 col-xs-9 col-sm-10">
                <input type="text" class="form-control" name="searchtxt" Placeholder="Enter name for search" autocomplete="off"/></div>
            <input type="submit" name="btnsearch" value="Search" class="btn btn-info"/>
        </div>
    </form>
<!--<form method="post">-->
<!--<table width="755">-->
<!--	<tr>-->
<!--    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">View Teachers</td>-->
<!--        <td><a href="?tag=teachers_entry"><input type="button" title="Add new Teachers" name="butAdd" value="Add New" id="button-search" /></a></td>-->
<!--        <td><input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/></td>-->
<!--        <td style="float:right"><input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Teacher" /></td>-->
<!--    </tr>-->
<!--</table>-->
<!--</form>-->
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Code pin</th>
            <th>Nom complet</th>
            <th>Statue</th>
            <th>Heures</th>
            <th>Action</th>
        </tr>
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($con, "SELECT * FROM log_tbl WHERE teacher_id  like '%$key%' and date = '$date_today'");
	else
        $sql_sel=mysqli_query($con, "SELECT * FROM log_tbl WHERE date = '$date_today'");
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>











      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['teacher_id'];?></td>
            <td>
            <?php
            $sql_sel_in=mysqli_query($con, "SELECT * FROM teacher_tbl WHERE teacher_id = '". $row['teacher_id']."'");
            $count = mysqli_num_rows($sql_sel_in);
            while($row_in=mysqli_fetch_array($sql_sel_in)){
                echo $row_in['f_name']." ".$row_in['l_name'];
                }
                
            ?>
            </td>

            <td>
             <?php
            switch ($row['status']) {
                case "in":
                    echo "<p class='text-center'>Au travail <i class='fa fa-circle animated flash infinite'style='color:#2ecc71;text-align:center;'  aria-hidden='true'></i></p>";
                    break;
                case "out":
                    echo "<p class='text-center'>Pas au travail <i class='fa fa-circle'style='color:#e74c3c;text-align:center;'  aria-hidden='true'></i></p>";
                    break;
            }       
            
            ?>
            </td>
            <td><?php echo date('H:i', mktime(0,$row['minutes']));?></td>
            <td>
            <?php 
                        switch ($row['status']) {
                            case "in":
                                echo '<a href="logger/android_2/android_logger.php?code='.md5($date_today).'&tid='.$row['teacher_id'].'"class="btn btn-default btn-block btn-log"  data-title="Sortie">Sortie</a>';
                                break;
                            case "out":
                                echo '<a href="logger/android_2/android_logger.php?code='.md5($date_today).'&tid='.$row['teacher_id'].'"class="btn btn-default btn-block btn-log" data-title="Sortie">Retourne</a>';
                                break;
                        }    
            ?>
            </td>
      </tr>
    <?php	
    }
    ?>
    </table>

</div><!-- end of content-input -->
<script>




    setTimeout(function () {
        location.reload();
    },10000); // reload after every 10 seconds

</script>


</body>
</html>