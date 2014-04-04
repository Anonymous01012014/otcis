<div id="container" class="col-md-4 col-md-offset-4">
	<h1 class="title">Login</h1>
	<hr />
	<div id="status_message" style="display: none;">
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="hideMessage();">&times;</button>
			<?php
			$error =  validation_errors();
			 if($is_post_back) echo $error;
			 ?>
		</div>
	</div>
	<form method="post" action="<?php echo base_url();?>login_user/login" id="login" >
		<table>
			<tr>
				<td>
					<label for="username" id="username">User:</label>					
				</td>
				<td>
					<input type="text" class="form-control" name="username" id="username" required/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="password" id="password">Password:</label>
				</td>
				<td>
					<input type="password" class="form-control" name="password" id="password" required/>
				</td>
			</tr>
			<tr>
				<td>	
					<button type="submit" class="btn btn-info btn-lg" id="btn_login">
						<span class="glyphicon glyphicon-ok"></span> Enter
					</button>
				</td>
			</tr>
	</form>
	<!--<button id="on_fly">on fly</button>-->

</div>

<!--<div id="message1" class="jumbotron flyover flyover-centered">
   <h1>Hey!</h1>
   <p>
      This is the text to show in the message.
   </p>
   <button class="btn btn-primary">Dismiss</button>
</div> -->

<script>
	$(document).ready(function(){
		if(<?php
		 if($is_post_back && $error !== ""){ echo 'true';}
		 else {echo 'false';}
		 ?>){
			var error = $('#status_message div  p').html();
			$('#status_message div  p').remove();
			$('#status_message div').append(error);
			$('#status_message').slideDown();
		}
		$('button#on_fly').click(function(){
			$('#message1').toggleClass('in');
		});
		
	});
	
	
	
	function hideMessage(){
			$('#status_message').hide();
	}
</script>

