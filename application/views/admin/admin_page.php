<?php
if (isset($this->session->userdata['logged_in'])) {
$name = ($this->session->userdata['logged_in']['name']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login");
}
?>
<head>
<title>Admin Page</title> 
</head>
<body>
<div id="profile">
<?php
echo "Hello <b id='welcome'><i>" . $name . "</i> !</b>";
echo "<br/>";
echo "<br/>";
echo "Welcome to Admin Page";
echo "<br/>";
echo "<br/>";
echo "Your Username is " . $name;
echo "<br/>";
echo "Your Email is " . $email;
echo "<br/>";
?>
<b id="logout"><a href="logout">Logout</a></b>
</div>
<br/>
</body>
</html>