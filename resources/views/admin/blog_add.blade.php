<?= $this->extend("admin/app"); ?>
<?=$this->section("page_title")?>
<title><?=$blog_title;?></title>
<?=$this->endSection()?>

<?=$this->section("internal_css")?>
<style>.error_msg{color: red;}
.tox-statusbar__branding{display: none !important;}
</style>
<?=$this->endSection()?>
<?=$this->section("content")?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18"><?=$blog_title;?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                            <li class="breadcrumb-item active"><a href="<?=base_url('blogs-list')?>">View all blogs</a></li>
                            <li class="breadcrumb-item active"><?=$blog_title;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form id="add_blog" name="add_blog" class="outer-repeater float-none" method="POST" enctype="multipart/form-data">  
                        <div style="display:none;" id="error_msg" class="alert alert-danger text-center" role="alert"></div>    
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Blog New Name <span class="required">*</span></label>
                                        <input autocomplete="off" class="form-control" id="blog_title" name="blog_title" type="text" placeholder="Enter blog name" />
                                        <span class="error_msg" id="error_blog_name"></span>
                                    </div>                                           
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Slug <span class="required">*</span></label>
                                        <input style="position: relative;" autocomplete="off" class="form-control" id="blog_slug" name="blog_slug" type="text" placeholder="Enter blog slug" />
                                        <span class="error_msg" id="error_blog_slug"></span>
                                    </div>                                           
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Featured Image <span class="required">*</span></label>
                                        <input type="file" class="form-control" name="blog_img" id="blog_img"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="example-text-input" class="form-label">Excerpt (Optional)</label>
                                        <textarea rows="1" autocomplete="off" class="form-control" id="blog_excerpt" name="blog_excerpt" placeholder="Enter blog excerpt"></textarea>
                                        <span class="error_msg" id="error_blog_excerpt"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Detailed Content (Optional)</label>
                                        <textarea class="content_details" id="content_details" name="content_details" rows="2" cols="55"></textarea>
                                        <span class="error_msg" id="error_content_details"></span>
                                    </div>                                           
                                </div>
                            </div>                           
                            
                            
                            <div class="row" style="background-color:#eee;padding:10px 0">
                                <b>Blog Meta</b>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Meta Title (Optional)</label>
                                        <textarea class="form-control" name="meta_title" id="meta_title" rows="2"><?php echo isset($blogDetail['meta_title'])?$blogDetail['meta_title']:""; ?></textarea>
                                        <span class="error_msg" id="error_meta_title"></span>
                                    </div> 
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Meta Keyword (Optional)</label>
                                        <textarea class="form-control" name="meta_keyword" id="meta_keyword" rows="2"><?php echo isset($blogDetail['meta_keyword'])?$blogDetail['meta_keyword']:""; ?></textarea>
                                        <span class="error_msg" id="error_meta_keyword"></span>
                                    </div> 
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Meta Description (Optional)</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description" rows="2"><?php echo isset($blogDetail['meta_description'])?$blogDetail['meta_description']:""; ?></textarea>
                                        <span class="error_msg" id="error_description"></span>
                                    </div> 
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Other Header HTML (Optional)</label>
                                        <textarea class="form-control" name="other_header_html" id="other_header_html" rows="2"><?php echo isset($blogDetail['other_header_html'])?$blogDetail['other_header_html']:""; ?></textarea>
                                        <span class="error_msg" id="error_other_header_html"></span>
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <button type="button" class="btn btn-primary waves-effect waves-light" id="insert">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>

<?=$this->section("additional_js") ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=base_url('public/assets/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?=base_url('public/assets/tiny/tinymce.min.js'); ?>" referrerpolicy="origin"></script>
<?=$this->endSection()?>


<?=$this->section("page_script")?>
<script>
tinymce.init({
selector: '.content_details,.section_content_details',
// width: 500,
// height: 250,
plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
imagetools_cors_hosts: ['picsum.photos'],
menubar: 'file edit view insert format tools table help',
toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
toolbar_sticky: true,
autosave_ask_before_unload: true,
autosave_interval: "30s",
autosave_prefix: "{path}{query}-{id}-",
autosave_restore_when_empty: false,
autosave_retention: "2m",
image_advtab: true,
/*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
link_list: [
{ title: 'My page 1', value: 'https://www.codexworld.com' },
{ title: 'My page 2', value: 'https://www.xwebtools.com' }
],
image_list: [
{ title: 'My page 1', value: 'https://www.codexworld.com' },
{ title: 'My page 2', value: 'https://www.xwebtools.com' }
],
image_class_list: [
{ title: 'None', value: '' },
{ title: 'Some class', value: 'class-name' }
],
importcss_append: true,
file_picker_callback: function (callback, value, meta) {
/* Provide file and text for the link dialog */
if (meta.filetype === 'file') {
callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
}

/* Provide image and alt text for the image dialog */
if (meta.filetype === 'image') {
callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
}

/* Provide alternative source and posted for the media dialog */
if (meta.filetype === 'media') {
callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
}
},
templates: [
{ title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
{ title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
{ title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
],
template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
image_caption: true,
quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
noneditable_noneditable_class: "mceNonEditable",
toolbar_mode: 'sliding',
contextmenu: "link image imagetools table",
setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
});
</script>





<script type="text/javascript">
$(document).ready(function () {
     //CKEDITOR.replace('content_details');
     //CKEDITOR.replace('section_content_details');     
 });

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
window.location.href='<?php echo base_url('logout'); ?>';
}
});
});


