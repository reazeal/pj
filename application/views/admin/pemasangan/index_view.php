<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top:20px;margin-left:210px;">
		
		<div class="col-lg-12">
					<div class="panel panel-info">
                        <div class="panel-heading">
                            <h5><b>Data Pemasangan</b></h5>
                        </div>
                        <div class="panel-body">


						
							<div class="col-lg-12">
							 <div id="toolbar">
								<button class="btn btn-primary" data-toggle="modal" onclick="TambahData();">
									<i class="icon-plus"></i> Tambah
								</button>
								<button id="remove" class="btn btn-danger" disabled>
									<i class="glyphicon glyphicon-remove"></i> Hapus
								</button>
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
								   data-pagination="true"
								   data-id-field="pemasangan_id"
								   data-page-list="[10, 25, 50, 100, ALL]"
								   data-show-footer="false"
								   data-side-pagination="server"
								   data-row-style="rowStyle"
								   data-url="<?php echo site_url('admin/pemasangan/get_data_pemasangan');?>"
								   >
								 </table>
							 </div>



						</div>
                        <div class="panel-footer">
                       </div>
                    </div>
		</div>
		
		
<!-- Form Tambah Data -->
<div id="formTambahPemasangan" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div id="collapse2" class="body collapse in">
			<form class="form-horizontal" id="popup-validation">
				
				<input class="form-control"  type="hidden" name='pemasangan_id' id='pemasangan_id' readonly=""> 
				

				<table width="100%">
				  <tr>
					
					<td width="50%">
					<div class="form-group">
					<label class="control-label col-lg-4">No. Pendaftaran</label>
					<div class="col-lg-6">
				<?php
                echo form_dropdown('no_pendaftaran',$pilihan_pendaftaran,set_value('no_pendaftaran',(isset($content->no_pendaftaran) ? $content->no_pendaftaran: '')),'class="form-control selectpicker validate[required]" data-show-subtext="true" data-live-search="true" ');
                ?>
					</div>
				</div>

				
				<div class="form-group">
					<label class="control-label col-lg-4">Nama</label>
					<div class="col-lg-6">
							<input class="validate[required] form-control"  type="text" name='nama' id='nama'> 
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-4">GPS</label>
					<div class="col-lg-6">
				<?php
                echo form_dropdown('id',$pilihan_gps,set_value('nomor_seri',(isset($content->gps_id) ? $content->gps_id: '')),'class="form-control selectpicker validate[required]" data-show-subtext="true" data-live-search="true" ');
                ?>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-4">Petugas</label>
					<div class="col-lg-6">
				<?php
                echo form_dropdown('petugas_id',$pilihan_petugas,set_value('nama_petugas',(isset($content->petugas_id) ? $content->petugas_id: '')),'class="form-control selectpicker validate[required]" data-show-subtext="true" data-live-search="true" ');
                ?>
					</div>
				</div>
					
					
					</td>
					
					
					<td width="50%">
						<div class="form-group">
							<label class="control-label col-lg-4">Nopol Kendaraan</label>
							<div class="col-lg-6">
									<input class="validate[required] form-control"  type="text" name='nopol' id='nopol'> 
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4">Merk Kendaraan</label>
							<div class="col-lg-6">
									<input class="validate[required] form-control"  type="text" name='merk_kendaraan' id='merk_kendaraan'> 
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4">No. Rangka Kendaraan</label>
							<div class="col-lg-6">
									<input class="validate[required] form-control"  type="text" name='no_rangka_kendaraan' id='no_rangka_kendaraan'> 
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-4">No. Mesin Kendaraan</label>
							<div class="col-lg-6">
									<input class="validate[required] form-control"  type="text" name='no_mesin_kendaraan' id='no_mesin_kendaraan'> 
							</div>
						</div>

						<input class="form-control"  type="hidden" name='data_penanggung_jawab' id='data_penanggung_jawab' readonly="">
					
					</td>
					</tr>
				</table>

				<div><h5><b>Detail Penanggung Jawab</b></h5></div>

				<div class="form-group">
				<div class="col-lg-10">
				 <table id="table_penanggung_jawab"
					   data-toggle="table"
					   data-editable-emptytext="Klik untuk isi.."
					   data-url="<?php echo site_url('assets/json/data1.json');?>">
					<thead>
					<tr>
					
						<th data-field="id" ></th>
						<th data-field="ktp" data-editable="true">No. KTP</th>
						<th data-field="nama" data-editable="true">Nama</th>
						<th data-field="alamat" data-editable="true">Alamat</th>
						<th data-field="telp" data-editable="true">Telpon</th>
					</tr>
					</thead>
				</table>
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

