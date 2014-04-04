<?php
	//if there is no acrive menu variable so leave it empty
	if(!isset($active_menu))
	{
		$active_menu =  "";
	}
?>


<div id="main-menu" class="row">
	<ul class="col-md-6 col-md-offset-2">
		<li><a href="<?php echo base_url();?>dashboard" class="<?php if($active_menu == "dashboard") echo 'active';?>">Dashboard</a></li>
		<li><a href="<?php echo base_url();?>site/add"  class="<?php if($active_menu == "site_add") echo 'active';?>">Add Site</a></li>
		<li><a href="<?php echo base_url();?>cases/add" class="<?php if($active_menu == "case_add") echo 'active';?>">Open Case</a></li>
		<li><a href="<?php echo base_url();?>cases/addClosed" class="<?php if($active_menu == "case_add_closed") echo 'active';?>">Close Case</a></li>
		<li><a href="#" class="<?php if($active_menu == "about") echo 'active';?>">About</a></li>
		<li><a href="#" class="<?php if($active_menu == "help") echo 'active';?>">Help</a></li>
	</ul>
	

	<ul class="col-md-3">
		<li>Hello, <a href="#" class="active"><?php echo $user_data['first_name'];?></a></li>	
		<li><a href="<?php echo base_url();?>login_user/signout" class="">Sign out</a></li>						
	</ul>
	
</div>	
<script>
	$(document).ready(function(){
		fixLayout();
		$(window).on("resize", fixLayout);
	});
	function fixLayout(){
		$('div#log div.jspContainer').css('width','100%');
		$('div#log div.scroll-pane').css('width','100%');
		$('div#log div.jspPane').css('width','100%');
		var width = $(window).width();
		if(width >=1130){
			$('div#main-menu').css('height','50px');
		}else{
			if(width <1130){
				$('div#main-menu').css('height','65px');
				$('div#logo').css('margin-top','35px');
			}if(width <780){
				$('div#main-menu').css('height','80px');
				$('div#logo').css('margin-top','50px');
			}if(width <315){
				$('div#main-menu').css('height','100px');
				$('div#logo').css('margin-top','70px');
		}if(width <250){
				$('div#main-menu').css('height','120px');
				$('div#logo').css('margin-top','90px');
		}
	}
	}
</script>
