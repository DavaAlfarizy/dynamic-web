<!DOCTYPE html>
<html>
	<head>
		<title>Web Dinamis</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="content">
			<header>
				<h1 class="judul">SMK Wikrama Bogor</h1>
				<h3 class="deskripsi">Membuat Halaman Web Dinamis Dengan PHP</h3>
			</header>
			<div class="menu">
				<ul>
					<li><a href="index.php?page=home">Beranda</a></li>
					<li><a href="index.php?page=about">About</a></li>
					<li><a href="index.php?page=contact">contact</a></li>
                    <div class = login-page>
					<li><a href="login.php">login</a></li>
					<li><a href="signup.php">sign-up</a></li>
					
                    </div>
                    
				</ul>
			</div>
			
			<div class="badan">
			<?php 		
			if(isset($_GET['page'])){
				$page = $_GET['page'];
		
				switch ($page) {
					case 'home':
						include "home.php";
						break;
					case 'about':
						include "about.php";
						break;
					case 'contact':
						include "contact.php";
						break;			
					case 'sign-up':
						include "signup.php";
						break;			
					default:
						echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
						break;
				}
			}else{
				include "home.php";
			}
		
			?>
			</div>
		</div>
	</body>
</html>