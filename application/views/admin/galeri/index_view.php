<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top:60px;">
    <div class="row">
        <div class="col-lg-12">
            <!-- Single button -->
            <?php
            echo anchor('admin/menus/create','Add menu','class="btn btn-primary"');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12" style="margin-top: 10px;">
            <?php
            echo '<table class="table table-hover table-bordered table-condensed">';
            echo '<thead>';
            echo '<tr>';
            echo '<th rowspan="2">Id</th>';
            echo '<th rowspan="2">Judul Produk</th>';
            echo '<th rowspan="2">Diskripsi Produk</th>';
            echo '<th>Operations</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td> </td><td> </td>';
            echo '<td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            ?>
        </div>
    </div>
    
    
    
</div>


  
