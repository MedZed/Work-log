





<style>
.list-group-item-heading{
    height:200px;
    line-height:150px;
}
</style>
<div class="col-md-2"></div>
    <div class="col-md-8 jumbotron text-center">
        <h3>Liste des images captureé <i class="fas fa-camera"></i></h3>
        <?php
        $no_res_msg="";
        $images = glob("cam/webcamimage/*.jpg");
        if ($_GET['delete']=="yes") {



            foreach($images as $image){
                @unlink($image);
        }
        echo "<script>window.location.href = 'http://localhost/pointage/everyone.php?tag=view_images&delete=no';</script>";    
        }else{
            if(count($images)>0){
                        // existing code continues below...
                        echo '<form method="post">';
                        echo '<button href="/pointage/everyone.php?tag=view_images&delete=yes" class="btn-d-img btn btn-danger" name="submit" type="submit" title="Delete" class="delete-btn text-center" data-title="Êtes-vous sûr de vouloir supprimer ceci ?">Supprimer tous les images</button>';
                        echo '</form>';
            }else{
                $no_res_msg="0 images ..";
            }

        }

        ?>
        <div class="list-group row well">
        <?php echo $no_res_msg ?>

            <?php  $files = glob("cam/webcamimage/*.*");
            for ($i=0; $i<count($files); $i++)
            {
                $image = $files[$i];

                ?>

                <div class="media col-md-6">
                    <figure class="pull-left">
                        <img class="media-object img-rounded img-responsive"  src="<?php echo $image?>" >
                    </figure>
                </div>
                <div class="col-md-6">
                    <h2 class="list-group-item-heading text-center"> 
                    <?php
                     $info = pathinfo($image);
                     $file_name =  basename($image,'.'.$info['extension']);
                      
                     echo $file_name."<br />"; 
                    ?> </h2>
                </div>
                
                <?php 
            }
                ?>

        </div>
	</div>
    <div class="col-md-2"></div>

