<?php
$admin=new Admin;
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit']))
{
 $admin->new_admin($_POST);
}
if(isset($_GET['stid']))
{
  $stid=$_GET['stid'];
  $stid=preg_replace('/[^-a-zA-Z0-9_]/', '',$stid);
  $st_data=$admin->admin_status($stid);
}
if(isset($_GET['delid']))
{
  $delid=$_GET['delid'];
  $delid=preg_replace('/[^-a-zA-Z0-9_]/', '',$delid);
  $del_data=$admin->admin_delete($delid);
}

?>

<div class="container-fluid"><hr>
<div class="row-fluid">
              <div class="tab-content">
             <button type="button" class="btn btn-info btn-lg" style="float: right;" data-toggle="modal" data-target="#myModal">Admin</button> <br/>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button> 
           <h4>Admin</h4>
      </div>
      <div class="modal-body">
        <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
             <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate" enctype="multipart/form-data">
              <div class="control-group">
                <label class="control-label">Admin Name</label>
                <div class="controls">
                  <input type="text" name="admin_name" id="required">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Admin Email</label>
                <div class="controls">
                  <input type="text" name="admin_email"  id="email">
                  <br/>
                  <span id="em" style="color: red;"></span><span id="valid""></span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Confirm Email</label>
                <div class="controls">
                  <input type="text" name="confirm_email"  id="confirm_email">
                  <br/>
                  <span id="cem""></span>
                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="password"  id="password"><button type="button" id="show"><i id="eyeshow" class="fa fa-eye" aria-hidden="true"></i></button>
                  <button type="button" id="hide" style="display: none;"> <i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                  <br/>
                  <span id="pass""></span>
                </div>
              </div>
               <div class="control-group">
                <label class="control-label">Confirm Password</label>
                <div class="controls">
                  <input type="password" name="confirm_passowrd"  id="confirm_passowrd">
                  <br/>
                  <span id="cpass""></span>
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
               <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-success">
           
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
        <h5>Admin Data table
        </h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>Sl No</th>
              <th>Admin Name</th>
              <th>Admin Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr class="gradeX">
            <?php
             $admin_data=$admin->all_admin_info();
             if($admin_data)
             {
              $i=0;
              while ($admin_data_show=$admin_data->fetch_assoc()) {
                $i++;
            ?>
              <td><?=$i?></td>
              <td><?=$admin_data_show['name']?></td>
              <td><?=$admin_data_show['email']?></td>
              <td>
               <?php
               if($admin_data_show['status']=='Active')
               {
                ?>
              <span style="color:green;"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;<?=$admin_data_show['status']?></span>

              <?php 
               }
               else
               {
                ?>
               <span style="color:red;"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;<?=$admin_data_show['status']?></span>
              <?php
               }
                
              ?>
              </td>
              <td class="display_status">
                <a href="">
                 <button type="button" class="btn btn-info btn-lg">Edit</button>
                </a>
                <a href="?page=admin&&delid=<?=$admin_data_show['id']?>" onclick="return confirm('Are You Sure?')">
                 <button class="btn btn-danger">Delete</button>
                </a>
                 <a href="">
                 <?php
               if($admin_data_show['status']=='Active')
               {
                ?>
               <a href="index.php?page=admin&&stid=<?=$admin_data_show['id']?>">
                 <button class="btn btn-warning">Inactive</button>
                </a>

              <?php 
               }
               else
               {
                ?>
                <a href="index.php?page=admin&&stid=<?=$admin_data_show['id']?>">
                 <button class="btn btn-success">Active</button>
                </a>
              <?php
               }
                
              ?>
                </a>
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

      $("#email").unbind().keyup(function(){
           var email=$(this).val();
           $.ajax({
               url:'report.php',
               type:'post',
               data:{'email':email},
               success:function(data)
               {
                 $("#em").html(data);
               }
           });
      });
      $("#confirm_email").unbind().keyup(function(){
           var email        =$("#email").val();
           var confirm_email=$("#confirm_email").val();
           if(email==confirm_email)
           {
            $("#cem").html("<font color='green'>Email Matched</font>");
            $("#submit").removeAttr('disabled');
           }
           else
           {
            $("#cem").html("<font color='red'>Email Not Match</font>");
            $("#submit").attr("disabled","disabled");
           }
       });
      $("#password").unbind().keyup(function(){
        var password=$(this).val().length;
         if(password<9)
          {
             $("#pass").html("<font color='red'>Password Weak</font>");
          }
          else
          {
             $("#pass").html("<font color='green'>Password Strong</font>");
          }
      });
       $("#confirm_passowrd").unbind().keyup(function(){
        var password        =$("#password").val();
        var confirm_password=$("#confirm_passowrd").val();
         if(password==confirm_password)
          {
             $("#cpass").html("<font color='green'>Password Match</font>");
             $("#submit").removeAttr('disabled');
          }
          else
          {
             $("#cpass").html("<font color='red'>Password Not Match</font>");
             $("#submit").attr("disabled","disabled");
          }
      });
       $("#show").unbind().click(function(){
       
           $('#password').prop('type', 'text');
           $("#show").hide();
           $("#hide").show();
       });
       $("#hide").unbind().click(function(){
       
           $('#password').prop('type', 'password');
           $("#show").show();
           $("#hide").hide();
       });

         $("#email").keyup(function(){

        var email = $("#email").val();

        if(email != 0)
        {
            if(isValidEmailAddress(email))
            {
                $("#valid").html("<font color='green'> Email Is Valid</font>");
                $("#submit").removeAttr('disabled');
            } 
             else {
               $("#valid").html("<font color='red'>Email Is Not Valid</font>");
               $("#submit").attr("disabled","disabled");
            }
        }
         else {
            $("#valid").html("<font color='red'>You Must Put Email</font>");
            $("#submit").attr("disabled","disabled");
        }

       });

         function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
   }


     });
  </script>

