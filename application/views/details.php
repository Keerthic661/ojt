<!DOCTYPE html>
<html>
<head>
  <title>Tabular Form</title>
  <style>
  table{
  border:2px solid;
  padding: 5px;
  text-align: center;
  }
  </style>
</head>
<body>
  <form action="<?php echo base_url()?>main/details" method="post">
  <button><a href="login">login</a></button>
  <table border="1" align="center" cellspacing="3" cellpadding="4">
        <th>Firstname</th>
              <th>Lastname</th>
              <th>username</th>
              <th>mobile</th>
              <th>Email</th>
              
              <th colspan="2">status</th>
      
          </tr>
            <?php
            if($n->num_rows()>0)
            {
              foreach($n->result() as $row)
               {
                ?>
          <tr>
            <td><?php echo $row->fname;?></td> 
            <td><?php echo $row->lname;?></td>
            <td><?php echo $row->username;?></td>
         <td><?php echo $row->mobile;?></td>
            <td><?php echo $row->email;?></td>
            <?php
            if($row->status==0)
            {
              ?>
              <td>Approved</td>
              <td><a href="<?php echo base_url()?>main/reject/<?php echo $row->id;?>">reject</a></td>
              <?php
            }
            elseif($row->status==1)
            {
              ?>
              <td>Rejected</td>
              <td><a href="<?php echo base_url()?>main/approve/<?php echo $row->id;?>">approve</a></td>
              <?php
            }
            else
            {
              ?>
            
            <input type="hidden" name="id" value="?php echo $row->id;?>">
            <td><a href="<?php echo base_url()?>main/approve/<?php echo $row->id;?>">Approve</a></td>
            <td><a href="<?php echo base_url()?>main/reject/<?php echo $row->id;?>">Reject</a></td>
            
          </tr>
          <?php
        }
      }
    }
      else {
        ?>
        <tr>
          <td>no data found</td>
        </tr>
      <?php
      }
    
      ?>
  </table>
</form>
</body>
</html>