  <?php
   $setup=new Setup();
   $value=$setup->setup_data();
   if($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['submit']))
   {
     $setup->set_up($_POST,$_FILES);
   }
  ?>
  <div class="container-fluid"><hr>
<div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Setup</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
              <div class="control-group">
                <label class="control-label">School Name</label>
                <div class="controls">
                  <input type="text" name="school_name" value="<?=$value['school_name']?>" id="required">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">School Email</label>
                <div class="controls">
                  <input type="text" name="school_email" value="<?=$value['school_email']?>" id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">School Address</label>
                <div class="controls">
                  <input type="text" name="school_address" value="<?=$value['school_address']?>" id="date">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Logo</label>
                <div class="controls">
                  <img id='blah' style="height:180px;" src="<?=$value['school_logo']?>" alt="your image" class='img-responsive img-circle' />
                </div>
              </div>
               <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                   <input type="file" name="school_logo" onchange="readURL(this);">
                </div>
              </div>
              <div class="form-actions text-center">
                <input type="submit" value="Update" name="submit" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>

<script src="http://cdnjs.cloudflare.com/…/li…/jquery/2.1.3/jquery.min.js"></script> 
<script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0])
{
var reader = new FileReader();
reader.onload = function (e) {
$('#blah')
.attr('src', e.target.result)
.width(200)
.height(200);
};
reader.readAsDataURL(input.files[0]);
}
}
</script>