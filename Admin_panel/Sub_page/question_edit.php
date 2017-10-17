
<?php
$question=new Question;
if(isset($_GET['editid']))
{
  $editid=$_GET['editid'];
  $editid=preg_replace('/[^-a-zA-Z0-9_]/', '',$editid);
 $st_data=$question->question_edit($editid);
}
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{
	$editid=$_GET['editid'];
    $editid=preg_replace('/[^-a-zA-Z0-9_]/', '',$editid);
	$update=$question->question_update($_POST,$editid);
}
?>
<div class="container-fluid"><hr>
<div class="row-fluid">
          

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button> 
           <h4><?=$st_data['question']?> 's Question Edit</h4>
      </div>
      <div class="modal-body">
        <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
             <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
              <div class="control-group">
                <label class="control-label">Exam Name</label>
                <div class="controls">
                  <select  class="exam_name" name="exam_name">
                       <?php
                       $exam_list=$question->exam_list();
                       if($exam_list)
                       {
                        while ($exam_data=$exam_list->fetch_assoc()) {
                       ?>
                       <option><?=$exam_data['exam_name']?></option>
                       <?php
                     }
                   }
                   ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Subject</label>
                <div class="controls">
                  <input type="text" name="subject" value="<?=$st_data['subject']?>"  class="subject">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Question</label>
                <div class="controls">
                  <input type="text" name="question" value="<?=$st_data['question']?>" id="email">
                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Option 1:</label>
                <div class="controls">
                  <input type="text" name="opt1" value="<?=$st_data['opt1']?>" id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Option 2:</label>
                <div class="controls">
                  <input type="text" name="opt2" value="<?=$st_data['opt2']?>" id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Option 3:</label>
                <div class="controls">
                  <input type="text" name="opt3" value="<?=$st_data['opt3']?>" id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Option 4:</label>
                <div class="controls">
                  <input type="text" name="opt4"  value="<?=$st_data['opt4']?>" id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Correct Ans:</label>
                <div class="controls">
                  <input type="text" name="corr" value="<?=$st_data['corr']?>" id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Status</label>
                <div class="controls">
                <select name="status">
                  <option>Active</option>
                  <option>Inactive</option>
                </select>
                </div>
              </div>
          </div>
         <div class="modal-footer">
               <div class="text-center">
               <input type="submit" value="Submit" name="submit" class="btn btn-success">
               </div>
           </form>
   </div>
    </div>
     </div>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.4/angular-material.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
     $(document).ready(function(){
     $(".exam_name").unbind().change(function(){
          var exam_name=$(this).val();
          $.post('report.php',{exam_name:exam_name},function(data){
                  $(".subject").val(data);
          }); 
     });


     });
  </script>