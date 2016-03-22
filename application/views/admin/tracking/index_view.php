<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top:20px;margin-left:210px;">
		
		<div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h5><b>Data Tracking</b></h5>
                        </div>
                        <div class="panel-body">


						
							<div class="col-lg-12">
							 <div id="toolbar">
								<!-- <button class="btn btn-primary" data-toggle="modal" onclick="TambahData();">
									<i class="icon-plus"></i> Tambah
								</button>
								<button id="remove" class="btn btn-danger" disabled>
									<i class="glyphicon glyphicon-remove"></i> Hapus
								</button>
								-->
							 </div>
							 </div>
							 <div class="col-lg-12" style="margin-top: 20px;width:100%;">
								 <table id="table"
								   data-toolbar="#toolbar"
								   data-search="true"
								   data-show-refresh="true"
								   data-show-toggle="true"
								   data-show-columns="true"
								   data-show-export="true"
								   data-detail-view="true"
								   data-detail-formatter="detailFormatter"
								   data-detail-view="true"
								   data-pagination="true"
								   data-id-field="tracking_id"
								   data-page-list="[10, 25, 50, 100, ALL]"
								   data-show-footer="false"
								   data-side-pagination="server"
								   data-row-style="rowStyle"
								   data-url="<?php echo site_url('admin/tracking/get_data_tracking');?>"
								   >
								 </table>
							 </div>



						</div>
                        <div class="panel-footer">
                       </div>
                    </div>
		</div>
		
		
