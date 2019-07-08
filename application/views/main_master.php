<!DOCTYPE html>
<html lang="nl">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>oSoc19 - Budget Data</title>

	<?php echo pasStylesheetAan("bootstrap.css"); ?>
	<?php echo pasStylesheetAan("style.css"); ?>

	<?php echo haalJavascriptOp("scroll.js"); ?>
	<?php echo haalJavascriptOp("jquery-3.3.1.js"); ?>
	<?php echo haalJavascriptOp("bootstrap.bundle.js"); ?>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	<script>
		var site_url = '<?php echo site_url(); ?>';
		var base_url = '<?php echo base_url(); ?>';

	</script>
</head>

<body>


	<?php echo $inhoud; ?>

	<div id="upload-form" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Please enter a password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
				</div>
				<?php $attributes = array('name' => 'upload-form'); ?>
				<?php echo form_open('upload/checkPassword', $attributes) ?>
				<div class="modal-body">
					<input type="password" name="password-input" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Go to upload</button>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

</body>

</html>
