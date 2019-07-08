<?php if( !empty( $error )){ ?>
	<div class="message_error message_div" style="background: transparent;">
		<p class="text-center" style="color: red;"> <?php echo $error; ?> </p>
	</div>
<?php } ?>

<?php if( !empty( $success )){ ?>
	<div class="message_success message_div" style="background: transparent;">
		<p class="text-center" style="color: green;"> <?php echo $success; ?> </p>
	</div>
<?php } ?>

<?php if( !empty( $success ) || !empty( $error ) ){ ?>
	<script>
		$(document).ready(function(){
			$('.message_div').delay(5000).slideUp();
		});
    </script>
<?php } ?>
