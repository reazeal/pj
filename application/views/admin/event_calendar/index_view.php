<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top:60px;">
<h1>Event</h1>
    <div class="row">
        <?php
        //print_r($this->data);
         echo anchor('admin/event_calendar/create/','Add','class="btn btn-primary"');
           
        if(!empty($query)) : ?>
			
			<?php if($this->session->flashdata('message')) : ?>
				<div class="alert alert-success" role="alert" align="center">
					<?php $this->session->flashdata('message')?>
				</div>
			<?php endif; ?>
    </div>
    <div class="row">

		<?php
		
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		?>
    
        <div class="col-lg-12" style="margin-top: 10px;">
            <?php
            echo '<table class="table table-hover table-bordered table-condensed">';
            echo '<thead>';
            echo '<tr>';
            echo '<th >Tgl. Event</th>';
			echo '<th >Hari</th>';
            echo '<th >Nama Event</th>';
            echo '<th >Action</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach($query as $content)
                {
                	echo "<tr>";
                	echo "<td>";
                	echo $content->tgl_event;
                	echo "</td>";
					echo "<td>";
                	echo $dayList[date('D', strtotime($content->tgl_event))];
                	echo "</td>";
                	echo "<td>";
                	echo $content->jenis_event;
                	echo "</td>";
                	echo "<td>";
                	echo $content->nama_event;
                	echo "</td>";
                	echo "<td>";
                	echo anchor('admin/event_calendar/edit/'.$content->id_event_cal,'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>');
                    echo ' '.anchor('admin/event_calendar/delete/'.$content->id_event_cal,'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>','onclick="return confirm(\'Are you sure you want to delete?\')"');
                    echo "</td>";        
                	echo "</tr>";
                	
                	//print_r($content);
                }
            echo '</tbody>';
            echo '</table>';
            
            ?>
            <div class="pagination wow fadeInLeft">
                  <div class="halaman"><h4>Halaman : <?php 
                   if(empty($halaman))
					 {
					 	echo "<strong>1</strong>";
					 }else{
						echo $halaman;
                  	 }
                  
                  ?></h4></div>
              </div>
              
            <?php else : ?>
			<div align="center">Tidak ada Slider didatabase, silahkan klik tanda <span class="glyphicon glyphicon-plus"></span> disamping, untuk memulai menambah.</div>
			<?php
			echo anchor('admin/event_calendar/add','<span class="glyphicon glyphicon-plus"></span>');
			?>
		<?php 
		
		
		
		endif; ?>
		
        </div>
    </div>
</div>