<script>
        var $modal = $('#formTambahPemasangan').modal({show: false});
        var $alert = $('.alert').hide();
		var $table_tanggung_jawab = $('#table_penanggung_jawab');

        var $table = $('#table'),
        $remove = $('#remove'),
        selections = [];
		$alert = $('.alert').hide();

    function initTable() {
        $table.bootstrapTable({
            height: 527,
			 columns: [
                
                [	{
                        field: 'state',
                        checkbox: true,
                        align: 'center'
                    },
					{
                        field: 'no_pendaftaran',
                        title: 'No. Pendaftaran',
						sortable: true,
                        align: 'left'
                    },
						{
                        field: 'nama',
                        title: 'Nama',
						sortable: true,
                        align: 'right'
                    },
						{
                        field: 'nomor_seri',
                        title: 'GPS',
						sortable: true,
                        align: 'left'
                    },
						{
                        field: 'nama_petugas',
                        title: 'Petugas',
						sortable: true,
                         align: 'left'
                    },
						{
                        field: 'nopol',
                        title: 'No.Pol',
						sortable: true,
                        align: 'left'
                    },
						{
                        field: 'merk_kendaraan',
                        title: 'Merk',
						sortable: true,
                        align: 'left'
                    },
						{
                        field: 'no_rangka_kendaraan',
                        title: 'No. Rangka',
						sortable: true,
                        align: 'left'
                    },
						{
                        field: 'no_mesin_kendaraan',
                        title: 'No. Mesin',
						sortable: true,
                        align: 'left'
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
          var $modal = $('#formTambahPemasangan').modal({show: false});
		 
			if (confirm('Anda yakin untuk menghapus data ini ?')) {
				 var ids = getIdSelections();
				
				$.ajax({ 
					type      : 'POST', 
					url       : '<?php echo site_url('admin/pemasangan/delete/');?>/',
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
            return row.pemasangan_id
        });
    }

    function responseHandler(res) {
        $.each(res.rows, function (i, row) {
            row.state = $.inArray(row.pemasangan_id, selections) !== -1;
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

        $modal.data('pemasangan_id', row.pemasangan_id);
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
            '<a class="edit" href="javascript:void(0)" title="Edit Data">',
            '<i class="glyphicon glyphicon-edit"></i>',
            '</a>  ',
            '<a class="remove" href="javascript:void(0)" title="Hapus">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }



    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
           // alert('You click like action, row: ' + JSON.stringify(row));
		    var $modal = $('#formTambahPemasangan').modal({show: false});
			showModal($(this).attr('title'), row);
        },
        'click .remove': function (e, value, row, index) {
			var $modal = $('#formTambahPemasangan').modal({show: false});
		    if (confirm('Anda yakin untuk menghapus data ini ?')) {
                $.ajax({
                    url: '<?php echo site_url('admin/pemasangan/delete_id/');?>/',
					data :  { datanya : row.pemasangan_id },
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
		
		$('#formTambahPemasangan').validationEngine();
    	formValidation();
		formInit(); 

		$('form').submit(function(event) { //Trigger on form submit
		  
		   
			 var $table = $('#table').bootstrapTable({url: '<?php echo site_url('admin/pemasangan/get_data_pemasangan');?>' });
			 var values = $(this).serialize();
			 var tanggung_jawab = JSON.stringify($table_tanggung_jawab.bootstrapTable('getData'));

			 $.ajax({ //Process the form using $.ajax()
				type      : 'POST', //Method type
				url       : $modal.data('pemasangan_id') ? '<?php echo site_url('admin/pemasangan/update');?>' : '<?php echo site_url('admin/pemasangan/create');?>' , 
				data      : values+''+tanggung_jawab, //Forms name
				dataType  : 'json',
				success   : function(data) {
							if (!data.success) { //If fails
								//$modal.modal('hide');
								MsgBox.show(($modal.data('pemasangan_id') ? 'Update Data' : 'Tambah Data') + ' Gagal disimpan, cek kembali data yang akan dientrykan!');
							}
							else {
								MsgBox.show(($modal.data('pemasangan_id') ? 'Update Data' : 'Tambah Data') + ' Berhasil disimpan!');									
								$modal.modal('hide');
								$table.bootstrapTable('refresh');
								$("form").trigger("reset");
								}
							}
			});
			event.preventDefault(); //Prevent the default submit
		});
});

    function rowStyle(row, index) {
        var classes = [ 'success'];

        if (index % 2 === 0) {
            return {
                classes: classes[0]
            };
        }
        return {};
    }

	$('#tgl_pembelian').datepicker({
		 dateFormat: 'dd-mm-yy',
		 minDate: '+5d',
		 changeMonth: true,
		 changeYear: true
	 });

</script>