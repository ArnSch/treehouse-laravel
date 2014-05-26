<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700" type="text/css">
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>

	<div class="header">

		<div class="wrapper">

			<h1 class="branding-title"><a href="/">Shirts 4 Mike</a></h1>

			<ul class="nav">
				<?php
				  /* list items with a class of "on" indicate the current section; those links 
				   * are underlined in the CSS to communicate that back to the site visitor;
				   * the $section variable is set in each individual file
				   */
				?>
				<li class="shirts"><a href="shirts/">Shirts</a></li>
				<li class="contact"><a href="contact/">Contact</a></li>
				<li class="search"><a href="search/">Search</a></li>
				<li class="cart"><a target="paypal" href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&amp;business=Q6NFNPFRBWR8S&amp;display=1">Shopping Cart</a></li>
			</ul>

		</div>

	</div>

	<div id="content">
	@yield('content')
	</div>

	<div class="footer">

		<div class="wrapper">

			<ul>		
				<li><a href="http://twitter.com/treehouse">Twitter</a></li>
				<li><a href="https://www.facebook.com/TeamTreehouse">Facebook</a></li>
			</ul>

			<p>&copy;<?php echo date('Y'); ?> Shirts 4 Mike</p>

		</div>
	
	</div>

</body>
</html>