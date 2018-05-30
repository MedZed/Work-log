<!--for delete Record -->
<?php
    $m= date('m');
    $y= date('Y');
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
            <th class="text-center">No</th>
            <th class="text-center">Code pin</th>
            <th class="text-center">Nom Complet</th>
            <th class="text-center">Total des heurs en <span class="label label-warning"><?php  $dt = DateTime::createFromFormat('!m', $m); echo $dt->format('F'); ?></span></th>
            <th class="text-center">Journal pour chaque jour</th>
            <th class="text-center">Entrer aujourd'hui</th>
        </tr>
         <?php
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($con, "SELECT * FROM teacher_tbl WHERE f_name  like '%$key%' OR l_name  like '%$key%'");
	else
        $sql_sel=mysqli_query($con, "SELECT * FROM teacher_tbl");
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>

      <tr bgcolor="<?php echo $color?>">
            <td class="text-center"><?php echo $i;?></td>
            <td><?php echo $row['teacher_id']?>
            <td><?php echo $row['f_name']." ".$row['l_name'];?></td>
            <td>
            <?php
            $sql_selin=mysqli_query($con, "SELECT * FROM log_tbl WHERE teacher_id = '".$row['teacher_id']."' AND MONTH(date) = ".$m." AND YEAR(date) = ".$y);
            $t=0;
            while($r=mysqli_fetch_array($sql_selin)){
                $t=$t+$r['minutes'];
            }
            $h = floor($t/60) ? floor($t/60) .' heures' : '';
            $mm = $t%60 ? $t%60 .' minutes' : '';
            echo $h && $mm ? $h.' et '.$mm : $h.$mm;
            ?>
            </td>
            <td class="text-center"><a class="btn btn-success" href="./everyone.php?tag=view_journal_detail&tid=<?php echo $row['teacher_id'];?>">Voir Journal <i class="fa fa-list"></a></td>
            <td class="text-center">
                <?php
                        $sql_sels=mysqli_query($con, "SELECT * FROM log_tbl WHERE date = '$date_today' AND teacher_id = ".$row['teacher_id']."");
                        $countr = mysqli_num_rows($sql_sels);
                        if($countr<1){
                            echo '<a href="logger/android_2/android_logger.php?code='.md5($date_today).'&tid='.$row['teacher_id'].'"class="btn btn-default btn-block btn-log"  data-title="Sortie">Entrer</a>';
                        }else{
                            echo "<a href='/pointage/everyone.php?tag=view_today_log'>Voir Journal d'aujourd'hui</a>";
                        }

                ?>
            </td>
        </tr>
    <?php	
    }
    ?>
    </table>
</div><!-- end of content-input -->
</body>
</html>