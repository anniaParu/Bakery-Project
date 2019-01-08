
<?php
session_start();
if(isset($_SESSION['admin_log'])){
$username = $_SESSION['admin_log']; 
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Goods</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/adminstyle.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </head>
   <body>
     <?php
        require('admin_con.php');
        $result= mysqli_query($con, "select * from goods");
        $check = mysqli_num_rows($result);
     ?>
      <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">Best Bakery</a>
      </div>
       <ul class="nav navbar-nav">
         <li><a href="dashboard.php">HOME</a></li>
         <li><a href="user.php">USERS</a></li>
         <li class="active"><a href="goods.php">GOODS </a></li>
         <li><a href="admin.php">ADMIN</a></li>
         <li><a href="order.php">ORDERS</a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="admin_edit.php">LOG ADMIN NAME</a></li>
         <li><a href="admin_logout.php">LOGOUT</a></li>
       </ul>
     </div>
  </nav>

  <div class="container">
   <div class="adminhead">
     <div class="heading">
       <h2>Manage Goods</h2>
     </div>
      <div class="addbtn">
        <button type="button" class="btn btn-primary btn-sm btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Goods</button>
      </div>
   </div>

   <div class="modal fade" id="myModal" role="dialog">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Add Goods</h4>
         </div>
         <div class="modal-body">
         <form action="goodsadd.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="goodsname">Goods Name:</label>
               <input type="text" name="goodsname" class="form-control" id="goodsname" required>
          </div>
          <div class="form-group">
             <label for="category">Category:</label>
                <select name = "category" class="form-control" id = "category"><option>Cake</option><option>Cookies</option><option>Wedding Cake </option><option>Pastries</option></select>
          </div>
          <div class="form-group">
              <label for="price">Price:</label>
                <input type="number" name="price" class="form-control" id="price" min="1" step="any" required>
          </div>

          <div class="form-group">
             <label class="custom-file">
               <input type="file" name="file" id="file" class="custom-file-input" required>
                  <span class="custom-file-control"></span>
             </label>
          </div>
              <button type="submit" name="submit" class="btn btn-default">Submit</button>
          </form>
         </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </div>
        </div>
     </div>
  </div>
  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
      <?php 
         if($check > 0 ){
            while($row = mysqli_fetch_assoc($result)){
               $id = $row['id'];
          echo 
            "<tr>
               <td>{$row['id']}</td>
               <td>{$row['name']}</td>
               <td>{$row['category']}</td> 
               <td>{$row['price']}</td>
               <td>{$row['image']}</td>
             </tr>"
      
      ?>
          <button id='edit_btn' data-toggle="modal" data-target="#editModal" onclick="takeid(this);" ><span class='glyphicon glyphicon-pencil'></span></button> &nbsp; 
          <button id='edit_btn' onclick="deletephone('<?php echo $id; ?>')"><span class='glyphicon glyphicon-trash'></span></button>
        <?php
           "</td>

            </tr>";
          }
        }
      ?>
    </tbody>
  </table>
</div>

 <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Goods</h4>
        </div>
        <div class="modal-body">
          <form  method="post" enctype="multipart/form-data" action="goods_update.php">
             <input type="hidden" name="goods_id"  id = "iii">
             <div class="form-group">
                <label for="phonename">Goods Name:</label>
                  <input type="text" name="goodsname" class="form-control" id="up_goodsname" required>
             </div>
             <div class="form-group">
                <label for="category">Category:</label>
                <select name = "category"  class="form-control" id="up_category"><option>Cake</option><option>Cookies</option><option>Wedding Cake</option><option>Pastries</option></select>
             </div>
             <div class="form-group">
               <label for="price">Price:</label>
               <input type="number" name="price" class="form-control" id="up_price" min="1" step="any" required>
             </div>
               <div class="form-group">
                 <label class="custom-file">
                  <input type="file" name="file" id="up_file" class="custom-file-input" >
                    <span class="custom-file-control"></span>
                 </label>
              </div>
                 <button type="submit" name="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</body>

<script>
  function deletephone(ID){
    if (confirm('Are you sure you want to delete?')){
      window.location.href = "deletegoods.php?id="+ID;
    } else {
      // Do nothing!
    }
  }
   function takeid(n){
   var row = n.parentNode.parentNode;
   var col = row.getElementsByTagName("td");
var i = 0;
while(i<col.length){
document.getElementById("iii").value = col[0].textContent;
document.getElementById("up_goodsname").value = col[1].textContent;
document.getElementById("up_category").value = col[2].textContent;
document.getElementById("up_price").value = col[3].textContent;

i++;
}

  }
</script>
<?php
}else{
  header('location:index.php');
}
?>