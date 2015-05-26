<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Creative - Bootstrap Admin Template</title>
	<!-- javascripts -->
	
    <script src="js/jquery-2.1.4.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.js"></script>
    <script src="js/morris-data.js"></script>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript">
    
		$(document).ready(function() {
		// Create a Bar Chart with Morris
		   
            
			var chart1= Morris.Line({
						    // ID of the element in which to draw the chart.
						    element: 'charttemp',
						    // Set initial data (ideally you would provide an array of default data)
						    data: [{data:"2015-05-23", value: 20}],
						    		
						    xkey: ['data'],
						    ykeys: ['value'],
						    labels: ['Temp'],
                xLabelMargin: 10,
                resize: true
					  	});
            var chart2= Morris.Line({
						    // ID of the element in which to draw the chart.
						    element: 'charthum',
						    // Set initial data (ideally you would provide an array of default data)
						    data: [{data:"2008", value: 0}],
						    		
						    xkey: 'data',
						    ykeys: ['value'],
						    labels: ['Hum'],
                xLabelMargin: 10,
                resize: true
					  	});
		  	//var jsonData;
		  	
            //$.("#postodati").load("dati_grafico.php",function(data){})
            
			$.ajax({
				//type: "POST",
				url:'dati_grafico_temp.php',
				type: 'post',
			    //dataType: 'json',
			    
			    //data: data,
				
                
		    	success:function(data) {
	                // When the response to the AJAX request comes back render the chart with new data
                    var string = data;
                    //console.log(string);
                    var oggetto = jQuery.parseJSON( string );
                    //console.log(oggetto);
	                chart1.setData(oggetto);
	                },	      		
			    error: function( error )
			      {
			         alert( error );			
			      }                
			 });
            $.ajax({
				//type: "POST",
				url:'dati_grafico_hum.php',
				type: 'post',
			    //dataType: 'json',
			    //data: data,
				
                
		    	success:function(data) {
	                // When the response to the AJAX request comes back render the chart with new data
                    var string = data;
                    var oggetto = jQuery.parseJSON( string );
	                  chart2.setData(oggetto);
	                },	      		
			    error: function( error )
			      {
			         alert( error );			
			      }                
			 });

        $.ajax({
                    url: 'datitabella.php',
                    type: 'post',
                    success:function(data)
                    {
                        var string = data;
                        var oggetto = jQuery.parseJSON( string );
                        //console.log(oggetto);
                        for(i=0;i<oggetto.length;i++){
                        $("#myTable tbody").append("<tr><td>"+oggetto[i]["data"]+"</td>+<td>"+oggetto[i]["hum"]+"%</td><td>"+oggetto[i]["temp"]+"°</td></tr>");}
                    },
                    error:function( error )
                    {
                       alert( error );      
                    }   
                });	
		  
		 });
		  	
  	</script>
	    

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/font-awesome.css" rel="stylesheet" />    
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  </head>

  <body>
  
  
  
  
  
              <input type="hidden" id="postodati" value=""/>  
  
  
  
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <!--logo start-->
            <a href="index.html" class="logo" style="text-align:center;">Progetto</a>
            <!--logo end-->
		</header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="active">
                      <a class="" href="login.php">
                          <i class="icon_house_alt"></i>
                          <span>Logout</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
				</div>
			</div>
			
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-cloud-download"></i>
						<div class="count">6.674</div>
						<div class="title">Download</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-shopping-cart"></i>
						<div class="count">7.538</div>
						<div class="title">Purchased</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-thumbs-o-up"></i>
						<div class="count">4.362</div>
						<div class="title">Order</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count">1.426</div>
						<div class="title">Stock</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
			</div><!--/.row-->
		
<!-- Today status end -->
			
			 <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Grafico Temperatura</h3>
                            </div>
                            <div class="panel-body col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div id="charttemp" style="position: relative;"></div>
                            </div>
                        </div>
                    </div>
                </div>
              
			 <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Grafico Umidità</h3>
                            </div>
                            <div class="panel-body col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div id="charthum" style="position: relative;"></div>
                            </div>
                        </div>
                    </div>
                </div>

              
				
			 <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>Storico</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Umidità</th>
                                        <th>Temperatura</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            
              
              
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->
  
  


  </body>
</html>
