@extends('shop/layout')

@section('content')
<div class="section shirts search page">

		<div class="wrapper">

			<h1>Search</h1>

			<form method="get" action="./">
				<?php // pre-populate the current search term in the search box; ?>
				<?php // if a search hasn't been performed, then that search term ?>
				<?php // will be blank and the box will look empty ?>
				<input type="text" name="s" value="<?php echo htmlspecialchars($search_term); ?>">
				<input type="submit" value="Go">
			</form>

			<?php // if a search has been performed ... ?>
			<?php if ($search_term != "") : ?>

				<?php // if there are products found that match the search term, display them; ?>
				<?php // otherwise, display a message that none were found ?>
				<?php if (!empty($products)) : ?>
					<ul class="products">
						<?php
							foreach ($products as $product) {
	                            include(ROOT_PATH . "inc/partial-product-list-view.html.php");
							}
						?>
					</ul>
				<?php else: ?>
					<p>No products were found matching that search term.</p>
				<?php endif; ?>

			<?php endif; ?>

		</div>

	</div>
@stop