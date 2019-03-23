<?php 
error_reporting(0);

$name = $email = $username = $pswd = $confirm_pswd = $date_birth = $gender = $status = $address = $city = $postal = $hphone = $mphone = $cc_num = $cc_num = $salary = $url = $gpa = "";

$name          = $_REQUEST["name"];
$email         = $_REQUEST["email"];
$username      = $_REQUEST["username"];
$pswd          = $_REQUEST["pswd"];
$confirm_pswd  = $_REQUEST["confirm_pswd"];
$date_birth    = $_REQUEST["date_birth"];
$gender        = $_REQUEST["gender"];
$status        = $_REQUEST["status"];
$address       = $_REQUEST["address"];
$city          = $_REQUEST["city"];
$postal        = $_REQUEST["postal"];
$hphone        = $_REQUEST["hphone"];
$mphone        = $_REQUEST["mphone"];
$cc_num        = $_REQUEST["cc_num"];
$cc_date       = $_REQUEST["cc_date"];
$salary        = $_REQUEST["salary"];
$url           = $_REQUEST["url"];
$gpa           = $_REQUEST["gpa"];

$isPost = $_SERVER["REQUEST_METHOD"] == "POST";
$isGET  = $_SERVER["REQUEST_METHOD"] == "GET";

$isNameError = $isPost && !preg_match('/[a-zA-Z]{2,}/', $name);
$isEmailError = $isPost && !preg_match('\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b', $email);
$isUsernameError = $isPost && !preg_match('/[a-zA-Z0-9]{5,}/i', $username);
$isPswdError = $isPost && !preg_match('/{8,}/', $pswd);
$isConfPswdError = $isPost && !preg_match($pswd, $confirm_pswd);
$isDbirthError = $isPost && !preg_match('/\d{2}\-\d{2}\-\d{4}/', $date_birth);
$isPostalError = $isPost && !preg_match('/^\d{5}$/i', $postal);

$isFormError = $isNameError || $isEmailError || $isUsernameError || ;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<?php if($isGET || $isFormError) { ?>
		
		<h1>Registration Form</h1>
		<form action="index.php" method = "post">
		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
		<dl>
			<dt>Name <span class="error">
				<?= $isNameError?"Name should be more than 2 chars":""?></span></dt>
			<dd>
				<input type="text" name="name" value = "<?= $name ?>">
			</dd>
			<dt>Email<span class="error">
				<?= $isEmailError?"Email should be correspond the format!":""?></span></dt></dt>
			<dd>
				<input type="text" name="email" value= "<?= $email ?>">
			</dd>
			<dt>Username<span class="error">
				<?= $isUsernameError?"Username should be at least 5 chars":""?></span></dt></dt>
			<dd>
				<input type="text" name="username" value= "<?= $username ?>">
			</dd>
			<dt>Password<span class="error">
				<?= $isPswdError?"Password should be at least 8 chars":""?></span></dt></dt>
			<dd>
				<input type="text" name="pswd" value= "<?= $pswd ?>">
			</dd>
			<dt>Confirm Password<span class="error">
				<?= $isConfPswdError?"Not same as actual password!":""?></span></dt></dt>
			<dd>
				<input type="text" name="confirm_pswd" value= "<?= $confirm_pswd?>">
			</dd>
			<dt>Date of Birth</dt>
			<dd>
				<input type="text" name="date_birth" value= "<?= $date_birth ?>">
			</dd>
			<dt>Gender</dt>
			<dd>
				Male <input type="radio" name="gender">
				Female <input type="radio" name="gender">
			</dd>
			<dt>Marital Status</dt>
			<dd>
				Single <input type="radio" name="status" >
				Married <input type="radio" name="status">
				Divorced <input type="radio" name="status">
				Widowed <input type="radio" name="status">
			</dd>
			<dt>Address</dt>
			<dd>
				<input type="text" name="address" value= "<?= $address ?>">
			</dd>
			<dt>City</dt>
			<dd>
				<input type="text" name="city" value= "<?= $city?>">
			</dd>
			<dt>Postal Code<span class="error">
				<?= $isPostalError?"Should follow 6 digit number 101010":""?></span></dt></dt>
			<dd>
				<input type="text" name="postal" value= "<?= $postal ?>"> 
			</dd>
			<dt>Home Phone</dt>
			<dd>
				<input type="text" name="hphone" value= "<?= $hphone?>">
			</dd>
			<dt>Mobile Phone</dt>
			<dd>
				<input type="text" name="mphone" value= "<?= $mphone ?>">
			</dd>
			<dt>Credit Card Number</dt>
			<dd>
				<input type="text" name="cc_num" value= "<?= $cc_num ?>">
			</dd>
			<dt>Credit Card Expiry Date</dt>
			<dd>
				<input type="text" name="cc_date" value= "<?= $cc_date ?>">
			</dd>
			<dt>Monthly Salary</dt>
			<dd>
				<input type="text" name="salary" value= "<?= $salary ?>">
			</dd>
			<dt>Web Site URL</dt>
			<dd>
				<input type="text" name="url" value= "<?= $url ?>">
			</dd>
			<dt>Ovrall GPA</dt>
			<dd>
				<input type="text" name="gpa" value= "<?= $gpa ?>">
			</dd>
		</dl>
		
		<div>
			<input type="submit" name="register" value = "Register">
		</div>
	</form>
<?php } else { ?>
<h1>Thank you for your submission!</h1>
<?php } ?>
	</body>
</html>