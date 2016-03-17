<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

 <!--END PAGE CONTENT -->
</div>
</div>

<div class="bb-alert alert alert-danger " style="display:none;">
	<span class="label label-warning"></span>
</div>
 <div id="loader"></div>
<div id="loader2"><img src="<?php echo site_url('assets/img/ajax-loading2.gif');?>" /></div><input type="hidden" value="120" id="it" />
 <script>

 
function initTimer() {
    $(document).ready(function() {
        $("#loader").hide();
        var b = parseInt($("#it").val()),
            d = 0,
            a = "<?php echo site_url('admin/user/logout');?>";
        $.ajaxSetup({
            success: function(j, g, c) {
                try {
                    if (j.charAt(0) !== "{") {
                        document.location = a;
                    }
                } catch (h) {}
            },
            error: function(g, c, e) {
                $("#loader").hide();
                if (g.status == 404) {
                    MsgBox.show( 'Layanan untuk sementara tidak tersedia[Error 404].Mohon hubungi administrator!');
                } else {
                    if (g.status === 500) {
                    MsgBox.show( 'Error pada server [Error  500].Mohon hubungi administrator!');
                    }
                }
            },
            beforeSend: function(c) {
                c.setRequestHeader("X-Requested-With", {
                    toString: function() {
                        return "";
                    }
                });
                c.setRequestHeader("Accept-Language", {
                    toString: function() {
                        return "";
                    }
                });
                c.setRequestHeader("Accept", {
                    toString: function() {
                        return "";
                    }
                });
            }
        });
        setInterval(function() {
            if (++d > b) {
                document.location = a;
            }
        }, 60000);
        $(this).mousemove(function(c) {
            d = 0;
        });
        $(this).click(function(c) {
            d = 0;
        });
        $(this).dblclick(function(c) {
            d = 0;
        });
        $(this).keypress(function(c) {
            d = 0;
        });
    });
}
	$(function() {
		window.history.forward();
		initTimer();
		$('#loader').on('hide', function() {
			setTimeout(function() {
				$("#loader2").fadeOut('slow');
			}, 500);
		});
		$('#loader').on('show', function() {
			$('#loader2').show();
		});
	});
	(function($) {
		$.each(['show', 'hide'], function(i, ev) {
			var el = $.fn[ev];
			$.fn[ev] = function() {
				this.trigger(ev);
				return el.apply(this, arguments);
			};
		});
	})(jQuery);
</script>

<footer>
    <div class="container" id="footer">
        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
    </div>
</footer>
<?php echo $before_body;?>
</body>
</html>