<html>
<head>
	<title>home</title>
	<link rel="stylesheet" href="/css/style.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700" type="text/css">
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>

	<div class="header">

		<div class="wrapper">

			<h1 class="branding-title"><a href="/">Shirts 4 Mike</a></h1>

			<ul class="nav">
				<li class="shirts">{{ link_to_route('products.index', "Shirts" )}}</li>
				<li class="contact">{{ link_to_route('contact', "Contact" )}}</li>
				<li class="search">{{ link_to_route('products.index', "Search" )}}</li>
				<li class="login">{{ link_to_route('login', "Login" )}}</li>
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