<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top:60px;">
    <div class="row" width="700px">
        <div class="col-lg-12">
            <h1>Ubah File Bahasa</h1>
            <?php echo form_open();?>
                 <div class="form-group">
                    <?php
                    echo form_label('File Bahasa', 'file_bahasa');
                    echo form_error('file_bahasa');
                    echo form_textarea('file_bahasa', set_value('file_bahasa', $file_bahasa, false), 'class="form-control"');
                    ?>
                </div>
            <?php echo form_submit('submit', 'Ubah File', 'class="btn btn-primary btn-lg btn-block"');?>
            <?php echo anchor('/admin/languages', 'Cancel','class="btn btn-default btn-lg btn-block"');?>
            <?php echo form_close();?>
        </div>
    </div>
</div>