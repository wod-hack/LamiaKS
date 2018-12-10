<?php 
require_once 'config.php';
$listele=$Db->prepare("SELECT * from genelayar");
$listele->execute();
$cek=$listele->fetch(PDO::FETCH_ASSOC);
$listelee=$Db->prepare("SELECT * from yaziayar");
$listelee->execute();
$cek2=$listelee->fetch(PDO::FETCH_ASSOC);
if(!empty($_SERVER["HTTP_CLIENT_IP"]))
{
// Ziyaretçi internete direk mi bağlanıyor?
	$ipadresi = $_SERVER["HTTP_CLIENT_IP"];
}
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
// Ziyaretçi Proxy sunucu mu kullanıyor?
	$ipadresi = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
	$ipadresi = $_SERVER["REMOTE_ADDR"];
}

	$Kaydet=$Db->prepare("INSERT INTO ziyaretcilog SET 

		ZL_ip=:ipadresi
		");


$insert=$Kaydet->execute(array(

	'ipadresi' => $ipadresi

	));

try {

	$ML_adsoyad=$_POST['ML_adsoyad'];
$ML_eposta=$_POST['ML_eposta'];
$ML_metin=$_POST['ML_metin'];


//İP Adresi Fonksiyonu
//---------------------------------------------------

	$Kaydet=$Db->prepare("INSERT INTO mesajlog SET 
		ML_adsoyad=:ML_adsoyad,
		ML_eposta=:ML_eposta,
		ML_metin=:ML_metin,
		ML_ip=:ipadresi
		");


$insert=$Kaydet->execute(array(

	'ML_adsoyad' => $_POST['ML_adsoyad'],
	'ML_eposta' => $_POST['ML_eposta'],
	'ML_metin' => $_POST['ML_metin'],
	'ipadresi' => $ipadresi

	));

	
} catch (Exception $e) {
	
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $cek["G_siteadi"]?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
						<a href="index.php">	<span class="icon fa-diamond"></span></a>
						</div>
						<div class="content">
							<div class="inner">
								<h1><?php echo $cek["G_siteadi"]?></h1>
								<p><?php echo $cek["G_slogan"]?></p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#intro">SKİLL</a></li>
								<li><a href="#work">Projeler</a></li>
								<li><a href="#about">Hakkımda</a></li>
								<li><a href="#contact">İletişim</a></li>
								<!--<li><a href="#elements">Elements</a></li>-->
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Intro -->
							<article id="intro">
								<h2 class="major">Uzmanlık Alanlarım</h2>
								<span class="image main"><img src="images/pic01.jpg" alt="" /></span>
								<p><?php echo $cek2["Y_ilgialan"]?></p>
							</article>

						<!-- Work -->
							<article id="work">
								<h2 class="major">Projeler</h2>
								<span class="image main"><img src="images/pic02.jpg" alt="" /></span>
								<p><?php echo $cek2["Y_neleryaparim"]?></p>
							</article>

						<!-- About -->
							<article id="about">
								<h2 class="major">Hakkımda</h2>
								<span class="image main"><img src="images/pic03.jpg" alt="" /></span>
								<p><?php echo $cek2["Y_hk"]?></p>
							</article>

						<!-- Contact -->
							<article id="contact">
								<h2 class="major">İletişim</h2>
								<form method="post" action="#contact">
									<div class="fields">
										<div class="field half">
											<label for="name">Ad Soyad</label>
											<input type="text" name="ML_adsoyad" id="name" />
										</div>
										<div class="field half">
											<label for="email">E-posta</label>
											<input type="text" name="ML_eposta" id="email" />
										</div>
										<div class="field">
											<label for="message">Mesaj</label>
											<textarea name="ML_metin" id="message" rows="4"></textarea>
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" name="veriekle"  value="Mesaj Gönder" class="primary" /></li>
										<li><input type="reset" value="Temizle" /></li>
									</ul>
								</form>
								<ul class="icons">
									<li><a href=<?php echo $cek["G_twitter"]?> class="icon fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href=<?php echo $cek["G_facebook"]?> class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href=<?php echo $cek["G_instagram"]?> class="icon fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href=<?php echo $cek["G_eposta"]?> class="icon fa-github"><span class="label">E-Posta</span></a></li>
								</ul>
							</article>

						<!-- Elements -->
							<article id="elements">
								<h2 class="major">Elements</h2>

								<section>
									<h3 class="major">Text</h3>
									<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
									This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
									This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
									<hr />
									<h2>Heading Level 2</h2>
									<h3>Heading Level 3</h3>
									<h4>Heading Level 4</h4>
									<h5>Heading Level 5</h5>
									<h6>Heading Level 6</h6>
									<hr />
									<h4>Blockquote</h4>
									<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
									<h4>Preformatted</h4>
									<pre><code>i = 0;

while (!deck.isInOrder()) {
    print 'Iteration ' + i;
    deck.shuffle();
    i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
								</section>

								<section>
									<h3 class="major">Lists</h3>

									<h4>Unordered</h4>
									<ul>
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>

									<h4>Alternate</h4>
									<ul class="alt">
										<li>Dolor pulvinar etiam.</li>
										<li>Sagittis adipiscing.</li>
										<li>Felis enim feugiat.</li>
									</ul>

									<h4>Ordered</h4>
									<ol>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis viverra.</li>
										<li>Felis enim feugiat.</li>
										<li>Dolor pulvinar etiam.</li>
										<li>Etiam vel felis lorem.</li>
										<li>Felis enim et feugiat.</li>
									</ol>
									<h4>Icons</h4>
									<ul class="icons">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
									</ul>

									<h4>Actions</h4>
									<ul class="actions">
										<li><a href="#" class="button primary">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions stacked">
										<li><a href="#" class="button primary">Default</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
								</section>

								<section>
									<h3 class="major">Table</h3>
									<h4>Default</h4>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>

									<h4>Alternate</h4>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Item One</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Two</td>
													<td>Vis ac commodo adipiscing arcu aliquet.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Three</td>
													<td> Morbi faucibus arcu accumsan lorem.</td>
													<td>29.99</td>
												</tr>
												<tr>
													<td>Item Four</td>
													<td>Vitae integer tempus condimentum.</td>
													<td>19.99</td>
												</tr>
												<tr>
													<td>Item Five</td>
													<td>Ante turpis integer aliquet porttitor.</td>
													<td>29.99</td>
												</tr>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
													<td>100.00</td>
												</tr>
											</tfoot>
										</table>
									</div>
								</section>

								<section>
									<h3 class="major">Buttons</h3>
									<ul class="actions">
										<li><a href="#" class="button primary">Primary</a></li>
										<li><a href="#" class="button">Default</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button">Default</a></li>
										<li><a href="#" class="button small">Small</a></li>
									</ul>
									<ul class="actions">
										<li><a href="#" class="button primary icon fa-download">Icon</a></li>
										<li><a href="#" class="button icon fa-download">Icon</a></li>
									</ul>
									<ul class="actions">
										<li><span class="button primary disabled">Disabled</span></li>
										<li><span class="button disabled">Disabled</span></li>
									</ul>
								</section>

								<section>
									<h3 class="major">Form</h3>
								</section>

							</article>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Tüm Hakları Saklıdır. Design: <a href="https://html5up.net">HTML5 UP</a>. By Coded <a href="https://lamiayazilim.com">Lamia Yazılım</a>. </p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
