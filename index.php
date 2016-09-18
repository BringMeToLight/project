<?php
$email = '';
$outputMsg = '';
$class = '';
$classMessage = '';

function check_email($email) {
    $atom = '[-a-z0-9!#$%&\'*+/=?^_`{|}~]';
    $domain = '[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';
    return eregi("^$atom+(\\.$atom+)*@($domain?\\.)+$domain\$", $email);
}

if( $_SERVER["REQUEST_METHOD"] == "POST" ){
	if( !empty($_POST['email']) && empty($_POST['hidden']) && check_email($_POST['email']) ){
		$email = filter_var( $_POST["email"], FILTER_SANITIZE_EMAIL );
		mail('notifyme@bringmetolight.com', 'Bring me to light: new subscriber', 'New subscriber: '.$email);
		$outputMsg = 'Your email has been successfully sent :)';
		$class = 'coming-soon-page--s--';
        $classMessage = 'coming-soon-messageCorrect--s--';
	} else {
		$outputMsg = 'Your email is not correct! Please fix that :)';
		$class = 'coming-soon-page--s--';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="bringmetolight.com" />
		<meta name="keywords" content="Plug in circuit, Bring me to light" />
		<meta name="description" content="Help to box give a light!" />
		<title>Bring me to light</title>
		<link rel="stylesheet" href="style.css?v=1.1" media="screen, projection" />
		<link rel="shortcut icon" href="favicon.ico" />
		<meta name="viewport" content="width=600">
	</head>
	<body>

		<div class="main--s-- <?php echo $class ?>" id="main--s--">
			<h1>Bring me to light</h1>

			<div class="circuit1--s--">
				<div class="circuitScheme--s-- circuit1-scheme--s--">
					<i class="circuit1-leftTop--s--"></i>
					<i class="circuit1-battery--s--"></i>
					<i class="circuit1-leftBottom--s--"></i>
					<i class="circuit1-bottomLeft--s--"></i>
					<i class="circuit1-bulb--s--"></i>
					<i class="circuit1-bottomRight--s--"></i>
					<i class="circuit1-right--s--"></i>
					<i class="circuit1-topRight--s--"></i>
					<i class="circuit1-switch--s--" id="circuit1-switch--s--"
						onclick="toggle('main--s--','circuit1-switchOn--s--')">
					</i>
					<i class="circuit1-topLeft--s--"></i>
				</div>
				<div class="buttons--s--">
					<button type="button" class="circuit1-button--s--" id="circuit1-button--s--" onclick="toggle('main--s--','circuit2-open--s--')">
						Next round
					</button>
				</div>
			</div>

			<div class="circuit2--s--">
				<div class="circuitScheme--s-- circuit2-scheme--s--">
					<i class="circuit2-leftTop--s--"></i>
					<i class="circuit2-battery--s--"></i>
					<i class="circuit2-leftBottom--s--"></i>
					<i class="circuit2-bottomLeft--s--"></i>
					<i class="circuit2-bulbLeft--s--"></i>
					<i class="circuit2-bottomRight--s--"></i>
					<i class="circuit2-bulbRight--s--"></i>
					<i class="circuit2-topLeft--s--"></i>
					<i class="circuit2-bulbLeftLine--s--"></i>
					<i class="circuit2-topBottom--s--"></i>
					<i class="circuit2-doubleSwitchWrapper--s--" id="circuit2-switchLeft--s--"
					  onclick="toggle('main--s--','circuit2-switch1-on--s--')">
						<i class="circuit2-doubleSwitch--s--">
							<i class="circuit2-doubleSwitch-left--s--"></i>
							<i class="circuit2-doubleSwitch-right--s--"></i>
						</i>
					</i>
					<i class="circuit2-middle--s--"></i>
					<i class="circuit2-middleRight--s--"></i>
					<i class="circuit2-middleTop--s--"></i>
					<i class="circuit2-middleBottom--s--"></i>
					<i class="circuit2-switch--s--" id="circuit2-switchRight--s--"
					  onclick="toggle('main--s--','circuit2-switch2-on--s--')"></i>
					<i class="circuit2-right--s--"></i>
					<i class="circuit2-rightTop--s--"></i>
				</div>
				<div class="buttons--s--">
					<button type="button" class="circuit2-buttonBack--s--"
						id="circuit2-buttonBack--s--"
						onclick="toggle('main--s--','circuit2-open--s--')">
						Prev round
					</button>
					<button type="button" class="circuit2-buttonNext--s--"
						id="circuit2-buttonNext--s--" onclick="changeCl('main--s--','main--s-- circuit2-switch1-on--s-- circuit2-switch2-on--s-- coming-soon-page--s--')">
						Next round
					</button>
				</div>
			</div>

			<div class="coming-soon--s--">
				<h2>Next levels, coming soon...</h2>
				<p>Do you wish to know when the next level  will be released? Give us your email:</p>
				<form method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">
					<input type="email" name="email" placeholder="example@domain.com">
					<input type="hidden" name="hidden">
					<?php if($outputMsg){echo '<p class="coming-soon-message--s-- '. $classMessage.'">'.$outputMsg.'</p>';}?>
					<button type="submit" value="Submit">Notify me</button>
				</form>
				<p class="coming-soon-start--s--"><a href="./">Back to start</a></p>
			</div>

		</div>

		<script src="app.js?v=1.1" type="text/javascript"></script>
	</body>
</html>
