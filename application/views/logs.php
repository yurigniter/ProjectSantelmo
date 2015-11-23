<!DOCTYPE html>
<html lang="en">

  <head>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400;300' rel='stylesheet' type='text/css'/>
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type='text/css'/>
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/css/paging.css" rel="stylesheet"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="http://maps.googleapis.com/maps/api/js"></script>
  <script>
    
  </script>
  </head>
<body>

    <!--Top Navigation -->      
    <nav class="navbar navbar-inverse" role="navigation" style="margin:0px;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
<!--           <a class="navbar-brand" href="#">Fire Station</a> -->
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fire"></i> Fire Station <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Admin</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
            <li><a href="<?php echo base_url();?>controller/home">Home</a></li>
            <li><a href="#">About</a></li>
            <li class="active"><a href="<?php echo base_url();?>controller/logs" >Logs</a></li> 
            <li><a href="#">Contacts</a></li> 
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><button type="button" class="btn btn-sm btn-danger icon-menu" style="margin:10px;"><i class="fa fa-exclamation-triangle" ></i> FIRE ALERT</button></li>

          </ul>
        </div>
      </div>
    </nav>
    <!--Top Navigation End-->
    <!--Right Navigation -->      
    <div class="container-fluid" style="background-color:red;">
      <div class="menu">
        <!-- Menu icon -->
        <div>
                  <span class="icon-close"><i style="color:#fff;font-size:20px;margin:10px;" class="fa fa-times"></i></span>                
                  <span class="pull-right icon-add"><i style="color:#fff;font-size:20px;margin:10px;" class="fa fa-plus"></i></span>                
        </div>
        <!-- Menu icon End-->
        <!--Collapsible Menu -->
          <div class="panel-group" id="accordion">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Fire Alert</a>
                  <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>                
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                  <div class="form-group">
                      <input class="form-control" placeholder="Latitude">
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Longitude">
                  </div>
                  <button type="button" class="btn btn-sm btn-danger icon-menu" style="margin:10px;"><i class="fa fa-exclamation-triangle" ></i> SUBMIT</button>
                </div>
              </div>
            </div>
          </div> 
        <!-- Collapsible Menu End -->
      </div>
    </div>
    <!--Right Navigation End-->  
        <!-- filter top -->
             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="box-filter" style="text-align:center;width:100%">
                        <div style="display: inline-block">
                            <a href="<?php echo base_url()?>controller/logs">All</a>
                        </div>
                        <div  style="display: inline-block">
                            <form class="form-inline" method="post" accept-charset="utf-8" action="<?php echo base_url()?>controller/loclogs">
                                    <select style='border: none;text-align: center;' name="northchoice" id="locchoice" onchange="this.form.submit()">
                                        <option>Location</option>
                                        <?php if(!empty($brgy)){
                                                    foreach ($brgy as $key => $row) {
                                                            $brgy = $row["brgy_name"];
                                                            echo '<option value="'.$brgy.'">'.$brgy.'</option>';
                                                }
                                            }?>
                                    </select>
                             </form>
                        </div>
                       <div style="display: inline-block">
                            <form class="form-inline" method="post" accept-charset="utf-8" action="<?php echo base_url()?>controller/categlogs">
                                    <select style='border: none;text-align: center;' class="" name="categchoice" id="categchoice" onchange="this.form.submit()">
                                        <option>Category</option>
                                        <option value="1">Alpha</option>
                                        <option value="2">Beta</option>
                                    </select>
                            </form>
                       </div>
                       <div style="display: inline-block">
                            <form class="form-inline" method="post" accept-charset="utf-8" action="<?php echo base_url()?>controller/sublogs">
                                    <select style='border:none;text-align: center;'  class="" name="subchoice" id="subchoice" onchange="this.form.submit()">
                                        <option>Substation</option>
                                       <?php if(!empty($substn)){
                                                    foreach ($substn as $key => $row) {
                                                            $subs= $row["substn_name"];
                                                            echo '<option value="'.$subs.'">'.$subs.'</option>';
                                            }
                                        }?>
                                    </select>
                            </form>
                       </div>
            </div>
            <!-- /filter top end -->
        <div id="page-wrapper">
       
            <div class="container-fluid">
                 
                <!-- Page Heading -->
                
                <i class="fa fa-table"></i> Fire Logs
                
                <!-- /.row -->
                <!-- filter --><!-- /.filter -->
                    <div id="txt"></div>
                    <div class="">
                        <h2></h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>NOTIFICATION TIME</th>
                                        <th>RESPONSE TIME</th>
                                        <th>ARRIVAL TIME</th>
                                        <th>FIRE OUT TIME</th>
                                        <th>LOCATION</th>
                                        <th>SUBSTATION</th>
                                        <th>CATEGORY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if(!empty($values)){
                                       foreach ($values as $key => $row) {
                                              $dte = $row["date"];
                                              $notif = $row["notif_time"];
                                              $resp = $row["resp_time"];
                                              $arvl = $row["arvl_time"];
                                              $fout = $row["fout_time"];
                                              $loctn = $row["location"];
                                              $substn = $row["substn_name"];
                                              $catgry = $row["category_type"];
                                ?>
                                              <tr>
                                                <td><?php echo $dte;?></td>
                                                <td><?php echo $notif;?></td>
                                                <td><?php echo $resp;?></td>
                                                <td><?php echo $arvl;?></td>
                                                <td><?php echo $fout;?></td>
                                                <td><?php echo $loctn;?></td>
                                                <td><?php echo $substn;?></td>
                                                <td><?php echo $catgry;?></td>
                                            </tr>
                                 <?php }
                                    }
                                 ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!-- /.row -->
                <div class="container text-center"><?php echo $paging;?></div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
  
    
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/app.js"></script>

</body>

</html>
