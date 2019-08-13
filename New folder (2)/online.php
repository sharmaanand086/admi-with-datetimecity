<?php 

include("isdk.php");
//  $conn = mysqli_connect('localhost', 'worldsuc_assign', 'asdf1234', 'worldsuc_stftitle');
 $servername = "localhost";
$username = "worldsuc_assign";
$password = "asdf1234";
$dbname = "worldsuc_stftitle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$name = $_POST ["name"]; 
$email = $_POST ["email"]; 
$tel = $_POST ["tel"]; 
$city = $_POST ["city"]; 
$date = $_POST ["date"]; 
$time = $_POST ["time"]; 


$app = new iSDK;
if ($app->cfgCon("connectionName")) 
{
    $app->optIn($email,'Google adward page subscriber');
	$contactId = $app->addWithDupCheck(array('FirstName' => $name, 'Email' => $email,'Phone1' => $tel), 'Email');
                                $sql = "SELECT tagno FROM `datatable` WHERE city = '$city' AND time = '$time' AND date = '$date'";
                            // echo $sql;
                                    $result = $conn->query($sql);
                                    //var_dump($result['tagno']);
                                    while($row = mysqli_fetch_row($result)) {
                                       // var_dump($row);
                                                 $groupId = $row[0]; 					// Registration speaktofortune.com/payment/
                                               // var_dump($groupId);
                                               $abc =  explode(",",$groupId);

                                                    foreach ($abc as $key) {

                                                        $result = $app->grpAssign($contactId, $key);
                                                    }
                                            }
   

}




?>
 <script type="text/javascript" src="https://static.leaddyno.com/js"></script> 
<script> LeadDyno.key = "a9a2c04fadbfc4051ed4c1833615c034384d6483"; LeadDyno.recordLead(); LeadDyno.autoWatch();
window.location = 'thankyou/';
     //document.getElementsByClassName('lp-popup__iframe').src = "http://WWW.microsoft.com";
    // window.location.href = "https://ad1265.lpages.co/coach-to-a-fortune-thank-you-page/";
     
     </script>