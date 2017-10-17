<?php
$user=new User;
if(isset($_GET['delid']))
{
  $delid=$_GET['delid'];
  $delid=preg_replace('/[^-a-zA-Z0-9_]/', '',$delid);
  $user->user_delete($delid);
}
if(isset($_GET['stid']))
{
  $stid=$_GET['stid'];
  $stid=preg_replace('/[^-a-zA-Z0-9_]/', '',$stid);
  $st_data=$user->user_status($stid);
}
?>
<div class="container-fluid"><hr>
<div class="row-fluid">
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
              <th>Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Status</th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>
            <tr class="gradeX">
                        <?php
            $data=$user->user_list();
            if($data)
            {
              $i=0;
              while($data_list=$data->fetch_assoc()) {
              $i++;
            ?>
              <td><?=$i?></td>
              <td><?=$data_list['name']?></td>
              <td><?=$data_list['email']?></td>
              <td><?$pass=password_verify($data_list['password'],$data_list['password']);
                      echo $pass;
                ?></td>
              <td>
              <?php
              if($data_list['status']=='Active'):
             ?> 
              <span style="color:green;"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;<?=$data_list['status']?></span>
              <?php
              else:
              ?>
              <span style="color:red;"><i class="fa fa-circle" aria-hidden="true"></i>&nbsp;<?=$data_list['status']?></span>
              <?php
              endif;
              ?>
              </td>
              <td>
                <a href="index.php?page=user&&delid=<?=$data_list['id']?>" onclick="return confirm('Are You Sure?')" >
                 <button type="button" class="btn btn-danger btn-lg">Delete</button>
                </a>
                <?php
                 if($data_list['status']=='Active'):
                 ?>
                 <a href="index.php?page=user&&stid=<?=$data_list['id']?>">
                 <button class="btn btn-warning">Inactive</button>
                </a>
                <?php
                 else:
                ?>
                 <a href="index.php?page=user&&stid=<?=$data_list['id']?>">
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
