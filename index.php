 <!DOCTYPE html>
 <html>

 <head>
   <title>My Finicial</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width-device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
   <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
   <link rel="stylesheet" type="text/css" href="css/jquery.material.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="css/responsive.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
 </head>

 <body>
   <?php
    include("confs/config.php");
    $result = mysqli_query($conn, "select * from finicial");
    ?>
   <div id="main">
     <div class="container">
       <h1>My Finicial</h1>
       <button class="btn btn-success btn-lg" onclick="changestudent('add',0)"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Add New</button>
       <table id="myTable" class="mdl-data-table" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>No</th>
             <th>Bank</th>
             <th>Date</th>
             <th>Amount</th>
             <th>Account Date</th>
             <th>Total Interest</th>
             <th>Type</th>
             <th>Fixed Month</th>
             <th>Update</th>
             <th>Delete</th>
           </tr>
         </thead>
         <tbody id="accountlist">
           <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) : ?>
             <tr>
               <td><?php echo  $i++; ?></td>
               <td><?php echo $row['bank'] ?></td>
               <td><?php
                    //var_dump(date('Y' ,strtotime($row['date'])))
                    echo $row['date'];
                    ?></td>
               <td><?php echo $row['amount'] ?></td>
               <td><?php echo $row['accountdate'] ?></td>
               <td><?php echo $row['totalinterest'] ?></td>
               <td><?php echo $row['type'] ?></td>
               <td><?php echo $row['fixedmonth'] ?></td>
               <td><button class="btn btn-success" onclick="changestudent('update',<?php echo $row['id'] ?>)">Update</button></td>
               <td><button class="btn btn-danger" onclick="changestudent('delete',<?php echo $row['id'] ?>)">Delete</button></td>
             </tr>
           <?php endwhile; ?>
         </tbody>
         <tfoot>
           <tr>
             <td>No</td>
             <td>Bank</td>
             <td>Date</td>
             <td>Amount</td>
             <td>Account Date</td>
             <td>Total Interest</td>
             <td>Type</td>
             <td>Fixed Month</td>
             <td>Update</td>
             <td>Delete</td>
           </tr>
         </tfoot>
       </table>
       <div class="modal fade in active" id="mymodal">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <a href="#" class="close" data-dismiss="modal">&times;</a>
               <h3 class="modal-title">New Amount</h3>
             </div>
             <!-- end modal header -->
             <div class="modal-body">
               <form id="accountform" method="post" enctype="multipart/form-data">
                 <input type="hidden" name="id" id="id">
                 <div class="form-group">
                   <input type="text" name="bank" id="bank" class="form-control" placeholder="Bank" required="">
                 </div>

                 <div class="form-group">
                   <input type="date" name="date" id="date" class="form-control" placeholder="Date" required="">
                 </div>

                 <div class="form-group">
                   <input type="text" name="amount" id="amount" class="form-control" placeholder="Amount" required="">
                 </div>

                 <div class="form-group">
                   <input type="date" name="accountdate" id="accountdate" class="form-control" placeholder="Account Date" required="">
                 </div>

                 <div class="form-group">
                   <input type="text" name="totalinterest" id="totalinterest" class="form-control" placeholder="Total Interest">
                 </div>

                 <div class="form-group">
                   <!-- <input type="text" name="type" id="type" class="form-control" placeholder="Account Type" required=""> -->
                   <select name="type" id="type" class="form-control" placeholder="Account Type" required="">
                     <option>Fixed</option>
                     <option>Saving</option>
                     <option>Loan</option>
                     <option>Buy</option>
                     <option>Withdraw</option>
                   </select>
                 </div>

                 <div class="form-group">
                   <input type="text" name="fixedmonth" id="fixedmonth" class="form-control" placeholder="Fixed Month">
                 </div>
                 <div class="form-group">
                   <button class="btn btn-success btn-md">Add</button>
                 </div>
               </form>
             </div>
             <!-- end modal-body -->
           </div>
           <!-- end modal-content -->
         </div>
         <!-- end modal-dialog -->
       </div>
       <!-- end modal -->
     </div>
     <!-- container -->
   </div>
   <!-- main -->
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="js/dataTables.responsive.min.js"></script>
   <script type="text/javascript" src="js/function.js"></script>
   <script>
     $(document).ready(function() {
       $('#myTable').DataTable({
         'responsive': true
       });
       // end DataTable
     });
   </script>
 </body>

 </html>