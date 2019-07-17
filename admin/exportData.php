<?php 

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "fadasf@123";
$dbName     = "khusiyaansupport";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 //$result = mysqli_query($conn,$check);
        
$filename = "members_" . date('Y-m-d') . ".csv"; 
$delimiter = ","; 
 
// Create a file pointer 
$f = fopen('php://memory', 'w'); 
 
// Set column headers 
$fields = array('id', 'name', 'email', 'phone','gender','regtype','numpeople','location1','location2','location3','location4','location5','location6'); 
fputcsv($f, $fields, $delimiter); 
 
// Get records from the database 
$result = $db->query("SELECT * FROM `registrations`  ORDER BY id DESC"); 
if($result->num_rows > 0){ 
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['id'], $row['name'], $row['email'], $row['phone'], $row['gender'], $row['regtype'], $row['numpeople'], $row['location1'], $row['location2'], $row['location3'], $row['location4'], $row['location5'], $row['location6']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
} 
 
// Move back to beginning of file 
fseek($f, 0); 
 
// Set headers to download file rather than displayed 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment; filename="' . $filename . '";'); 
 
// Output all remaining data on a file pointer 
fpassthru($f); 
 
// Exit from file 
exit();