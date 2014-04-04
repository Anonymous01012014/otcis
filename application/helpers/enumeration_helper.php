<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

	/**
	 * Helper file name : enumeration
	 * 
	 * Description :
	 * This file contains constants and functions to deal with enumerated values in the program.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 */    

	/**
	 * Case Status
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 * case states.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	const OPENED = 0;
	const CLOSED_NORMALLY = 1;
	const CLOSED_MANUALLY = 2;
	const ACCEPTED_CLOSED = 3;
	const REJECTED_CLOSED = 4;

	/**
	 * Function name:
	 * case_status_text
	 * 
	 * Description :
	 * This function returns the text representation of the case status
	 * determined by the given number.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	function case_status_text($state_number){
		switch($state_number){
			case OPENED:
			return "Opened";
			break;
			case CLOSED_NORMALLY:
			return "Closed Normally";
			break;
			case CLOSED_MANUALLY:
			return "Closed Manually";
			break;
			case ACCEPTED_CLOSED:
			return "Accepted Closed";
			break;
			case REJECTED_CLOSED:
			return "Rejected Closed";
			break;
		}
	}


	/**
	 * Site FIPS
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 * FIPS field (Counties) of the site.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	const Alabama = 1;
	const Alaska = 2;
	const Arizona = 4;
	const Arkansas = 5;
	const California = 6;
	const Colorado = 8;
	const Connecticut = 9;
	const Delaware = 10;
	const DC = 11;
	const Florida = 12;
	const Georgia = 13;
	const Hawaii = 15;
	const Idaho = 16;
	const Illinois = 17;
	const Indiana = 18;
	const Iowa = 19;
	const Kansas = 20;
	const Kentucky = 21;
	const Louisiana = 22;
	const Maine = 23;
	const Maryland = 24;
	const Massachusetts = 25;
	const Michigan = 26;
	const Minnesota = 27;
	const Mississippi = 28;
	const Missouri = 29;
	const Montana = 30;
	const Nebraska = 31;
	const Nevada = 32;
	const New_Hampshire = 33;
	const New_Jersey = 34;
	const New_Mexico = 35;
	const New_York = 36;
	const North_Carolina = 37;
	const North_Dakota = 38;
	const Ohio = 39;
	const Oklahoma = 40;
	const Oregon = 41;
	const Pennsylvania = 42;
	const Rhode_Island = 44;
	const South_Carolina = 45;
	const South_Dakota = 46;
	const Tennessee = 47;
	const Texas = 48;
	const Utah = 49;
	const Vermont = 50;
	const Virginia = 51;
	const Washington = 53;
	const West_Virginia = 54;
	const Wisconsin = 55;
	const Wyoming = 56;

	/**
	 * Function name:
	 * FIPS_text
	 * 
	 * Description :
	 * This function returns the text representation of the FIPS
	 * determined by the given number.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	function FIPS_text($FIPS_number){
		switch($FIPS_number){
			case Alabama:
			return "Alabama";
			break;
			case Alaska:
			return "Alaska";
			break;
			case Arizona:
			return "Arizona";
			break;
			case Arkansas:
			return "Arkansas";
			break;
			case California:
			return "California";
			break;
			case Colorado:
			return "Colorado";
			break;
			case Connecticut:
			return "Connecticut";
			break;
			case Delaware:
			return "Delaware";
			break;
			case DC:
			return "DC";
			break;
			case Florida:
			return "Florida";
			break;
			case Georgia:
			return "Georgia";
			break;
			case Hawaii:
			return "Hawaii";
			break;
			case Idaho:
			return "Idaho";
			break;
			case Illinois:
			return "Illinois";
			break;
			case Indiana:
			return "Indiana";
			break;
			case Iowa:
			return "Iowa";
			break;
			case Kansas:
			return "Kansas";
			break;
			case Kentucky:
			return "Kentucky";
			break;
			case Louisiana:
			return "Louisiana";
			break;
			case Maine:
			return "Maine";
			break;
			case Maryland:
			return "Maryland";
			break;
			case Massachusetts:
			return "Massachusetts";
			break;
			case Michigan:
			return "Michigan";
			break;
			case Minnesota:
			return "Minnesota";
			break;
			case Mississippi:
			return "Mississippi";
			break;
			case Missouri:
			return "Missouri";
			break;
			case Montana:
			return "Montana";
			break;
			case Nebraska:
			return "Nebraska";
			break;
			case Nevada:
			return "Nevada";
			break;
			case New_Hampshire:
			return "New_Hampshire";
			break;
			case New_Jersey:
			return "New_Jersey";
			break;
			case New_Mexico:
			return "New_Mexico";
			break;
			case New_York:
			return "New_York";
			break;
			case North_Carolina:
			return "North_Carolina";
			break;
			case North_Dakota:
			return "North_Dakota";
			break;
			case Ohio:
			return "Ohio";
			break;
			case Oklahoma:
			return "Oklahoma";
			break;
			case Oregon:
			return "Oregon";
			break;
			case Pennsylvania:
			return "Pennsylvania";
			break;
			case Rhode_Island:
			return "Rhode_Island";
			break;
			case South_Carolina:
			return "South_Carolina";
			break;
			case South_Dakota:
			return "South_Dakota";
			break;
			case Tennessee:
			return "Tennessee";
			break;
			case Texas:
			return "Texas";
			break;
			case Utah:
			return "Utah";
			break;
			case Vermont:
			return "Vermont";
			break;
			case Virginia:
			return "Virginia";
			break;
			case Washington:
			return "Washington";
			break;
			case West_Virginia:
			return "West_Virginia";
			break;
			case Wisconsin:
			return "Wisconsin";
			break;
			case Wyoming:
			return "Wyoming";
			break;
		}
	}

	
	/**
	 * Site Functional Classes
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 * Functional class field of the site.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	 const Interstate_rural = 1;
	 const Interstate_Urban = 2;
	 const Principal_Arterial_Other_Freeways_Rural = 3;
	 const Principal_Arterial_Other_Freeways_Urban = 4;
	 const Principal_Arterial_Other_Rural = 5;
	 const Principal_Arterial_Other_Urban = 6;
	 const Minor_Arterial_Rural = 7;
	 const Minor_Arterial_Urban = 8;
	 const Major_Collector_Rural = 9;
	 const Major_Collector_Urban = 10;
	 const Minor_Collector_Rural = 11;
	 const Minor_Collector_Urban  = 12;
	 const Local_Rural = 13;
	 const Local_Urban = 14;

	/**
	 * Function name:
	 * functional_class_text
	 * 
	 * Description :
	 * This function returns the text representation of the functional
	 * class determined by the given number.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	function functional_class_text($functional_class_number){
		switch($functional_class_number){
			case Interstate_rural:
			return "Interstate Rural";
			break;
			case Interstate_Urban:
			return "Interstate Urban";
			break;
			case Principal_Arterial_Other_Freeways_Rural:
			return "Principal Arterial Other Freeways Rural";
			break;
			case Principal_Arterial_Other_Freeways_Urban:
			return "Principal Arterial Other Freeways Urban";
			break;
			case Principal_Arterial_Other_Rural:
			return "Principal Arterial Other Rural";
			break;
			case Principal_Arterial_Other_Urban:
			return "Principal Arterial Other Urban";
			break;
			case Minor_Arterial_Rural:
			return "Minor Arterial Rural";
			break;
			case Minor_Arterial_Urban:
			return "Minor Arterial Urban";
			break;
			case Major_Collector_Rural:
			return "Major Collector Rural";
			break;
			case Major_Collector_Urban:
			return "Major Collector Urban";
			break;
			case Minor_Collector_Rural:
			return "Minor Collector Rural";
			break;
			case Minor_Collector_Urban:
			return "Minor Collector Urban";
			break;
			case Local_Rural:
			return "Local Rural";
			break;
			case Local_Urban:
			return "Local Urban";
			break;
		}
	}


	/**
	 * Lane Number
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 * lane number in the site.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	const Lane1 = 1;
	const Lane2 = 2;
	const Lane3 = 3;
	const Lane4 = 4;
	const Lane5 = 5;
	const Lane6 = 6;
	const Lane7 = 7;
	const Lane8 = 8;
	const Lane9 = 9;
	const Lane10 = 10;
	const Lane11 = 11;
	const Lane12 = 12;
	const Lane13 = 13;
	const Lane14 = 14;
	const Lane15 = 15;
	const Lane16 = 16;

	/**
	 * Function name:
	 * lane_number_text
	 * 
	 * Description :
	 * This function returns the text representation of the lane number
	 * determined by the given number.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	 function lane_number_text($lane_number){
		switch ($lane_number){
			case Lane1:
			return "Lane 1";
			break;
			case Lane2:
			return "Lane 2";
			break;
			case Lane3:
			return "Lane 3";
			break;
			case Lane4:
			return "Lane 4";
			break;
			case Lane5:
			return "Lane 5";
			break;
			case Lane6:
			return "Lane 6";
			break;
			case Lane7:
			return "Lane 7";
			break;
			case Lane8:
			return "Lane 8";
			break;
			case Lane9:
			return "Lane 9";
			break;
			case Lane10:
			return "Lane 10";
			break;
			case Lane11:
			return "Lane 11";
			break;
			case Lane12:
			return "Lane 12";
			break;
			case Lane13:
			return "Lane 13";
			break;
			case Lane14:
			return "Lane 14";
			break;
			case Lane15:
			return "Lane 15";
			break;
			case Lane16:
			return "Lane 16";
			break;
		}
	 }
	 
	 
	 /**
	 * Lane Direction
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 *  lane direction in the site.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	 const NoDirection = 0;
	 const North = 1;
	 const NorthEast = 2;
	 const East = 3;
	 const SouthEast = 4;
     const South = 5;
	 const SouthWest = 6;
	 const West = 7;
	 const NorthWest = 8;

	/**
	 * Function name:
	 * lane_direction_text
	 * 
	 * Description :
	 * This function returns the text representation of the 
	 * lane direction determined by the given number.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	 function lane_direction_text($lane_direction){
		switch ($lane_direction){
			case NoDirection:
			return "No Direction";
			break;
			case North:
			return "North";
			break;
			case NorthEast:
			return "North East";
			break;
			case East:
			return "East";
			break;
			case SouthEast:
			return "South East";
			break;
			case South:
			return "South";
			break;
			case SouthWest:
			return "South West";
			break;
			case West:
			return "West";
			break;
			case NorthWest:
			return "North West";
			break;
		}
	 }
	 
	 /**
	 * Function name:
	 * lane_direction_enum
	 * 
	 * Description :
	 * This function returns the number representation of the 
	 * lane direction determined by the given text.
	 * 
	 * Created date ; 24-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	 function lane_direction_enum($lane_direction){
		switch ($lane_direction){
			case "No Direction":
			return NoDirection;
			break;
			case "North":
			return North;
			break;
			case "North East":
			return NorthEast;
			break;
			case "East":
			return East;
			break;
			case "South East":
			return SouthEast;
			break;
			case "South":
			return South;
			break;
			case "South West":
			return SouthWest;
			break;
			case "West":
			return West;
			break;
			case "North West":
			return NorthWest;
			break;
			default:
			return NoDirection;
			break;
		}
	 }
	 
	 /**
	 * Lane Sensor Type
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 * lane sensor type in the site.
	 * 
	 * Created date ; 14-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	 const Single_Axle = 0;
	 const Axle_Axle = 1;
	 const User_Keypress = 2;
	 
	/**
	 * Function name:
	 * lane_sensor_text
	 * 
	 * Description :
	 * This function returns the text representation of the 
	 * lane sensor type determined by the given number.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	 function lane_sensor_text($lane_sensor){
		switch ($lane_sensor){
			case Single_Axle:
			return "Single Axle";
			break;
			case Axle_Axle:
			return "Axle Axle";
			break;
			case User_Keypress:
			return "User Keypress";
			break;
		}
	 }
	 
	 
	 /**
	 * Function name:
	 * lane_sensor_enum
	 * 
	 * Description :
	 * This function returns the  of the enumeration of the
	 * lane sensor type determined by the given text representation.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	 function lane_sensor_enum($lane_sensor){
		switch ($lane_sensor){
			case "A":
			return Single_Axle;
			break;
			case "A-A":
			return Axle_Axle;
			break;
			default:
			return User_Keypress;
			break;
		}
	 }
	 
	 
	 /**
	 * Lane Count Method
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 * count method of the lane.
	 * 
	 * Created date ; 14-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	 const Divided_By_2 = 0;
	 const One_Count_per_Car = 1;
	 const Blank = 2;
	 
	/**
	 * Function name:
	 * count_method_text
	 * 
	 * Description :
	 * This function returns the text representation of the 
	 * count method determined by the given number.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	 function count_method_text($count_method){
		switch ($count_method){
			case Divided_By_2:
			return "Divided By 2";
			break;
			case One_Count_per_Vehicle:
			return "One Count per Vehicle";
			break;
			//Blank = Don't divide by 2.
			case Blank:
			return "Blank";
			break;
		}
	 }
	 
	 
	 /**
	 * Function name:
	 * count_method_enum
	 * 
	 * Description :
	 * This function returns the  of the enumeration of the
	 * count method determined by the given text representation.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	 function count_method_enum($count_method){
		switch ($count_method){
			case "/2":
			return Divided_By_2;
			break;
			case "PV":
			return One_Count_per_Vehicle;
			break;
			default:
			return Blank;
			break;
		}
	 }
	 
	 
	 /**
	 * Lane Mode
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 * lane mode in the site.
	 * 
	 * Created date ; 14-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	 const Normal = 0;
	 const Subtract = 1;
	 const Directional = 2;
	 
	/**
	 * Function name:
	 * lane_mode_text
	 * 
	 * Description :
	 * This function returns the text representation of the 
	 * lane mode determined by the given number.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	 function lane_mode_text($lane_mode){
		switch ($lane_mode){
			case Normal:
			return "Normal";
			break;
			case Subtract:
			return "Subtract";
			break;
			case Directional:
			return "Directional";
			break;
		}
	 }
	 
	 
	 /**
	 * Function name:
	 * lane_mode_enum
	 * 
	 * Description :
	 * This function returns the  of the enumeration of the
	 * lane mode determined by the given text representation.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	 function lane_mode_enum($lane_mode){
		switch ($lane_mode){
			case "Normal":
			return Normal;
			break;
			case "Subtract":
			return Subtract;
			break;
			case "Directional":
			return Directional;
			break;
		}
	 }
	 
	 
	 
	 
	 /**
	 * FHWA Speed Categories 
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 * FHWA speed categories.
	 * 
	 * Created date ; 14-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	const mph_SlowerThan10 = 1; 
	const mph_SlowerThan15 = 2; 
	const mph_SlowerThan20 = 3; 
	const mph_11_15 = 4;
	const mph_16_20 = 5;
	const mph_21_25 = 6;
	const mph_26_30 = 7; 
	const mph_31_35 = 8;
	const mph_36_40 = 9; 
	const mph_41_45 = 10;
	const mph_46_50 = 11; 
	const mph_51_55 = 12;
	const mph_56_60 = 13; 
	const mph_61_65 = 14;
	const mph_66_70 = 15; 
	const mph_71_75 = 16;
	const mph_76_80 = 17; 
	const mph_81_85 = 18;
	const mph_86_90 = 19; 
	const mph_91_95 = 20;
	const mph_96_100 = 21; 
	const mph_101_105 = 22;
	const mph_106_110 = 23; 
	const mph_111_115 = 24;
	const mph_116_120 = 25; 
	const mph_121_125 = 26;
	const mph_126_130 = 27; 
	const mph_131_135 = 28; 
	const mph_FasterThan85 = 29; 
	const mph_FasterThan90 = 30;
	const mph_FasterThan95 = 31; 
	const mph_FasterThan100 = 32;
	const mph_FasterThan105 = 33;
	const mph_FasterThan110 = 34; 
	const mph_FasterThan115 = 35;
	const mph_FasterThan120 = 36;
	const mph_FasterThan125 = 37;
	const mph_FasterThan130 = 38;
	const mph_FasterThan135 = 39;


	/**
	 * Function name:
	 * case_status_text
	 * 
	 * Description :
	 * This function returns the text representation of the case status
	 * determined by the given number.
	 * 
	 * Created date ; 12-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	function FHWA_speed_text($state_number){
		switch($state_number){
			case mph_SlowerThan10:
			return "Slower Than 10 mph";
			break;
			case mph_SlowerThan15:
			return "Slower Than 15 mph";
			break;
			case mph_SlowerThan20:
			return "Slower Than 20 mph";
			break; 
			case mph_11_15:
			return "11 to 15 mph";
			break;
			case mph_16_20:
			return "16 to 20 mph";
			break;
			case mph_21_25:
			return "21 to 25 mph";
			break;
			case mph_26_30:
			return "26 to 30 mph";
			break;
			case mph_31_35:
			return "31 to 35 mph";
			break; 
			case mph_36_40:
			return "36 to 40 mph";
			break;
			case mph_41_45:
			return "41 to 45 mph";
			break; 
			case mph_46_50:
			return "46 to 50 mph";
			break;
			case mph_51_55:
			return "51 to 55 mph";
			break;
			case mph_56_60:
			return "56 to 60 mph";
			break;
			case mph_61_65:
			return "61 to 65 mph";
			break;
			case mph_66_70:
			return "66 to 70 mph";
			break;
			case mph_71_75:
			return "71 to 75 mph";
			break;
			case mph_76_80:
			return "76 to 80 mph";
			break;
			case mph_81_85:
			return "81 to 85 mph";
			break; 
			case mph_86_90:
			return "86 to 90 mph";
			break;
			case mph_91_95:
			return "91 to 95 mph";
			break;
			case mph_96_100:
			return "96 to 100 mph";
			break;
			case mph_101_105:
			return "101 to 105 mph";
			break;
			case mph_106_110:
			return "106 to 110 mph";
			break;
			case mph_111_115:
			return "111 to 115 mph";
			break; 
			case mph_116_120:
			return "116 to 120 mph";
			break;
			case mph_121_125:
			return "121 to 125 mph";
			break; 
			case mph_126_130:
			return "126 to 130 mph";
			break;
			case mph_131_135:
			return "131 to 135 mph";
			break; 
			case mph_FasterThan85:
			return "Faster Than 85 mph";
			break; 
			case mph_FasterThan90:
			return "Faster Than 90 mph";
			break; 
			case mph_FasterThan95:
			return "Faster Than 95 mph";
			break;
			case mph_FasterThan100:
			return "Faster Than 100 mph";
			break;
			case mph_FasterThan105:
			return "Faster Than 105 mph";
			break;
			case mph_FasterThan110:
			return "Faster Than 110 mph";
			break;
			case mph_FasterThan115:
			return "Faster Than 115 mph";
			break;
			case mph_FasterThan120:
			return "Faster Than 120 mph";
			break;
			case mph_FasterThan125:
			return "Faster Than 125 mph";
			break;
			case mph_FasterThan130:
			return "Faster Than 130 mph";
			break;
			case mph_FasterThan135:
			return "Faster Than 135 mph";
			break;
		}
	}
		
		/**
		 * FHWA Classes
		 **/
		 
		/**
		 * Constants
		 * 
		 * Description :
		 * These constants are the number representation of
		 * FHWA class.
		 * 
		 * Created date ; 12-2-2014
		 * Modification date : ---
		 * Modfication reason : ---
		 * Author : Ahmad Mulhem Barakat
		 * contact : molham225@gmail.com
		 * 
		 **/
		const Class1 = 1;
		const Class2 = 2;
		const Class3 = 3;
		const Class4 = 4;
		const Class5 = 5;
		const Class6 = 6;
		const Class7 = 7;
		const Class8 = 8;
		const Class9 = 9;
		const Class10 = 10;
		const Class11 = 11;
		const Class12 = 12;
		const Class13 = 13;
		const Class14 = 14;
		const Class15 = 15;

		/**
		 * Function name:
		 * FHWA_class_text
		 * 
		 * Description :
		 * This function returns the text representation of the FHWA class
		 * determined by the given number.
		 * 
		 * Created date ; 12-2-2014
		 * Modification date : ---
		 * Modfication reason : ---
		 * Author : Ahmad Mulhem Barakat
		 * contact : molham225@gmail.com
		 **/
		function FHWA_class_text($class_number){
			switch($class_number){
				case Class1:
				return "Class 1";
				break;
				case Class2:
				return "Class 2";
				break;
				case Class3:
				return "Class 3";
				break;
				case Class4:
				return "Class 4";
				break;
				case Class5:
				return "Class 5";
				break;
				case Class6:
				return "Class 6";
				break;
				case Class7:
				return "Class 7";
				break;
				case Class8:
				return "Class 8";
				break;
				case Class9:
				return "Class 9";
				break;
				case Class10:
				return "Class 10";
				break;
				case Class11:
				return "Class 11";
				break;
				case Class12:
				return "Class 12";
				break;
				case Class13:
				return "Class 13";
				break;
				case Class14:
				return "Class 14";
				break;
				case Class15:
				return "Class 15";
				break;
			}
		}


	/**
	 * Storage Mode
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 * storage mode.
	 * 
	 * Created date ; 23-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	const COUNT = 0;
	const AXLE_CLASSIFICATION = 1;
	const SPEED_CLASSIFICATION = 2;
	const PER_VEHICLE = 3;

	/**
	 * Function name:
	 * storage_mode_text
	 * 
	 * Description :
	 * This function returns the text representation of the storage
	 * determined by the given number.
	 * 
	 * Created date ; 23-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	function storage_mode_text($storage_mode){
		switch($storage_mode){
			case COUNT:
			return "COUNT";
			break;
			case AXLE_CLASSIFICATION:
			return "AxleClassification";
			break;
			case SPEED_CLASSIFICATION:
			return "SpeedClassification";
			break;
			case PER_VEHICLE:
			return "PER VEHICLE";
			break;
		}
	}

	/**
	 * Function name:
	 * storage_mode_enum
	 * 
	 * Description :
	 * This function returns the number representation of the storage
	 * determined by the given text.
	 * 
	 * Created date ; 23-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	function storage_mode_enum($storage_mode){
		switch($storage_mode){
			case "COUNT":
			return COUNT;
			break;
			case "AxleClassification":
			return AXLE_CLASSIFICATION;
			break;
			case "SpeedClassification":
			return SPEED_CLASSIFICATION;
			break;
			case "PER VEHICLE":
			return PER_VEHICLE;
			break;
		}
	}

	
	
	/**
	 * Classification Type
	 **/
	 
	/**
	 * Constants
	 * 
	 * Description :
	 * These constants are the number representation of
	 * classification types.
	 * 
	 * Created date ; 23-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 * 
	 **/
	const AXLE = 1;
	const SPEED = 2;
	const LENGTH = 3;
	const GAP = 4;
	const HEADWAY = 5;

	/**
	 * Function name:
	 * classification_type_text
	 * 
	 * Description :
	 * This function returns the text representation of the classification
	 * type determined by the given number.
	 * 
	 * Created date ; 23-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	function classification_type_text($type){
		switch($type){
			case AXLE:
			return "Axle";
			break;
			case SPEED:
			return "speed";
			break;
			case LENGTH:
			return "length";
			break;
			case GAP:
			return "Gap";
			break;
			case HEADWAY:
			return "Headway";
			break;
		}
	}

	/**
	 * Function name:
	 * classification_type_enum
	 * 
	 * Description :
	 * This function returns the number representation of the classification
	 * type determined by the given text.
	 * 
	 * Created date ; 23-2-2014
	 * Modification date : ---
	 * Modfication reason : ---
	 * Author : Ahmad Mulhem Barakat
	 * contact : molham225@gmail.com
	 **/
	function classification_type_enum($type){
		switch($type){
			case "1":
			return AXLE;
			break;
			case "2":
			return SPEED;
			break;
			case "3":
			return LENGTH;
			break;
			case "4":
			return GAP;
			break;
			case "5":
			return HEADWAY;
			break;
		}
	}