$("#insert").click(function(){
        $("#insert").prop('disabled', true);
        var formData=new FormData($('#add_blog')[0]);
        // var content_details=CKEDITOR.instances['content_details'].getData();
        // formData.append('getcontent_details', content_details);
        var is_form_valid=checkValidation();
        //alert(is_form_valid);
        if(is_form_valid){
                $("#insert").prop('disabled', false);
                // for(section_content_details in CKEDITOR.instances) {
                // CKEDITOR.instances[section_content_details].updateElement();
                // }
                $.ajax({
                type: "POST",
                url: "<?php echo base_url('blog-save'); ?>",
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response)
                {
                        response=JSON.parse(response);
                        console.log(response);
                        if(response.status==1){
                            //alert(response.msg);
                            $("#insert").prop('disabled', false);
                                Swal.fire({icon: "success", title: 'Success',text: response.msg, type: 'success',showCancelButton: false
                                }).then((confirmed) => {
                                //window.location.reload();
                                window.location.href="<?php echo base_url('blog-add'); ?>";                                
                                });
                        }else{
                            $("#insert").prop('disabled', false);
                            $("#"+response.validation.fieldName).focus();
                            $("#"+response.validation.errorMsgFieldName).html(response.validation.errorMsg);
                            return false;
                        }
                }
                })
      }else{
        $("#insert").prop('disabled', false);
      }
});

function checkValidation(){
    is_form_valid = true;
    var blog_title = $('#blog_title').val();
    var blog_slug = $('#blog_slug').val();
    var blog_img = $('#blog_img').val();
    
    if(blog_title==''){
        $('#blog_title').focus();
        $('#error_blog_name').html('Please enter blog name');
        is_form_valid=false;
        return false;
    } else {$('#error_blog_name').html('');}

    if(blog_slug==''){
        $('#blog_slug').focus();
        $('#error_blog_slug').html('Please enter blog slug');
        is_form_valid=false;
        return false;
    } else {$('#error_blog_slug').html('');}

    if(blog_img==''){
        $('#blog_img').focus();
        $('#error_blog_img').html('Please select blog template');
        is_form_valid=false;
        return false;
    } else {$('#error_blog_img').html(''); }
    
    if(!is_form_valid){return false;}
    else{return true;}
}




$(document).ready(function(){
    $("#blog_title").keyup(function(e){
       e.preventDefault();
       var title = $("#blog_title").val();
       var str = title.replace(/\W+(?!$)/g, '-').toLowerCase();
       str = str.replace(/\W$/, '').toLowerCase();
       $('#blog_slug').val(str);
    });

    $("#blog_slug").keyup(function(e){
       e.preventDefault();
       var title = $("#blog_slug").val();
       var str = title.replace(/\W+(?!$)/g, '-').toLowerCase();
       str = str.replace(/\W$/, '').toLowerCase();
       $('#blog_slug').val(str);
    });
});


var i=1;
$('body').on('click', '.add_section', function() {   
    var row='<div class="row"><div class="col-lg-4"><div class="mb-3"><label for="example-text-input" class="form-label">Section</label><input class="form-control" id="blog_section" name="blog_section[]" type="text" placeholder="Section Name" /><span class="error_blog_section"></span></div></div><div class="col-lg-6"><div class="mb-3"><label for="example-text-input" class="form-label">Content</label><br><textarea class="section_content_details" id="section_content_details'+i+'" name="section_content_details[]" rows="4" cols="80"></textarea><span class="error_msg" id="error_content_details"></span></div></div><div class="col-lg-2"><input type="button" class="btn btn-danger delRow" id="" value="Delete Section"></div></div>';
        $("#SectioContent").append(row);
        //CKEDITOR.replace('section_content_details'+i+'');
        tinymce.init({
        selector: '.section_content_details',
        // width: 500,
        // height: 250,
        plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr blogbreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
        imagetools_cors_hosts: ['picsum.photos'],
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
        link_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
        ],
        image_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
        ],
        image_class_list: [
        { title: 'None', value: '' },
        { title: 'Some class', value: 'class-name' }
        ],
        importcss_append: true,
        file_picker_callback: function (callback, value, meta) {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
        callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        }

        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
        callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        }

        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
        callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        }
        },
        templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_noneditable_class: "mceNonEditable",
        toolbar_mode: 'sliding',
        contextmenu: "link image imagetools table",
        setup: function (editor) {
        editor.on('change', function () {
        tinymce.triggerSave();
        });
        }
        });
        i++;
});

$('body').on('click', '.delRow', function() {
$(this).closest('div.row').remove();
}); 

</script>
<?=$this->endSection()?>