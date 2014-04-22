<script src="<?php echo base_url();?>js/count.js"></script>	

<script>	
	$(document).ready(function() {		
	    gridRender('count');
	}); 	
	
	
	$(document).ready(function() { $("#county_fips").select2(); });

	
							
</script>

<div id="container" class="col-md-8 col-md-offset-2">
	
	<div class="row">
			<div class="col-md-8">
				<h1 class="title">Manage Counts</h1>	
			</div>
			
				
			<div class="col-md-4">				
				<a href="<?php echo base_url();?>login_user/signout" class="btn btn-link" style="float:right">Logout</a>		
			</div>
	</div>
	
	
	<hr/>
	
		<form method="post" action="#">
			
			<fieldset class="form-control" style="height:300px;">
				<legend>Search parameters:</legend>								
				<table>
					<tr>
						<td>
							County:
						</td>
						<td>
							<select name="county_fips" id="county_fips" class="">															
								<?php 
									foreach($counties as $county)
									{
								?>
								<option value="<?php echo $county["CountyFIPS"];?>" <?php if($this->input->post('county_fips') == $county["CountyFIPS"]) echo "selected='true'";?>><?php echo $county["CountyName"];?></option>
								<?php
									}
								?>
								<option value="all" <?php if($this->input->post('county_fips') == "all") echo "selected='true'";?>>All</option>
							</select>
							
						</td>
					</tr>
					<tr>						
						<td>
							Site Name:
						</td>
						<td>
							<input type="text" name="site_name" id="site_name" class="form-control" value="<?php echo $this->input->post('site_name');?>"/>							
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
				
				<div class="row">
					<div class="col-md-12">
						<input type="submit" class="btn btn-info" value="Search" />
						<input type="button" class="btn btn-success" value="generate Excel file" onclick="generateExcel('<?php echo base_url();?>count/generateExcelReport','excel')"/>				
						<input type="button" class="btn btn-success" value="generate CSV file" onclick="generateExcel('<?php echo base_url();?>count/generateExcelReport','csv')"/>				
						<input type="reset" class="btn btn-link" value="Reset"/>
						<div id="generate_waiting"></div>
					</div>				
				</div>
				
				
				
			</fieldset>
		</form>
		
		<br/>

		<div class="grid">
			<table id="count" action="<?php echo base_url();?>count/ajaxSearchSites?county_fips=<?php echo $this->input->post('county_fips');?>&site_name=<?php echo $this->input->post('site_name');?>&count_bigger=<?php echo $this->input->post('count_bigger');?>&count_less=<?php echo $this->input->post('count_less');?>&date_from=<?php echo $this->input->post('date_from');?>&date_to=<?php echo $this->input->post('date_to');?>" dir="ltr">
				<tr>
					<th col="CountyName" type="text">County</th>
					<th col="SiteName" type="text">Site name</th>
					<th col="Count"  type="text">Count</th>	
					<th col="Date" type="date">Date</th>
					<th col="Accepted" type="text">Accepted</th>					
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
