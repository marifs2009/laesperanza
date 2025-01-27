<?= $this->extend("admin/app"); ?>
<?=$this->section("page_title")?>
<title><?php echo $page_title;?></title>
<?=$this->endSection()?>
<?=$this->section("internal_css")?>
<style>
.edit_form {display: none;}
</style>
<?=$this->endSection()?>
<?=$this->section("content")?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18"><?php echo $page_title;?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?php echo $page_title;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- start page content -->
        <div class="row">
            <?php               
                if(session()->getFlashdata('update_in_setting_success') !="" ){
                    echo '<div class="alert alert-success" role="alert">'.session()->getFlashdata('update_in_setting_success').'</div>';
                }   
                if(session()->getFlashdata('update_in_setting_error') !="" ){
                    echo '<div class="alert alert-danger" role="alert">'.session()->getFlashdata('update_in_setting_error').'</div>';
                }

                if(session()->getFlashdata('delete_from_setting_success') !="" ){
                    echo '<div class="alert alert-success" role="alert">'.session()->getFlashdata('delete_from_setting_success').'</div>';
                }   
                if(session()->getFlashdata('delete_from_setting_error') !="" ){
                    echo '<div class="alert alert-danger" role="alert">'.session()->getFlashdata('delete_from_setting_error').'</div>';
                }
            ?>
            <div class="col-xl-8 col-md-8">
                <table  class="table table-striped" width="100%">
                    <tr><th>#</th><th>blog Category</th><th>Status</th><th>Action</th></tr>
                    <?php                           
                        $i=1;
                        foreach ($result as $blog_cat) {?>
                            <tr>
                                <td><?=$i;?></td>
                                <td>
                                    <span id="span_<?=$blog_cat['setting_id'];?>"><?=$blog_cat['value'];?></span>
                                    <form id="form_<?=$blog_cat['setting_id'];?>" method="post" action="<?php echo base_url("update_in_setting");?>" class="edit_form">
                                        <input type="hidden" name="setting_id" value="<?=$blog_cat['setting_id'];?>">
                                        <input type="hidden" name="return_to" value="blog_cat_list">                                       
                                        <input type="hidden" name="key" value="blog_cat" class="form-control"> 

                                        <input type="text" name="value" value="<?=$blog_cat['value'];?>" class="form-control" style="display: inline-block;width: 60%;">

                                        <select name="status" class="form-control mb-4" style="display: inline-block;width: auto;" >
                                            <option value="1" name="status" id="status">Active</option>
                                            <option value="0" name="status" id="status">Inactive</option>
                                        </select>
                    
                                        <button type="submit" class="btn btn-primary" style="display: inline-block;">Save</button>
                                        <button type="button" class="btn btn-danger" style="display: inline-block;" onclick="hide_edit_form(<?php echo $blog_cat['setting_id'];?>);">X</button>
                                    </form>                                        
                                </td>
                                <td>  
                                    <?php echo $blog_cat['status'] == 1?"Active":"Inactive";?>
                                </td>
                                <td>
                                    <button id="edit_btn_<?php echo $blog_cat['setting_id'];?>" class="btn btn-primary" onclick="show_edit_form(<?php echo $blog_cat['setting_id'];?>);"><i class='fa fa-edit'></i></button>
                                    <form method="post" action="<?php echo base_url("delete_from_setting");?>" style="display: inline;">
                                        <input type="hidden" name="setting_id" value="<?=$blog_cat['setting_id'];?>">
                                        <input type="hidden" name="return_to" value="blog_cat_list">
                                        <button type="submit" class="btn btn-danger"><i class='fa fa-trash'></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                $i++;
                        }
                    ?>
                </table>                
            </div>
            <div class="col-xl-4 col-md-4">
                <form method="post" action="<?php echo base_url("save_in_setting");?>" enctype="multipart/form-data" style="margin:10px;padding:10px;border:10px solid #eee;margin-top: 0">
                    <h4 class="page-title mb-4 font-size-18">Add New Category</h4>
                    <?php               
                        if(session()->getFlashdata('save_in_setting_success') !="" ){
                            echo '<div class="alert alert-success" role="alert">'.session()->getFlashdata('save_in_setting_success').'</div>';
                        }   
                        if(session()->getFlashdata('save_in_setting_error') !="" ){
                            echo '<div class="alert alert-danger" role="alert">'.session()->getFlashdata('save_in_setting_error').'</div>';
                        }
                    ?>
                    <div class="col-md-12">
                        <p>Blog Category <span class="required">*</span></p>
                        <input type="text" name="value" class="form-control mb-3" placeholder="Enter blog category name">
                    </div>
                    <div class="col-md-12">
                        <p>Status <span class="required">*</span></p>                             
                        <select name="status" id="status" class="form-control mb-4 ">
                            <option value="1" name="status" id="status">Active</option>
                            <option value="0" name="status" id="status">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" name="key" value="blog_cat">
                        <input type="hidden" name="return_to" value="blog_cat_list">
                        <input class="btn btn-primary" type="submit" class="btn btn-lg btn-block" value="Save"/>
                    </div>
                </form>            
            </div>
        </div>
        <!-- end page content -->
    </div>
</div>
<?=$this->endSection()?>
<?=$this->section("page_script")?>
<script type="text/javascript"> 
$(document).ready(function(){
    $("#logout").click(function(){
        Swal.fire({
            title: "Are you sure?",
            text: "Want to logout!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2ab57d",
            cancelButtonColor: "#fd625e",
            confirmButtonText: "Yes, logout!"
          }).then(function (result) {
            if (result.value) {
              window.location.href='<?php echo base_url('login'); ?>';
            }
        });
    });
});

function show_edit_form(form_id) {
    $("#form_"+form_id).fadeIn();
    $("#btn_"+form_id).fadeOut();
    $("#span_"+form_id).hide();
    $("#edit_btn_"+form_id).fadeOut();
}
function hide_edit_form(form_id) {
    $("#form_"+form_id).hide();
    $("#btn_"+form_id).fadeIn();
    $("#span_"+form_id).fadeIn();
    $("#edit_btn_"+form_id).fadeIn();
}
</script>
<?=$this->endSection()?>