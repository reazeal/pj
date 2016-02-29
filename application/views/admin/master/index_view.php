<div class="container">
        <div class="col-lg-10">
            <h1>Website settings</h1>
        </div>
        <div class="col-lg-10">
            <h2>The setup</h2>
            <?php echo form_open('');?>
            <div class="form-group">
                <?php
                echo form_label('Website title','title');
                echo form_error('title');
                echo form_input('title',set_value('title',$website->title),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Default page title','page_title');
                echo form_error('page_title');
                echo form_input('page_title',set_value('page_title',$website->page_title),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Admin email','admin_email');
                echo form_error('admin_email');
                echo form_input('admin_email',set_value('admin_email',$website->admin_email),'class="form-control"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Contact email','contact_email');
                echo form_error('contact_email');
                echo form_input('contact_email',set_value('contact_email',$website->contact_email),'class="form-control"');
                ?>
            </div>
            <?php
            $submit_button = 'Save setup';
            echo form_submit('submit', $submit_button, 'class="btn btn-primary btn-lg btn-block"');?>
            <?php echo form_close();?>

        </div>