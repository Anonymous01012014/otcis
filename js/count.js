/**
 * @author Mohanad Kaleia
 * 
 * File name: count.js
 * Description: 
 * this file contain functions 
 * 
 * created date : 4-4-2014  
 */

function generateExcel(excel_url)
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
			  url: excel_url,			   
			  cache: false,
			  data:{
				county_fips:county_fips,  			  	
		  		site_name:site_name ,
		  		counts_from:counts_from ,
		  		counts_to:counts_to , 		  		
		  		date_from:date_from,
		  		date_to:date_to
		  		},	
		  	  beforeSend: function(){},		  				  		
			  success: function(result){					  
				  window.location.href = window.location.origin + "/otcis/files/report.xlsx";
			  },
			  complete: function(){},					
			  error: function(){}			  	
			  });
	  
	  
	
}