<!DOCTYPE html>
<html>
  <head>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400;300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet" type='text/css'>
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script> 
<!--    <script src="<?php echo base_url()?>assets/js/jquery.js"></script> 
  <!--  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
        var mapProp = {
          center:new google.maps.LatLng(10.332129, 123.893594),
          zoom:10,
          mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="<?php echo base_url();?>controller/about">About</a></li>
            <li><a href="<?php echo base_url();?>controller/logs">Logs</a></li> 
            <li><a href="<?php echo base_url();?>controller/contacts">Contacts</a></li> 
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
                  <span>Fire Alert</span>
                  <a class="pull-right" data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="fa fa-arrow-circle-down"></i></a>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse">
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

            <div class="panel panel-danger">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <span>Fire Alert</span>
                  <a class="pull-right arrows" data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="fa fa-arrow-circle-down"></i></a>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse in">
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

            <div class="panel panel-danger">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <span>Fire Alert!!!</span>
                  <a class="pull-right arrows gosh-ka" data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class="fa fa-arrow-circle-down"></i></a>
                </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse in">
                <div class="panel-body">
                  <div class="form-group">
                      <input class="form-control" placeholder="Latitude">
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Longitude">
                  </div>
                  <button type="button" class="btn btn-sm btn-danger" style="margin:10px;"><i class="fa fa-exclamation-triangle" ></i> SUBMIT</button>
                </div>
              </div>
            </div>


          </div> 
        <!-- Collapsible Menu End -->
      </div>
    </div>
    <!--Right Navigation End-->  

    <!-- Google Map -->
    <div id="googleMap" style="width:100%;height:620px;"></div>
    <!-- Google Map End-->


    <script src="<?php echo base_url()?>assets/js/app.js"></script>
  </body>
</html>