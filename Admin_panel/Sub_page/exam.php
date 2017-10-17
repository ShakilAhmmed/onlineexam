<?php
$exam=new Exam;
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{
  
  $exam->exam_data($_POST);
}
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['edit']))
{
  $edit=$_GET['editid'];
  $edit=preg_replace('/[^-a-zA-Z0-9_]/', '',$edit);
  $exam->exam_data_edit($_POST,$edit);
}   
if(isset($_GET['delid']))
{
  $delid=$_GET['delid'];
  $delid=preg_replace('/[^-a-zA-Z0-9_]/', '',$delid);
  $del_data=$exam->exam_delete($delid);
}
if(isset($_GET['stid']))
{
  $stid=$_GET['stid'];
  $stid=preg_replace('/[^-a-zA-Z0-9_]/', '',$stid);
  $st_data=$exam->exam_status($stid);
}
?>

<div class="container-fluid"><hr>
<div class="row-fluid">
              <div class="tab-content">
             <button type="button" class="btn btn-info btn-lg" style="float: right;" data-toggle="modal" data-target="#myModal">Exam</button> <br/>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button> 
           <h4>Exam</h4>
      </div>
      <div class="modal-body">
        <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
             <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
              <div class="control-group">
                <label class="control-label">Exam Name</label>
                <div class="controls">
                  <input type="text" name="exam_name" id="required">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Subject</label>
                <div class="controls">
                  <input type="text" name="subject"  id="email">
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
<?php
if(isset($_GET['editid']))
{
  $editid=$_GET['editid'];
  $editid=preg_replace('/[^-a-zA-Z0-9_]/', '',$editid);
  echo $edit_data=$exam->exam_value($editid);
}
?>
    <div id="home" class="tab-pane fade in active">
    <div class="widget-box">
      <div class="widget-title">
        <span class="icon">
          <i class="icon-th">
          </i>
        </span>
        <h5>Exam Data table
        </h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Exam Name</th>
              <th>Subject</th>
              <th>Status</th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>
            <tr class="gradeX">
            <?php
            $list=$exam->exam_list();
            if($list)
            {
              $i=0;
              while ($list_data=$list->fetch_assoc()) {
                $i++;
            ?>
              <td><?=$i?></td>
              <td><?=$list_data['exam_name']?></td>
              <td><?=$list_data['subject']?></td>
              <td>
              <?php
               if($list_data['status']=='Active')
               {
                ?>
                 <span style="color:green;"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;<?=$list_data['status']?></span>
                <?php
               }else
               {
                ?>
                <span style="color:red;"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;<?=$list_data['status']?></span>
                <?php
               }
               ?>
              </td>
              <td class="display_status">
                <a href="index.php?page=exam&&editid=<?=$list_data['id']?>">
                 <button type="button" class="btn btn-info btn-lg">Edit</button>
                </a>
                <a href="index.php?page=exam&&delid=<?=$list_data['id']?>" onclick="return confirm('Are You Sure?')">
                 <button class="btn btn-danger">Delete</button>
                </a>
                 <?php
                 if($list_data['status']=='Active'):
                 ?>
                 <a href="index.php?page=exam&&stid=<?=$list_data['id']?>">
                 <button class="btn btn-warning">Inactive</button>
                </a>
                <?php
                 else:
                ?>
                 <a href="index.php?page=exam&&stid=<?=$list_data['id']?>">
                 <button class="btn btn-success">Active</button>
                </a>
                <?php
                 endif;
                ?>
              </td>
            </tr>
          <?php
            }
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<div id="myModal2" class="modal fade" role="dialog">
  

    <!-- Modal content-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
     $(document).ready(function(){
      $("#close").unbind().click(function(){
        $("#model").fadeOut(500);
      });
     });
  </script>

