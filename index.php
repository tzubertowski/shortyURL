<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>a.dr.es</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
		<div class="belka"></div>
			<div class="all_center">
			<h1>Cut the link:</h1>
				<div class="row">
					<form class="form-inline text-center" action="redirect.php" method="get" role="form">
						<div class="form-group">
							<label class="sr-only" for="Link">Link</label>
							<input class="form-control input-lg" name="url" type="url" placeholder="Link" required>
						</div>
						<div class="form-group">
							<label class="sr-only" for="Optional">Name</label>
							<input class="form-control input-lg" name="short" type="text" placeholder="Name">
						</div>
						<button class="btn btn-danger btn-lg" type="submit">
							<span class="glyphicon icon-resize-small"></span>
						</button>
					</form>
				</div>
			<?php
			include 'db.inc';




			?>
			</div>
			<script src="https://code.jquery.com/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</body>
</html>
