<?=$this->extend("admin/app"); ?>
<?=$this->section("page_title")?>
<title>Feedback</title>
<?=$this->endSection()?>
<?=$this->section("internal_css")?>
<style>
.edit_form {display: none;}
</style>
<?=$this->endSection()?>
<?=$this->section("content")?>

<?php //die('aaa'); ?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-0 font-size-18">Feedback</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Feedback</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <style type="text/css">
.box {
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  text-align: center;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
  z-index: 99999999999;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 60%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
    font-size: 16px;
    font-weight: 600;
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
    display: block;
    max-width: 100%;
    text-wrap: wrap;
        padding: 0 15px 10px 15px;
    margin-top: 35px!important;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
</style>
                <div class="row">
                    <div class="col-3">
                        Count : <?=!empty($feedbacks)?count($feedbacks):0?>
                    </div>
                </div>           
            </div>
        </div>
    </div>
<div class="col-12">
<div class="card">

<div class="card-body">


<table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
<thead>
<tr>
<th>S. No.</th>
<th>Name</th>
<th>Email Id</th>
<th>Contact No</th>
<th>Experience</th>
<th>Favourite Section</th>
<th>Message</th>
<th class="text-center">Date</th>
</tr>
</thead>
<tbody>
<?php
$i=1; 
if(!empty($feedbacks)){
    foreach($feedbacks as $feedbackDetails){
        $createdDate=$feedbackDetails['created_on'];
        $date=date_create($createdDate);
        //$createdDate=date_format($date,"F j, Y g:i A");
        $createdDate=date_format($date,"F j, Y");
        ?>
        <tr>
        <td><?=$i?></td>
        <td><?=isset($feedbackDetails['name'])?ucwords($feedbackDetails['name']):''; ?></td>
        <td><?=isset($feedbackDetails['email'])?ucwords($feedbackDetails['email']):''; ?></td>
        <td><?php echo isset($feedbackDetails['contact_no'])?ucwords($feedbackDetails['contact_no']):''; ?></td>
        <td><?php echo isset($feedbackDetails['experience'])?ucwords($feedbackDetails['experience']):''; ?></td>
        <td><?php echo isset($feedbackDetails['favourite_section'])?ucwords($feedbackDetails['favourite_section']):''; ?></td>
        <td>
            <div class="box">
                <a class=" button" href="#popup<?=$i?>">View Message</a>
            </div>

            <div id="popup<?=$i?>" class="overlay">
                <div class="popup">
                    <h2>Message from: <?=isset($feedbackDetails['name'])?ucwords($feedbackDetails['name']):''; ?></h2>
                    <a class="close" href="#">&times;</a>
                    <div class="content">
                        <?=(@$feedbackDetails['message'] !="")?$feedbackDetails['message']:"No message written"; ?>
                    </div>
                </div>
            </div>


            

        </td>
        <td><?php echo $createdDate; ?></td>
        </tr>
    <?php $i++; }} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?=$this->endSection()?>
<?=$this->section("page_script")?>
<script type="text/javascript"> 
$(document).ready(function(){

$("#datatable").DataTable(),$("#datatable-buttons").DataTable({"bSort": false,lengthChange:1,buttons:["copy","excel","pdf","colvis"]}).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),$(".dataTables_length select").addClass("form-select form-select-sm");


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


function deleteOffice(officeId){
    if(officeId!=""){
            Swal.fire({
            icon: "question",
            title: 'Are you sure?',
            text: 'you want to delete!',
            showDenyButton: true,
            confirmButtonText: 'Yes, delete it',
            denyButtonText: 'No, keep it',
            }).then((result) => {
            if (result.isConfirmed) {
            $.ajax({
            type: "POST",
            url: "<?php echo site_url('office-delete'); ?>",
            data: {'officeId':officeId},
            success: function(response)
            {
                response=JSON.parse(response);
                console.log(response);
                if(response.status==1){
                        Swal.fire({icon: 'success',title: response.msg}).then((result) => {
                        window.location.href="<?php echo base_url('headquarter-office'); ?>";                        
                        });
                }else{
                    Swal.fire({icon: 'error', title: ' Something went wrong!'});
                }
            }
            })
            } else if (result.isDenied) {
            }
            })
        }
}
</script>
<?=$this->endSection()?>