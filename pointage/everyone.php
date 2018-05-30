<?php
      include 'includes/_header.html';
      $tag="";
      if (isset($_GET['tag']))
      $tag=$_GET['tag'];
      include('session.php');

  ?>
    <div id="admin" class="container">
        <nav class="navbar navbar-inverse" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="everyone.php?tag=home"><i class="fa fa-university"></i></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav navbar-right">
                <li>
                        <a href="?tag=home"><i class="fa fa-home" aria-hidden="true"></i> Acceuil 
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="./logger/generate">
                      <i class="fa fa-qrcode" aria-hidden="true"></i> Code
                    </a>
                    </li>
                    <li>
                        <a href="?tag=view_journal"><i class="fa fa-list" aria-hidden="true"></i> Journal 
                        </a>
                    </li>
                    <li>
                        <a href="?tag=view_today_log"><i class="fas fa-user-clock" aria-hidden="true"></i> Journal d'aujourd'hui 
                        </a>
                    </li>
                    <li>
                        <a href="?tag=view_images&delete=no"><i class="fas fa-camera" aria-hidden="true"></i> Journal d'images 
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-suitcase" aria-hidden="true"></i> Enseignants
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="everyone.php?tag=teachers_entry">Enter enseignant</a>
                            </li>
                            <li>
                                <a href="everyone.php?tag=view_teachers">Voir Enseignants</a>
                            </li>
                        </ul>
                    </li>
                    
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <?php echo $username; ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="everyone.php?tag=help">
                                    <i class="fa fa-fw fa-question-circle"></i> Aide 
                                </a>
                            </li>
                            <li>
                                <a href="everyone.php?tag=view_users">
                                    <i class="fa fa-fw fa-users"></i> Gerer utilisateurs 
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="logout.php">
                                    <i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>


                <!-- <ul class="nav navbar-nav side-nav visible-lg visible-md visible-sm ">
                        <li>
                            <a target="_blank" href="logger/Logger.php">Oppen logger</a>
                        </li>
                        <li>
                            <a  href="everyone.php?tag=view_today_log">View today's log</a>
                        </li>
                        <li>
                            <a target="_blank" href="">View all time log</a>
                        </li>
                        <li>
                            <a target="_blank" href="">Empty link</a>
                        </li>
                </ul> -->
            </div>
        </nav>
<div class="container-fluid">
    
<?php
              if($tag=="home" or $tag=="")
                include("includes/home.php");
              elseif($tag=="inbox")
                include("includes/View_Inbox.php");
              elseif($tag=="student_entry")
                include("includes/Students_Entry.php");
              elseif($tag=="teachers_entry")
                include("includes/Teachers_Entry.php");
              elseif($tag=="score_entry")
                include("includes/Score_Entry.php"); 
              elseif($tag=="subject_entry")
                include("includes/Subject_Entry.php");
              elseif($tag=="susers_entry")
                include("includes/Users_Entry.php"); 
              elseif($tag=="view_students")
                include("includes/View_Students.php");
              elseif($tag=="view_scores")
                include("includes/View_Scores.php");
              elseif($tag=="location_entry")
                include("includes/Location_Entry.php");
              elseif($tag=="artical_entry")
                include("includes/Artical_Entry.php");
              elseif($tag=="test_score")
                include("includes/test_Scores.php");
              elseif($tag=="view_teachers")
                include("includes/View_Teachers.php");
              elseif($tag=="view_users")
                include("includes/View_Users.php");
              elseif($tag=="view_events")
                include("includes/View_Event.php");
              elseif($tag=="event_entry")
                include("includes/Event_Entry.php");
              elseif($tag=="view_parent")
                include("includes/View_Parent.php");
              elseif($tag=="parent_entry")
                include("includes/Parent_Entry.php");
              elseif($tag=="view_today_log")
                include("includes/View_Today_Log.php");
              elseif($tag=="view_journal")
                include("includes/View_Journal.php");
            elseif($tag=="view_images")
                include("includes/View_Images.php");
              elseif($tag=="view_journal_detail")
                include("includes/View_Journal_Details.php");
              /*$tag= $_REQUEST['tag'];
              
              if(empty($tag)){
                include ("Students_Entry.php");
              }
              else{
                include $tag;
              }*/
            ?>
</div>
    </div>
    <script>



</script>
    <?php include 'includes/_footer.html'; ?>




