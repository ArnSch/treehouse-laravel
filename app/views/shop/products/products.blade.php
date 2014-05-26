@extends('shop/layout')

@section('content')
<div class="section shirts page">

			<div class="wrapper">

				<h1>Mike&rsquo;s Full Catalog of Shirts</h1>

				<?php include(ROOT_PATH . "inc/partial-list-navigation.html.php"); ?>

				<ul class="products">
					<?php
						foreach($products as $product) {
							include(ROOT_PATH . "inc/partial-product-list-view.html.php");
						}
					?>
				</ul>

				<?php include(ROOT_PATH . "inc/partial-list-navigation.html.php"); ?>

			</div>

		</div>
@stop