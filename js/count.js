/**
 * @author Mohanad Kaleia
 * 
 * File name: count.js
 * Description: 
 * this file contain functions 
 * 
 * paramters:
 * excel_url: the php function to ba called via ajax
 * created date : 4-4-2014  
 */

function generateExcel(excel_url , extension)
{	
	/** send the data to the page so it can be download the excel file immediatly **/
	

	//search paramters;
	county_fips = $("#county_fips").val();
	site_name 	= $("#site_name").val();
	counts_from = $("#count_bigger").val();
	counts_to 	= $("#count_less").val();
	date_from 	= $("#date_from").val();
	date_to 	= $("#date_to").val();
	
	//alert(excel_url + "?site_name="+site_name+"&count_bigger="+"&count_less="+counts_to+"&date_from="+date_from+"&date_to="+date_to);
	
	//windows.location.href = excel_url + "?site_name="+site_name+"&counts_from="+"&counts_to="+counts_to+"&date_from="+date_from+"&date_to="+date_to;
	
	$.ajax({
			  type: "POST",
			  url: excel_url +"/"+extension,			   
			  cache: false,
			  data:{
				county_fips:county_fips,  			  	
		  		site_name:site_name ,
		  		counts_from:counts_from ,
		  		counts_to:counts_to , 		  		
		  		date_from:date_from,
		  		date_to:date_to
		  		},	
		  	  beforeSend: function(){
					  load_spinner = "<img width='25px' height='25px' id='generate_waiting_loader' src='images/spinner.gif' width='100px'/>"
					  $("#generate_waiting").append(load_spinner);
				  },		  				  		
			  success: function(result){					  
				  if(extension == "excel")
					window.location.href = window.location.origin + "/otcis/files/report.xlsx";
				  else
					window.location.href = window.location.origin + "/otcis/files/report.csv";
			  },
			  complete: function(){
					//hide loading spinner
					$("#generate_waiting_loader").remove();				  
				  },					
			  error: function(){}			  	
			  });
	  
	  
	
}
