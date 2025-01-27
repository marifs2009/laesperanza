<?=$this->extend("admin/app"); ?>
<?=$this->section("page_title")?>
<title><?php echo $page_title;?></title>
<?=$this->endSection()?>
<?=$this->section("internal_css")?>
<style>

</style>
<?=$this->endSection()?>
<?=$this->section("content")?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18"><?=$page_title;?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?=$page_title;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- start page content -->
        <div class="row">
            <?php               
                if(session()->getFlashdata('social_media_update_success') !="" ){
                    echo '<div class="alert alert-success" role="alert">'.session()->getFlashdata('social_media_update_success').'</div>';
                }   
                if(session()->getFlashdata('social_media_update_error') !="" ){
                    echo '<div class="alert alert-danger" role="alert">'.session()->getFlashdata('social_media_update_error').'</div>';
                }
            ?>
            <div class="col-xl-12 col-md-12">
                <table  class="table table-striped" width="100%">
                    <tr><td>#</td><td>Lable</td><td>Link</td><td>Status</td><td>Action</td></tr>
                    <?php       
                        $i=1;                        
                        foreach ($result as $social) {?>
                            <tr>
                                <form action="<?=base_url('social-media-update')?>" method="post">
                                <td><?=$i++?></td>
                                <td><input type="text" class="form-control" name="social_media_label" id="social_media_label" value="<?=$social['social_media_label']?>"></td>
                                <td><input type="text" required class="form-control" name="social_media_link" id="social_media_link"  value="<?=$social['social_media_link']?>"></td>
                                <td>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" <?=$social['status'] == 1?'selected':''?>>Active</option>
                                        <option value="0" <?=$social['status'] == 0?'selected':''?>>Inactive</option>
                                    </select>
                                    </td>
                                <td>
                                    <input type="hidden" class="form-control" name="social_media_id" id="social_media_id"  value="<?=$social['social_media_id']?>">
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </td>
                                </form>
                            </tr>
                    <?php 
                        } ?>
                </table>                
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>
<?=$this->section("page_script")?>
<script type="text/javascript"> 
$(document).ready(function(){
    
});
</script>
<?=$this->endSection()?>