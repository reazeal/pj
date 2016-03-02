<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

 <!--END PAGE CONTENT -->
</div>
</div>

<div class="bb-alert alert alert-danger " style="display:none;">
	<span class="label label-warning"></span>
</div>

<footer>
    <div class="container" id="footer">
        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>
</footer>
<?php echo $before_body;?>
</body>
</html>