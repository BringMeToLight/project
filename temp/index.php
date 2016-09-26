<?php
$outputMsg = '';
$class = '';
$classMessage = '';

if( $_SERVER["REQUEST_METHOD"] == "POST" ){
	if( !empty($_POST['email']) && empty($_POST['hidden']) ){
		$email = filter_var( $_POST["email"], FILTER_SANITIZE_EMAIL );
		mail('notifyme@bringmetolight.com', 'Bring me to light: new subscriber', 'New subscriber: '.$email);
		$outputMsg = 'Your email has been successfully sent :)';
		$class = 'aL';
        $classMessage = 'aN';
	} else {
		$outputMsg = 'Your email is not correct! Please fix that :)';
		$class = 'aL';
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

		<div class="a6 <?php echo $class ?>" id="a6">
			<h1>Bring me to light</h1>

			<div class="a5">
				<div class="a2 a7">
					<i class="a8"></i>
					<i class="a3"></i>
					<i class="a9"></i>
					<i class="aa"></i>
					<i class="ah"></i>
					<i class="ab"></i>
					<i class="ac"></i>
					<i class="ad"></i>
					<i class="af" id="af"
						onclick="toggle('a6','ag')">
					</i>
					<i class="ae"></i>
				</div>
				<div class="aJ">
					<button type="button" class="aI" id="aI" onclick="toggle('a6','aH')">
						Next round
					</button>
				</div>
			</div>

			<div class="a0">
				<div class="a2 ak">
					<i class="al"></i>
					<i class="a4"></i>
					<i class="am"></i>
					<i class="an"></i>
					<i class="ap"></i>
					<i class="ao"></i>
					<i class="aq"></i>
					<i class="ar"></i>
					<i class="as"></i>
					<i class="at"></i>
					<i class="au" id="aO"
					  onclick="toggle('a6','aF')">
						<i class="av">
							<i class="aw"></i>
							<i class="ax"></i>
						</i>
					</i>
					<i class="ay"></i>
					<i class="az"></i>
					<i class="aA"></i>
					<i class="aB"></i>
					<i class="aC" id="aP"
					  onclick="toggle('a6','aG')"></i>
					<i class="aD"></i>
					<i class="aE"></i>
				</div>
				<div class="aJ">
					<button type="button" class="ai"
						id="ai"
						onclick="toggle('a6','aH')">
						Prev round
					</button>
					<button type="button" class="aj"
						id="aj" onclick="changeCl('a6','a6 aF aG aL')">
						Next round
					</button>
				</div>
			</div>

			<div class="a1">
				<h2>Next levels, coming soon...</h2>
				<p>Do you wish to know when the next level  will be released? Give us your email:</p>
				<form method="post" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">
					<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="example@domain.com">
					<input type="hidden" name="hidden">
					<?php if($outputMsg){echo '<p class="aM '. $classMessage.'">'.$outputMsg.'</p>';}?>
					<button type="submit" value="Submit">Notify me</button>
				</form>
				<p class="aK"><a href="./">Back to start</a></p>
			</div>

		</div>

		<script src="app.js?v=1.1" type="text/javascript"></script>
	</body>
</html>
