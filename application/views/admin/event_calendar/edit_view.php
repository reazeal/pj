<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($this->input->post()){
	$tgl_event 		= set_value('tgl_event');
	$nama_event 	= set_value('nama_event');
	$jenis_event 	= set_value('jenis_event');
} else {
	$tgl_event 		= $query->tgl_event;
	$nama_event 	= $query->nama_event;
	$jenis_event 	= $query->jenis_event;
	
	if($jenis_event=='EVENT PERUSAHAAN'){ $terpilih1 ="selected"; }else{ $terpilih1 ="";}
	
	if($jenis_event=='LIBUR NASIONAL'){$terpilih2 ="selected";}else{$terpilih2 ="";}
	
	if($jenis_event=='CUTI BERSAMA'){$terpilih3 ="selected";}else{$terpilih3 ="";}
	
	if($jenis_event=='ULTAH PERUSAHAAN'){$terpilih4 ="selected";}else{$terpilih4 ="";}
}

?>


<div id="container" class="container" style="padding-top:60px;">
	<h1>Ubah Event</h1>

	<div id="body">
		<?php if(validation_errors() || isset($error)) : ?>
			<div class="alert alert-danger" role="alert" align="center">
				<?=validation_errors()?>
				<?=(isset($error)?$error:'')?>
			</div>
		<?php endif; ?>
		<?=form_open_multipart('admin/event_calendar/edit/'.$query->id_event_cal)?>
			
			<div class="form-group">
                <label for="jenis_event">Jenis Event</label>
                <select name="jenis_event" class="form-control">
					<option value="EVENT PERUSAHAAN" <?php echo $terpilih1; ?> >EVENT PERUSAHAAN</option>
					<option value="LIBUR NASIONAL" <?php echo $terpilih2; ?>>LIBUR NASIONAL</option>
					<option value="CUTI BERSAMA" <?php echo $terpilih3; ?>>CUTI BERSAMA</option>
					<option value="ULTAH PERUSAHAAN" <?php echo $terpilih4; ?>>ULTAH PERUSAHAAN</option>
				</select>
           </div>
           
		  <div class="form-group">
		 		<label for="tgl_event">Tgl Event</label>
                <div class='input-group date' id='tgl_event'>
                    <input type='text' class="form-control" name="tgl_event" value="<?=$tgl_event?>" />
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
		    <textarea class="form-control" name="nama_event"><?=$nama_event?></textarea>
		  </div>

		  <button type="submit" class="btn btn-primary">Simpan</button>
		  <?=anchor('admin/event_calendar','Cancel',array('class'=>'btn btn-warning'))?>

		</form>
	</div>

</div>
