<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCeCAhmBV1aJRpEyTpQzwZV-NS_zIfGdSE&sensor=false&language=id"></script>
<script type="text/javascript">
	var markers=new Array();
	var infowindows=new Array();
	//var refreshId2 = setInterval(function(){navigator.geolocation.getCurrentPosition(foundLocation, noLocation);}, 10000);
	
	function executeQuery() {
	  $.ajax({
		url: '<?php echo site_url('admin/maps/rangetime');?>',
		success: function(data) {
		  // do something with the return value here if you like
		}
	  });
	  setTimeout(executeQuery, 5000); // you could choose not to continue on failure...
	}

	function noLocation() {
		alert("Sensor GPS tidak ditemukan");
	}

	/*function foundLocation(position) {
		var lat2 = position.coords.latitude;
		var lon2 = position.coords.longitude;
		
		var uri = "simpandata.php";		
		$.ajax({
			type: 'POST',
			async: false,
			dataType: "html",
			url: uri,
			data: "lat="+lat2+"&long="+lon2,
			success: function(data) {
					
			}
		});
	}*/


	var refreshId = setInterval(function(){updatedata();}, 1000);
	
	function updatedata(){			
		var lat=0;
		var long=0;
					
		for(var i=1;i<markers.length;i++){
							
			var uri = "<?php echo site_url('admin/maps/getLat');?>";		
			$.ajax({
				type: 'POST',
				async: false,
				dataType: "html",
				url: uri,
				data: "id="+i,
				success: function(data) {
					lat=data;
				}
			});
			
			var uri = "<?php echo site_url('admin/maps/getLon');?>";		
			$.ajax({
				type: 'POST',
				async: false,
				dataType: "html",
				url: uri,
				data: "id="+i,
				success: function(data) {
					long = data;		
				}
			});
			
			var myLatLng = new google.maps.LatLng(lat, long);				
			markers[i].setPosition(myLatLng);	
			infowindows[i].setPosition(myLatLng);	
			
		}	
	}

	function initialize(){
		var myLatLng = new google.maps.LatLng(-6.965364, 109.9128218);
		var myOptions = {
			zoom: 5,
			center:myLatLng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		
		map = new google.maps.Map( document.getElementById('canvas'),myOptions);

		<?php
		
		foreach($truck_data as $data_content)
			 {
			 	 $id = $data_content['id'];
			 	 $nama = $data_content['nama'];
			 	 $status = $data_content['status'];
			 	 $foto = $data_content['foto'];
			 	 $lat = $data_content['lat'];
			 	 $lon = $data_content['lon'];
		   ?>
			
			var marker= new google.maps.Marker({
				position:new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>),
				map:map,
				title:"Saya disini"
			});

			marker.setIcon({ url: '<?php echo site_url('assets/img/taxi.png');?>', scaledSize: new google.maps.Size(30, 24) , anchor: new google.maps.Point(15, 12)});
			markers.push(marker);

			var infowindow= new google.maps.InfoWindow({
				content:"<img src='<?php echo site_url('assets/img/'.$foto);?>' width='100' align='left' /><?php echo $status; ?>",
				size: new google.maps.Size(50,50),
				position:new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>)
			});
			infowindow.open(map);
			
			infowindows.push(infowindow);

		<?php		
		}
		?>

				
	}

		

		$(document).ready(function() {
			initialize();
			setTimeout(executeQuery, 5000);
			$('#cari').change(function(){
					var i=$('#cari').val();
					console.log(i);
					var koodinat=markers[i-1].getPosition();
					map.panTo(koodinat);
					updatedata();
			});
		});

</script>
<div class="container" style="margin-top:20px;margin-left:210px;">

		<div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h5><b>Maps</b></h5>
                        </div>
                        <div class="panel-body">
                          
						  
						  
						
						 <div class="form-group">
							<label class="control-label col-lg-4">Cari</label>
							<div class="col-lg-6">
							<select name="cari" id="cari"  class="form-control validate[required]">
							<option value="" selected="selected">Silahkan Pilih...</option>
							<?php
							
							foreach($truck_data as $data_content)
							 {
								echo "<option value='".$data_content['id']."'>".$data_content['nama']."</option>";
							 }
							?>
							</select>
							</div>
						</div>
						
						<div class="col-lg-12">	
						<div class="row">
							<div class="col-lg-12">
							<div class="box">
							<div class="body">
								<div id="canvas" class="google-maps"></div>
							</div>
							</div>
							</div>
						</div>
						</div>	
						
						
						</div>
                        <div class="panel-footer">
                       </div>
                    </div>
		</div>
					