<!-- Form Tambah Data -->
<div id="formTambahTracking" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div id="collapse2" class="body collapse in">
			<form class="form-horizontal" id="formTambahTrackingx">
				
				<input class="form-control"  type="hidden" name='tracking_id' id='tracking_id' readonly=""> 
				
				<!-- <div class="form-group">
					<label class="control-label col-lg-4">Alat</label>
					<div class="col-lg-6">
							<input class="validate[required] form-control"  type="text" name='alat_id' id='alat_id'  readonly="readonly"> 
					</div>
				</div>-->


				<div class="form-group">
					<label class="control-label col-lg-4">Alat</label>
					<div class="col-lg-6">
				<?php
                echo form_dropdown('alat_id',$pilihan_alat,set_value('alat_id'),'class="validate[required] form-control selectpicker " data-show-subtext="true" data-live-search="true" id="alat_id" ');
                ?>
					</div>
				</div>

				
				<div class="form-group">
					<label class="control-label col-lg-4">Pemasangan</label>
					<div class="col-lg-6">
				<?php
                echo form_dropdown('pemasangan_id',$pilihan_pemasangan,set_value('pemasangan_id'),'class="validate[required] form-control selectpicker " data-show-subtext="true" data-live-search="true" id="pemasangan_id" ');
                ?>
					</div>
				</div>

				
				
				


                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input value="Simpan" class="btn btn-primary btn-md " type="submit">
                                        </div>
                                    </form>
                                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="WindowMaps" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" id="TutupWinAndInterval" >&times;</button>
        <h4 class="modal-title">Tracking View Maps</h4>
      </div>
      <div class="modal-body">
        <div id="collapse2" class="body collapse in">
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCeCAhmBV1aJRpEyTpQzwZV-NS_zIfGdSE&sensor=false&language=id"></script>
		<script type="text/javascript">
			var markers=new Array();
			var infowindows=new Array();


			function executeQuery() {
			  $.ajax({
				url: '<?php echo site_url('admin/tracking/rangetime');?>',
				success: function(data) {
				  // do something with the return value here if you like
				}
			  });
			  //setTimeout(executeQuery, 5000); // you could choose not to continue on failure...
			}


			function noLocation() {
				alert("Sensor GPS tidak ditemukan");
			}

			
			function updatedata(tracking_id){
				var lat=0;
				var longitude=0;

				$.ajax({
					type: 'POST',
					async: false,
					dataType: "json",
					url: "<?php echo site_url('admin/tracking/getLatLong');?>",
					data: "tracking_id="+tracking_id,
					success: function(data) {
						//console.log(data);
						var datax = JSON.parse(JSON.stringify(data));
	
						if(datax.success==true){
							latitude  = datax.latitude;
							longitude = datax.longitude;
						}else{
							latitude  = 0;
							longitude = 0;
						}
					}
				});


				var myLatLng = new google.maps.LatLng(latitude, longitude);				
				markers[0].setPosition(myLatLng);	
				infowindows[0].setPosition(myLatLng);
			}


			function initialize(tracking_id){
				var lat_awal = 0;
				var long_awal = 0;
				var myLatLng = new google.maps.LatLng(-6.965364, 109.9128218);
				var myOptions = {
					zoom: 15,
					center:myLatLng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				
				map = new google.maps.Map( document.getElementById('canvas'),myOptions);

				$.ajax({
					type: 'POST',
					async: false,
					dataType: "json",
					url: "<?php echo site_url('admin/tracking/getLatLongAwal');?>",
					data: "tracking_id="+tracking_id,
					success: function(data) {
						//console.log(data);

						var datax = JSON.parse(JSON.stringify(data));

						if(datax.success==true){
							lat_awal  = datax.latitude;
							long_awal = datax.longitude;
						}else{
							lat_awal  = 0;
							long_awal = 0;
						}
					}
				});


				var marker = new google.maps.Marker({
						position:new google.maps.LatLng(lat_awal, long_awal),
						map:map,
						title:"Saya disini"
					});

				marker.setIcon({ url: '<?php echo site_url('assets/img/taxi.png');?>', scaledSize: new google.maps.Size(30, 24) , anchor: new google.maps.Point(15, 12)});
				markers.push(marker);

				var infowindow = new google.maps.InfoWindow({
					content:"<img src='<?php echo site_url('assets/img/taxi1.jpg');?>' width='50' align='left' />",
					size: new google.maps.Size(50,50),
					position:new google.maps.LatLng(lat_awal, long_awal)
				});

				infowindow.open(map);
				infowindows.push(infowindow);
				
			}



		</script>
							<!-- <h3><button id="TombolPanik" class="btn btn-info">Tombol Panik</button></h3> -->
							<div  class="row">
							<div class="col-lg-12">
							<div class="box">
							<div class="body">
								<div id="canvas" class="google-maps"></div>
								<div id="counter">&nbsp;</div>
							</div>
							</div>
							</div>
							</div>
						
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="close btn btn-default" data-dismiss="modal" id="TutupWinAndInterval2" >Close</button>
      </div>
    </div>

  </div>
</div>


<script>
		var $modal = $('#formTambahTracking').modal({show: false});
		var $modalMaps = $('#WindowMaps').modal({show: false});
        var $alert = $('.alert').hide();
		$('#menuTracking').removeClass('').addClass('active');

		var $table = $('#table'),
        $remove = $('#remove'),
        selections = [];
		$alert = $('.alert').hide();

		var myLatLng = new google.maps.LatLng(-6.965364, 109.9128218);
		var myOptions = {
			zoom: 15,
			center:myLatLng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		var map = new google.maps.Map( document.getElementById('canvas'),myOptions);
	


	$('#TutupWinAndInterval').click(function() {
		$('#counter').toggleClass('pauseInterval');
	});

	$('#TutupWinAndInterval2').click(function() {
		$('#counter').toggleClass('pauseInterval');
	});

	$("#WindowMaps").on("hidden.bs.modal", function () {
		$('#counter').toggleClass('pauseInterval');
	});

	
    function initTable() {
        $table.bootstrapTable({
            height: 527,
			 columns: [
                
                [	{
                        field: 'state',
                        checkbox: true,
                        align: 'center',
                        align: 'center'
                    },
					{
                        field: 'noseri_alat',
                        title: 'NoSeri Alat',
						 sortable: true,
                        align: 'left'
                    },
						{
                        field: 'no_pendaftaran',
                        title: 'No Pendaftaran',
						sortable: true,
                        align: 'left'
                    },
						{
                        field: 'nomor_seri_gps',
                        title: 'Seri Gps',
						sortable: true,
                        align: 'left'
                    },
						{
                        field: 'nopol',
                        title: 'No.POL',
					    sortable: true,
                        align: 'left'
                    },
						{
                        field: 'nama_konsumen',
                        title: 'Nama Konsumen',
						sortable: true,
                        align: 'left'
                    },
						{
                        field: 'posisi_lat',
                        title: 'Posisi Latitude',
						sortable: false,
						align: 'center'
                    },
						{
                        field: 'posisi_long',
                        title: 'Posisi Longitude',
						sortable: false,
						align: 'center'
                    },
					{
                        field: 'aksi',
						title: 'Aksi',
                        align: 'center',
                        events: operateEvents,
						formatter: operateFormatter
                    }
                ]
            ]
        });
        // sometimes footer render error.
        setTimeout(function () {
            $table.bootstrapTable('resetView');
        }, 200);
        $table.on('check.bs.table uncheck.bs.table ' +
                'check-all.bs.table uncheck-all.bs.table', function () {
            $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);

            // save your data, here just save the current page
            selections = getIdSelections();
            // push or splice the selections if you want to save all data selections
        });
        
        $table.on('all.bs.table', function (e, name, args) {
            //console.log(name, args);
        });
        $remove.click(function () {
          var $modal = $('#formTambahTracking').modal({show: false});
		 
			if (confirm('Anda yakin untuk menghapus data ini ?')) {
				 var ids = getIdSelections();
				
				$.ajax({ 
					type      : 'POST', 
					url       : '<?php echo site_url('admin/tracking/delete/');?>/',
					data      :  { datanya : JSON.stringify(ids) },
					dataType  : 'json',
					success   : function(data) {
								if (!data.success) { //If fails
									$modal.modal('hide');
									MsgBox.show('Hapus tidak berhasil');
								}
								else {
										$modal.modal('hide');
										$table.bootstrapTable('refresh');
										$("form").trigger("reset");
										MsgBox.show('Hapus berhasil!');
									}
								}
				});

            }

            $remove.prop('disabled', true);
        });
        $(window).resize(function () {
            $table.bootstrapTable('resetView', {
                height: getHeight()
            });
        });
    }

	function TambahData() {
		$("form").trigger("reset");
		$modal.modal('show');
    }

    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.tracking_id
        });
    }

    function responseHandler(res) {
        $.each(res.rows, function (i, row) {
            row.state = $.inArray(row.tracking_id, selections) !== -1;
        });
        return res;
    }

	function showModal(title, row) {
        row = row || {
            name: '',
            stargazers_count: 0,
            forks_count: 0,
            description: ''
        }; // default row value

        $modal.data('tracking_id', row.tracking_id);
        $modal.find('.modal-title').text(title);
        for (var name in row) {
            $modal.find('input[name="' + name + '"], textarea[name="' + name + '"], select[name="' + name + '"]').val(row[name]);
        }
        $modal.modal('show');
    }

    function showAlert(title, type) {
        $alert.attr('class', 'alert alert-' + type || 'success')
              .html('<i class="glyphicon glyphicon-check"></i> ' + title).show();
        setTimeout(function () {
            $alert.hide();
        }, 3000);
    }

    function detailFormatter(index, row) {
        var html = [];
		html.push(
			'<div class="panel panel-primary">',
			'<div class="panel-heading">Detail : </div>',
			'<ul class="chat">');
        $.each(row, function (key, value) {
            html.push('<li class="chat-body clearfix"><p><b>' + key + ':</b> ' + value + '</p></li>');
        });
		html.push(
			'</ul>',
			'<div class="panel-footer"></div>',
			'</div>',
			'</div>');
        
        return html.join('');
    }

    function operateFormatter(value, row, index) {
        return [
			'<a class="TrackingMaps" href="javascript:void(0)" title="TrackingMaps">',
            '<i class="icon-map-marker"></i>',
            '</a>  ',
            '<a class="edit" href="javascript:void(0)" title="Edit Data">',
            '<i class="glyphicon glyphicon-edit"></i>',
            '</a>  ',
            '<a class="remove" href="javascript:void(0)" title="Hapus">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }



	function picFormatter(value, row, index) {
        return [
            '<img src="<?php echo site_url('uploads/');?>/'+value+'" width="40px" height="40px"/>'
        ].join('');
    }

	window.operateEvents = {
		'click .TrackingMaps': function (e, value, row, index) {
			initialize(row.tracking_id);
			$('#WindowMaps').on('shown.bs.modal', function (){ google.maps.event.trigger(map, "resize"); });
			
			$('#counter').removeClass('pauseInterval');
			
			var refreshId = setInterval( function(){
				 if(!$('#counter').hasClass('pauseInterval')) { //only run if it hasn't got this class 'pauseInterval'
				    console.log('Counting...');
				    updatedata(row.tracking_id);
				  } else {
					console.log('Stopped counting');
				  }
				},4000);

			var refreshIdxx = setInterval(function(){
					if(!$('#counter').hasClass('pauseInterval')) { //only run if it hasn't got this class 'pauseInterval'
						console.log('Counting...');
						executeQuery();
					  } else {
						console.log('Stopped counting');
					 }
				
				},5000);

			//updatedata(row.tracking_id);
			//setTimeout(executeQuery, 5000);
			//var refreshIdxx = setInterval(function(){executeQuery();},5000);
			$modalMaps.modal('show');
		},
        'click .edit': function (e, value, row, index) {
           // alert('You click like action, row: ' + JSON.stringify(row));
		    var $modal = $('#formTambahTracking').modal({show: false});
			showModal($(this).attr('title'), row);
        },
        'click .remove': function (e, value, row, index) {
			var $modal = $('#formTambahTracking').modal({show: false});
		    if (confirm('Anda yakin untuk menghapus data ini ?')) {
                $.ajax({
                    url: '<?php echo site_url('admin/tracking/delete_id/');?>/',
					data :  { datanya : row.tracking_id },
                    type: 'POST',
                    success: function () {
                        $table.bootstrapTable('refresh');
                        MsgBox.show('Hapus Berhasil!');
                    },
                    error: function () {
                        MsgBox.show('Hapus tidak berhasil!');
                    }
                })
            }
        }
    };

    function totalTextFormatter(data) {
        return 'Total';
    }

    function totalNameFormatter(data) {
        return data.length;
    }

    function totalPriceFormatter(data) {
        var total = 0;
        $.each(data, function (i, row) {
            total += +(row.price.substring(1));
        });
        return '$' + total;
    }

    function getHeight() {
        return $(window).height() - $('h1').outerHeight(true);
    }

	function checkHELLO(field, rules, i, options){
		if (field.val() != "HELLO") {
			// this allows to use i18 for the error msgs
			return options.allrules.vallayanan_idate2fields.alertText;
		}
	}


	
	function getScript(url, callback) {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.src = url;

        var done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState ||
                    this.readyState == 'loaded' || this.readyState == 'complete')) {
                done = true;
                if (callback)
                    callback();

                // Handle memory leak in IE
                script.onload = script.onreadystatechange = null;
            }
        };

        head.appendChild(script);

        // We handle everything using the script element injection
        return undefined;
    }

	
	
	$(document).ready(function() {
	
		var scripts = [
                location.search.substring(1) || '<?php echo site_url('assets/plugins/bootstrap-table/src/bootstrap-table.js');?>',
                '<?php echo site_url('assets/plugins/bootstrap-table/src/extensions/export/bootstrap-table-export.js');?>',
                '<?php echo site_url('assets/plugins/bootstrap-table/tableExport.js');?>',
                '<?php echo site_url('assets/plugins/bootstrap-table/src/extensions/editable/bootstrap-table-editable.js');?>',
                '<?php echo site_url('assets/plugins/bootstrap-table/bootstrap-editable.js');?>'
            ],

            eachSeries = function (arr, iterator, callback) {
                callback = callback || function () {};
                if (!arr.length) {
                    return callback();
                }
                var completed = 0;
                var iterate = function () {
                    iterator(arr[completed], function (err) {
                        if (err) {
                            callback(err);
                            callback = function () {};
                        }
                        else {
                            completed += 1;
                            if (completed >= arr.length) {
                                callback(null);
                            }
                            else {
                                iterate();
                            }
                        }
                    });
                };
                iterate();
            };

        eachSeries(scripts, getScript, initTable);
		
		formInit(); 
		

		$('#formTambahTrackingx').submit(function(event) { //Trigger on form submit
			 var $table = $('#table').bootstrapTable({url: '<?php echo site_url('admin/petugas/get_data_petugas');?>' });
			 var values = $(this).serialize();

			 if(!$("#formTambahTrackingx").validationEngine('validate')){
			  return false;
			 }


		   		$.ajax({ //Process the form using $.ajax()
						type      : 'POST', //Method type
						url       : $modal.data('tracking_id') ? '<?php echo site_url('admin/tracking/update');?>' : '<?php echo site_url('admin/tracking/create');?>' , 
						data      : values, //Forms name
						dataType  : 'json',
						success   : function(data) {
									if (!data.success) { //If fails
										//$modal.modal('hide');
										MsgBox.show(($modal.data('tracking_id') ? 'Update Data' : 'Tambah Data') + ' Gagal disimpan, cek kembali data yang akan dientrykan!');
									}
									else {
										MsgBox.show(($modal.data('tracking_id') ? 'Update Data' : 'Tambah Data') + ' Berhasil disimpan!');									
										$modal.modal('hide');
										$table.bootstrapTable('refresh');
										$("form").trigger("reset");
										}
									}
					});

		
			 
			event.preventDefault(); //Prevent the default submit
		});

		
		$("#fileuploader").uploadFile({
			url:"<?php echo site_url('admin/petugas/add_foto');?>",
			fileName:"userfile",
			showStatusAfterSuccess:true,
			dynamicFormData: function()
			{
				//console.log($("#tracking_idx").val());
				var data ={ tracking_id: $("#tracking_idx").val()}
				return data;
			},
				onSuccess:function(files,data,xhr,pd)
				{
					var datax = JSON.parse(data);

					if(datax.success==true){
						MsgBox.show(datax.info);	
						$modalMaps.modal('hide');
						$table.bootstrapTable('refresh');
					}else{
						MsgBox.show(datax.info);	
						$table.bootstrapTable('refresh');
					}
					
				},
		});
});

    function rowStyle(row, index) {
		var classes = [ 'success'];

        if (index % 2 === 0) {

			if(row.status==='0'){
				return {
					classes: 'danger'
				};
			}else{
				 return {
					classes: classes[0]
				};
			}
        }
        return {};
    }

	$('#tgl_lahir').datepicker({
		 dateFormat: 'dd-mm-yy',
		 minDate: '+5d',
		 changeMonth: true,
		 changeYear: true
	 });

</script>