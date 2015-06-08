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
    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <link href="css/sb-admin.css" rel="stylesheet">
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

          setInterval(function(){   
            
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
                        $("#myTable tbody tr").remove();
                        for(i=0;i<oggetto.length;i++){
                        $("#myTable tbody").append("<tr><td>"+oggetto[i]["data"]+"</td>+<td>"+oggetto[i]["hum"]+"%</td><td>"+oggetto[i]["temp"]+"°</td></tr>");}
                    },
                    error:function( error )
                    {
                       alert( error );      
                    }   
                });	

                $.ajax({
                    url: 'Tempnow.php',
                    type: 'post',
                    success:function(data)
                    {
                        var string = data;
                        var oggetto = jQuery.parseJSON( string );
                        $("#temp_a").text(oggetto[0]["value"]+"°");
                    },
                    error:function( error )
                    {
                       alert( error );      
                    }   
                }); 

                  $.ajax({
                    url: 'Humnow.php',
                    type: 'post',
                    success:function(data)
                    {
                      var string = data;
                      var oggetto = jQuery.parseJSON( string );
                      $("#hum_a").text(oggetto[0]["value"]+"%");
                    },
                    error:function( error )
                    {
                       alert( error );      
                    }   
                }); 
		      }, 1000);
		 });
		  	
  	</script>
  </head>

  <body>
  <div id="wrapper">

    <div class="row">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Tesina</a>
            </div>
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="login.php"><i class="fa fa-fw fa-bar-chart-o"></i> Logout</a>
                    </li>
                    
                </ul>
            </div>
          </div>
            <!-- /.navbar-collapse -->
        </nav>
			
            <div class="row" style="margin-top:60px;">
				<div class="col-lg-offset-1 col-md-offset-1 col-lg-5 col-md-5 col-sm-12 col-xs-12">
					<div class="info-box red-bg">
						<div class="title"><img src="img\temp.png">Temperatura attuale</div>  
              <div class="count" id="temp_a"></div>
            											
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
            <div class="title"><img src="img\hum.png">Umidità attuale</div>  
            <div class="count" id="hum_a"></div>
									
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
			</div><!--/.row-->
		
<!-- Today status end -->
			
			 <div class="row">
                    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <div class="panel panel-default col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Grafico Temperatura</h3>
                            </div>
                            <div class="panel-body col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div id="charttemp" style="position: relative; height: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
              
			 <div class="row">
                    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <div class="panel panel-default col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Grafico Umidità</h3>
                            </div>
                            <div class="panel-body col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div id="charthum" style="position: relative; height: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

              
				
			 <div class="row">
                    <div class="col-lg-offset-1 col-md-offset-1 col-lg-10 col-md-10 col-sm-12 col-xs-12">
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
         </div>
  <!-- container section start -->
  
  </body>
</html>
