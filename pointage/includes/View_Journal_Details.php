<!--for delete Record -->
<?php
$m= date('m');
$y= date('Y');
$ttl=0.0;
if(isset($_GET['m'])){
$m=$_GET['m'];

}
?>
<body>
<div class="col-md-12  view-form-style">
<div class="container_fluid text-center">
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li><a href="./everyone.php?tag=view_journal_detail&m=1&tid=<?php echo $_GET['tid'];?>">JAN</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=2&tid=<?php echo $_GET['tid'];?>">FEB</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=3&tid=<?php echo $_GET['tid'];?>">MAR</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=4&tid=<?php echo $_GET['tid'];?>">APR</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=5&tid=<?php echo $_GET['tid'];?>">MAY</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=6&tid=<?php echo $_GET['tid'];?>">JUN</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=7&tid=<?php echo $_GET['tid'];?>">JUL</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=8&tid=<?php echo $_GET['tid'];?>">AUG</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=9&tid=<?php echo $_GET['tid'];?>">SEP</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=10&tid=<?php echo $_GET['tid'];?>">OCT</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=11&tid=<?php echo $_GET['tid'];?>">NOV</a></li>
    <li><a href="./everyone.php?tag=view_journal_detail&m=12&tid=<?php echo $_GET['tid'];?>">DEC</a></li>

  </ul>
</nav>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Code pin</th>
            <th>Date</th>
            <th>dernier statut à ce jour</th>
            <th>Heures travailler</th>
        </tr>
         <?php
    $sql_sel=mysqli_query($con, "SELECT * FROM log_tbl WHERE teacher_id = '".$_GET['tid']."' AND MONTH(date) = ".$m." AND YEAR(date) = ".$y);
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";


    $ttl = $ttl + $row['minutes'];

    ?>



      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['teacher_id'];?></td>
            <td><?php echo $row['date']; ?></td>
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
      </tr>
    <?php	
    }
    ?>
    <ol class="breadcrumb text-center">
        <li><h4 class="left">Total des heures travailler en <?php  $dt = DateTime::createFromFormat('!m', $m); echo $dt->format('F');  echo " ".$y." est ".date('H:i', mktime(0,$ttl))."h Pour : " ?>
        
            <?php
            $sql_sel_in=mysqli_query($con, "SELECT * FROM teacher_tbl WHERE teacher_id = '". $_GET['tid']."'");
            $count = mysqli_num_rows($sql_sel_in);
            while($row_in=mysqli_fetch_array($sql_sel_in)){
                    if(strtolower($row_in['gender'])==strtolower("male")){
                        echo "Mr ".$row_in['f_name']." ".$row_in['l_name'];
                    }else if(strtolower($row_in['gender'])==strtolower("female") && strtolower($row_in['married'])==strtolower("yes")){
                        echo "Mme ".$row_in['f_name']." ".$row_in['l_name'];
                    }else if(strtolower($row_in['gender'])==strtolower("female") && strtolower($row_in['married'])==strtolower("no")){
                        echo "Mlle ".$row_in['f_name']." ".$row_in['l_name'];
                    }else{
                        echo $row_in['f_name']." ".$row_in['l_name'];
                    }
                }
            ?>
        </h4></li>
    </ol>
    </table>
</div><!-- end of content-input -->
</body>
</html>