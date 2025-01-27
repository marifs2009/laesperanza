<?= $this->extend("admin/app"); ?>
<?=$this->section("blog_title")?>
<title><?=$page_title;?></title>
<?=$this->endSection()?>
<?=$this->section("content")?>
<?php //echo "<pre>"; print_r($blogs); ?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">All Blogs</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active">Blogs</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button onclick="parent.location='<?php echo base_url('blog-add'); ?>'" style="float:right;" type="button" class="btn btn-primary waves-effect waves-light">Add New Blog</button>
                    </div>
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Excerpt</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=1; 
                                if(isset($blogs) && !empty($blogs)){
                                    foreach($blogs as $blog){
                                    //print_r($blog);
                                    ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td>
                                                <?php if($blog['blog_img'] != ""){?>
                                                    <img src="<?=base_url()."/assets/blogs/".$blog['blog_img']; ?>" style="height:50px;">
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a title="<?php echo isset($blog['blog_title'])?ucwords($blog['blog_title']):""; ?>"><?php echo isset($blog['blog_title'])?word_limiter(ucwords($blog['blog_title']),4):""; ?></a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" title="View blog" target="_new" href="<?php echo base_url($blog['blog_slug']); ?>"><i title="View Blog" class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                                <?php echo isset($blog['blog_excerpt'])?word_limiter(ucwords($blog['blog_excerpt']),4):""; ?>
                                            </td>
                                            <td class="text-center">
                                                <?=$blog['status']==1? "Active":"Inactive"; ?>
                                            </td>
                                            <td class="text-center">
                                            	<a class="btn btn-primary" title="Update blog" href="<?=base_url('blog-edit/'.$blog['blog_id'])?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            	&nbsp;&nbsp;&nbsp;
                                            	<button type="button" title="Delete blog" class="btn btn-danger" onclick="deleteblog('<?=$blog['blog_id']?>');"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    <?php 
                                    $i++; 
                                    }
                                } 
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>
<?=$this->section("additional_js") ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?=$this->endSection()?>
<?=$this->section("page_script")?>
<script type="text/javascript">
$(document).ready(function(){$("#datatable").DataTable(),$("#datatable-buttons").DataTable({"bSort": false,lengthChange:1,buttons:["copy","excel","pdf","colvis"]}).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),$(".dataTables_length select").addClass("form-select form-select-sm")});
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
            //alert('test');
            window.location.href='<?php echo base_url('logout'); ?>';
        }
    });
});

function deleteblog(blogId){
	if(blogId!=""){
		Swal.fire({
    		icon: "question",
    		title: 'Are you sure?',
    		text: 'you want to delete this blog!',
    		showDenyButton: true,
    		confirmButtonText: 'Yes, delete it',
    		denyButtonText: 'No, keep it',
    		}).then((result) => {
        		if (result.isConfirmed) {
            		$.ajax({
                        type: "POST",
                        url: "<?php echo site_url('blog-delete'); ?>",
                        data: {'blogId':blogId},
                        success: function(response) {
                            response=JSON.parse(response);
                            //console.log(response);
                            if(response.status == 1){
                                    Swal.fire({icon: 'success',title: response.msg}).then((result) => {
                                    window.location.href="<?php echo base_url('blog-list'); ?>";                        
                                    });
                            }else{
                                Swal.fire({icon: 'error', title: ' Something went wrong!'});
                            }
                        }
                    })
    			} 
    			else if (result.isDenied) {	}
			})
		}
    }
</script>
<?=$this->endSection()?>