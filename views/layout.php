<!doctype html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<base href="<?php echo $abs_url; ?>">
	<link rel="stylesheet" media="screen" href="assets/css/style.css">
	<title><?php if(isset($title)) { echo $this->escape($title) . ' - '; } ?>Mini Blog</title>
</head>
<body>
	<header id="header">
		<h1><a href="<?php echo $base_url; ?>/">Mini Blog</a></h1>
	</header>
	<nav>
		<ul>
			<?php if($session->isAuthenticated()): ?>
			<li><a href="<?php echo $base_url; ?>/">ホーム</a></li>
			<li><a href="<?php echo $base_url; ?>/account">アカウント</a></li>
			<?php else: ?>
			<li><a href="<?php echo $base_url; ?>/account/signin">ログイン</a></li>
			<li><a href="<?php echo $base_url; ?>/account/signup">アカウント登録</a></li>
			<?php endif; ?>
		</ul>
	</nav>
	<article>
		<?php echo $_content; ?>
	</article>
	<footer></footer>
</body>
</html>
