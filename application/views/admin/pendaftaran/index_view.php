<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top:20px;">
		<div class="col-lg-10">
		 <h3>Data Pendaftaran</h3>
		    
			
		 <div id="toolbar">
			<button class="btn btn-primary" data-toggle="modal" onclick="TambahData();">
				<i class="icon-plus"></i> Tambah
			</button>
			<button id="remove" class="btn btn-danger" disabled>
				<i class="glyphicon glyphicon-remove"></i> Hapus
			</button>
		 </div>
		 </div>
		 <div class="col-lg-10" style="margin-top: 20px;width:89%;">
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
			   data-id-field="no_pendaftaran"
			   data-page-list="[10, 25, 50, 100, ALL]"
			   data-show-footer="false"
			   data-side-pagination="server"
			   data-row-style="rowStyle"
			   data-url="<?php echo site_url('admin/pendaftaran/get_data_pendaftaran');?>"
			   >
			 </table>
		 </div>

<!-- Form Tambah Data -->
<div id="formTambahPendaftaran" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div id="collapse2" class="body collapse in">
			<form class="form-horizontal" id="popup-validation">

				<div class="form-group">
					<label class="control-label col-lg-4">Tanggal</label>

					<div class="col-lg-4">
						<div class="input-group input-append date" id="dp3" data-date="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy">
							<input id="tanggal" class="validate[required] form-control" value="<?php echo date('d-m-Y'); ?>" readonly="readonly" type="text" name='tanggal'>
							<span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
						</div>
					</div>
				</div>

				<input class="form-control"  type="hidden" name='no_pendaftaran' id='no_pendaftaran' readonly=""> 

				<div class="form-group">
					<label class="control-label col-lg-4">Nama</label>
					<div class="col-lg-6">
							<input class="validate[required] form-control"  type="text" name='nama' id='nama'> 
					</div>
				</div>


				<div class="form-group">
                    <label for="text4" class="control-label col-lg-4">Alamat</label>
                    <div class="col-lg-6">
                        <textarea id="alamat" name="alamat" class="validate[required] form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
					<label class="control-label col-lg-4">Telp. Rumah</label>
					<div class="col-lg-4">
							<input class="validate[required,custom[number]] form-control"  type="text" name='no_telp' id='no_telp'> 
					</div>
				</div>   

				 <div class="form-group">
					<label class="control-label col-lg-4">Telp. HP</label>
					<div class="col-lg-4">
							<input class="validate[required,custom[number]] form-control"  type="text" name='no_hp' id='no_hp'> 
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-4">E-mail</label>

					<div class=" col-lg-4">
						<input class="validate[required,custom[email]] form-control" name="email" id="email" type="text">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-4">Jenis</label>
					<div class="col-lg-4">
						<select name="jenis" id="jenis" class="validate[required] form-control">
							<option value="">Pilih...</option>
							<option value="Pribadi">Pribadi</option>
							<option value="Perusahaan">Perusahaan</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-4">No. SIUP</label>
					<div class="col-lg-6">
							<input class="validate[required] form-control"  type="text" name='no_siup' id='no_siup'> 
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
        var $modal = $('#formTambahPendaftaran').modal({show: false});
        var $alert = $('.alert').hide();

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
                        align: 'center',
                        align: 'center'
                    },
					
                    {
                        field: 'tanggal',
                        title: 'Tanggal',
						width: 100,
						sortable: true,
                        footerFormatter: totalNameFormatter,
                        align: 'center'
                    },
						{
                        field: 'nama',
                        title: 'Nama',
						width: 200,
                        sortable: true,
                        footerFormatter: totalNameFormatter,
                        align: 'left'
                    },{
                        field: 'no_telp',
                        title: 'No. Telpon',
						width: 100,
                        sortable: true,
                        footerFormatter: totalNameFormatter,
                        align: 'center'
                    },{
                        field: 'no_hp',
                        title: 'No. HP',
						width: 100,
                        sortable: true,
                        footerFormatter: totalNameFormatter,
                        align: 'center'
                    },{
                        field: 'jenis',
                        title: 'Jenis',
						width: 100,
                        sortable: true,
                        footerFormatter: totalNameFormatter,
                        align: 'center'
                    },{
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
          var $modal = $('#formTambahPendaftaran').modal({show: false});
		 
			if (confirm('Anda yakin untuk menghapus data ini ?')) {
				 var ids = getIdSelections();
				
				$.ajax({ 
					type      : 'POST', 
					url       : '<?php echo site_url('admin/pendaftaran/delete/');?>/',
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
            return row.no_pendaftaran
        });
    }

    function responseHandler(res) {
        $.each(res.rows, function (i, row) {
            row.state = $.inArray(row.no_pendaftaran, selections) !== -1;
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

        $modal.data('no_pendaftaran', row.no_pendaftaran);
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
		    var $modal = $('#formTambahPendaftaran').modal({show: false});
			showModal($(this).attr('title'), row);
        },
        'click .remove': function (e, value, row, index) {
			var $modal = $('#formTambahPendaftaran').modal({show: false});
		    if (confirm('Anda yakin untuk menghapus data ini ?')) {
                $.ajax({
                    url: '<?php echo site_url('admin/pendaftaran/delete_id/');?>/',
					data :  { datanya : row.no_pendaftaran },
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

	$('#formTambahPendaftaran').validationEngine();
	formValidation();
	formInit(); 


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

    $('form').submit(function(event) { //Trigger on form submit
      
		 var $table = $('#table').bootstrapTable({url: '<?php echo site_url('admin/pendaftaran/get_data_pendaftaran');?>' });
		 var values = $(this).serialize();

        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : $modal.data('no_pendaftaran') ? '<?php echo site_url('admin/pendaftaran/update');?>' : '<?php echo site_url('admin/pendaftaran/create');?>' , 
            data      : values, //Forms name
            dataType  : 'json',
            success   : function(data) {
						if (!data.success) { //If fails
							MsgBox.show(($modal.data('no_pendaftaran') ? 'Update Data' : 'Tambah Data') + ' Gagal disimpan, cek kembali data yang akan dientrykan!');
						}
						else {
								MsgBox.show(($modal.data('no_pendaftaran') ? 'Update Data' : 'Tambah Data') + ' Berhasil disimpan!');									
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
</script>

</div>