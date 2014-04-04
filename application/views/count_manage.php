<script>	
	$(document).ready(function() {		
	    gridRender('count');
	}); 	
</script>

<div id="container" class="col-md-8 col-md-offset-2">
	<h1 class="title">Manage Counts</h1>
	<hr/>
	
		<form method="post" action="#">
			
			<fieldset class="form-control" style="height:250px;">
				<legend>Search parameters:</legend>								
				<table>
					<tr>
						<td>
							Site Name:
						</td>
						<td>
							<input type="text" name="site_name" class="form-control" value="<?php echo $this->input->post('site_name');?>"/>
						</td>
					</tr>
					
					<tr>
						<td>
							Count:
						</td>
						<td >
							<input class="form-control" type="number" name="count_bigger" placeholder=">" value="<?php echo $this->input->post('count_bigger');?>" title="count bigger than"/>
						</td>
						<td >
							<input class="form-control" type="number" name="count_less" placeholder="<" value="<?php echo $this->input->post('count_less');?>" title="count smaller than"/>
						</td>
						
					</tr>
					
					<tr>
						<td>
							Date:
						</td>
											
						<td>							
							<input class="form-control" type="text" name="date_from" id="date_from" placeholder="from" value="<?php echo $this->input->post('date_from');?>" title="from date"/>
						</td>
						
						<td>
							<input class="form-control" type="text" name="date_to" id="date_to" placeholder="to" value="<?php echo $this->input->post('date_to');?>" title="to date"/>
						</td>						
					</tr>										
				</table>
				
				<input type="submit" class="btn btn-info" value="Search"/>
				<input type="reset" class="btn btn-default" value="Reset"/>
			</fieldset>
		</form>
		

		<div class="grid">
			<table id="count" action="<?php echo base_url();?>count/ajaxSearchSites?site_name=<?php echo $this->input->post('site_name');?>&count_bigger=<?php echo $this->input->post('count_bigger');?>&count_less=<?php echo $this->input->post('count_less');?>&date_from=<?php echo $this->input->post('date_from');?>&date_to=<?php echo $this->input->post('date_to');?>" dir="ltr">
				<tr>
					<th col="SiteName" type="text">Site name</th>
					<th col="Count"  type="text">Count</th>	
					<th col="Date" type="date">Date</th>
					<th col="Accepted" type="text">Is accepted</th>					
				</tr>										
			</table>	
		</div>

</div>


<script type="text/javascript">
	$('input#date_from').datepicker({
		format: "yyyy-mm-dd"
	});
	
	$('input#date_to').datepicker({
		format: "yyyy-mm-dd"
	});

</script>
