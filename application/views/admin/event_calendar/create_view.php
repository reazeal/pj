<div id="container" class="container" style="padding-top:60px;">
	<h1>Tambah Event</h1>

	<div id="body">
		<?php if(validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?=(isset($error)?$error:'')?>
			</div>
		<?php endif; ?>
		<?= form_open_multipart('admin/event_calendar/create')?>
		  <div class="form-group">
                <label for="jenis_event">Jenis Event</label>
                <select name="jenis_event" class="form-control">
					<option value="EVENT PERUSAHAAN">EVENT PERUSAHAAN</option>
					<option value="LIBUR NASIONAL">LIBUR NASIONAL</option>
					<option value="CUTI BERSAMA">CUTI BERSAMA</option>
					<option value="ULTAH PERUSAHAAN">ULTAH PERUSAHAAN</option>
				</select>
           </div>
		 <div class="form-group">
		 		<label for="tgl_event">Tgl Event</label>
                <div class='input-group date' id='tgl_event'>
                    <input type='text' class="form-control" name="tgl_event" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
			<script type="text/javascript">
	            $(function () {
	                $('#tgl_event').datetimepicker({
	                	locale: 'id',
	                	format: 'YYYY-MM-DD'
	                });
	            });
       	 </script>
		  <div class="form-group">
		    <label for="nama_event">Nama Event</label>
		    <textarea class="form-control" name="nama_event"></textarea>
		  </div>

		  <button type="submit" class="btn btn-primary">Simpan</button>
		  <?php echo anchor('admin/event_calendar/','Batal',array('class'=>'btn btn-warning'))?>

		</form>
	</div>

</div>