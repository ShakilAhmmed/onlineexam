<?php
$question=new Question;
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{
  $new_que=$question->new_question($_POST);
}
?>
<div class="container-fluid"><hr>
<div class="row-fluid">
              <div class="tab-content">
             <button type="button" class="btn btn-info btn-lg" style="float: right;" data-toggle="modal" data-target="#myModal">Add Question</button> <br/>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button> 
           <h4>Question</h4>
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
                  <input type="text" name="subject"  class="subject">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Question</label>
                <div class="controls">
                  <input type="text" name="question"  id="email">
                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Option 1:</label>
                <div class="controls">
                  <input type="text" name="opt1"  id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Option 2:</label>
                <div class="controls">
                  <input type="text" name="opt2"  id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Option 3:</label>
                <div class="controls">
                  <input type="text" name="opt3"  id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Option 4:</label>
                <div class="controls">
                  <input type="text" name="opt4"  id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Correct Ans:</label>
                <div class="controls">
                  <input type="text" name="corr"  id="email">
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
               <input type="submit" value="Submit" name="submit" class="btn btn-success">
           
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </form>
      </div>
    </div>
     </div>
     </div>
</div>
    <div id="home" class="tab-pane fade in active">
    <div class="widget-box">
      <div class="widget-title">
        <span class="icon">
          <i class="icon-th">
          </i>
        </span>
        <h5>Question Data table
        </h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Exam Name</th>
              <th>Subject</th>
              <th>Question</th>
              <th>Option 1</th>
              <th>Option 2</th>
              <th>Option 3</th>
              <th>Option 4</th>
              <th>Correct Answer</th>
              <th>Status</th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>
            <tr class="gradeX">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<div id="myModal2" class="modal fade" role="dialog">
  

    <!-- Modal content-->
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.4/angular-material.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
     $(document).ready(function(){
        $("#close").unbind().click(function(){
        $("#model").fadeOut(500);
      });

     $(".exam_name").unbind().change(function(){
          var exam_name=$(this).val();
          $.post('report.php',{exam_name:exam_name},function(data){
                  $(".subject").val(data);
          }); 
     });


     });
  </script>

