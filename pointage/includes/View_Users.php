<!--for delete Record -->
<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysqli_query($con,"DELETE FROM users_tbl WHERE u_id=$id");
	if($del_sql) {
        echo "<div>"
            . "<div class='alert alert-success col-md-6 col-md-offset-3'>"
            . "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
            . "</button>"
            . "<strong>Sucess!</strong> Supprimer avec succeé"
            . "</div>"
            . "</div>";
    }
	else
		$msg="Erreur :".mysqli_error($con);	
			
}
	echo $msg;
?>


<body>
<div class="col-md-12  view-form-style">
    <div class="col-md-12 entry-head margin-20b">
        <h4 class="left">Users View</h4>
        <a class="btn btn-primary right" <a href="?tag=susers_entry">Add New Users</a>
    </div>
    <form role="form" data-toggle="validator" method="post" class="form-horizontal">
        <div class="form-group">
            <div class="col-md-9 col-md-offset-1     col-xs-9 col-sm-10">
                <input type="text" class="form-control" name="searchtxt" Placeholder="Enter Subject name for search" autocomplete="off"/></div>
            <input type="submit" name="btnsearch" value="Search" class="btn btn-info"/>
        </div>
    </form>
<div class="table-responsive">
    <form method="post">
        <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nom utilisateur</th>
            <th>Mot de pass</th>
            <!-- <th>Type</th> -->
            <th colspan="2" class="text-center">Operation</th>
        </tr>
        
         <?php
		 
		 $key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysqli_query($con,"SElECT * FROM users_tbl WHERE username  like '%$key%' ");
	else
        $sql_sel=mysqli_query($con,"SELECT * FROM users_tbl");
		
		
    $i=0;
    while($row=mysqli_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
            <td><?php echo $i;?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['password'];?></td>
            <!-- <td><?php //echo $row['type'];?></td> -->
            <td align="center"><a href="?tag=susers_entry&opr=upd&rs_id=<?php echo $row['u_id'];?>" title="Upate"><i class="fas fa-pen-square"></i></a></td>
            <td align="center"><a href="?tag=view_users&opr=del&rs_id=<?php echo $row['u_id'];?>" title="Delete" class="delete-btn" data-title="Êtes-vous sûr de vouloir supprimer ceci ?"><i class="fas fa-minus-square"></i></a></td>
        </tr>
    <?php	
    }
    ?>
     </table>
   </form>
</div><!-- end of content-input -->
</body>
</html>