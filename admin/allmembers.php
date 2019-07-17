<?php 
$valid_passwords = array ("chinu" => "admin@12345");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Please enter Valid username and password");
}
 
$conn = mysqli_connect('localhost', 'root', 'asdfaf@123', 'khusiyaansupport'); 
 $check ="SELECT * FROM `registrations` ";
        $result = mysqli_query($conn,$check);
       
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css" >
<!-- jQuery library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
<body>
<div class="jumbotron">
    <div class="row">
     
    <div class="col-md-12 head">
        <div class="float-right">
             <h3> Export link  </h3>
             <a href="exportData.php" class="btn btn-primary"><i class="exp"></i> Export csv</a>
        </div>
    </div>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr><th>Sr no.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Dob</th>
                <th>Gender</th>
                <th>Registration Type</th>
                <th>Number of People</th>
                <th>Zone 1</th>
                <th>Zone 2</th>
                <th>Zone 3</th>
                <th>Zone 4</th>
                <th>Zone 5</th>
                <th>Zone 6</th>
            </tr>
        </thead>
        <tbody>
            <?php 
             if(mysqli_num_rows($result)>0){
                 $a = 1;
			     while($row = $result->fetch_assoc()) {
			         ?>
            <tr><td> <?php echo $a++ ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><?php echo $row["dob"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td><?php echo $row["regtype"]; ?></td>
                <td><?php echo $row["numpeople"]; ?></td>
                <td><?php echo $row["location1"]; ?></td>
                <td><?php echo $row["location2"]; ?></td>
                <td><?php echo $row["location3"]; ?></td>
                <td><?php echo $row["location4"]; ?></td>
                <td><?php echo $row["location5"]; ?></td>
                <td><?php echo $row["location6"]; ?></td>
            </tr>
        <?php 
                    }
			        }
                    else
                    {
                       ?>
                       <td >
                           <p>Not Found</p>
                           </td>
                       <?php 
                     
                     }  
			
			    ?>
        </tbody>
        <!--<tfoot>-->
        <!--    <tr>-->
        <!--        <th>Name</th>-->
        <!--        <th>Position</th>-->
        <!--        <th>Office</th>-->
        <!--        <th>Age</th>-->
        <!--        <th>Start date</th>-->
        <!--        <th>Salary</th>-->
        <!--    </tr>-->
        <!--</tfoot>-->
    </table>
</div>
</body>
<script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>
</html>
