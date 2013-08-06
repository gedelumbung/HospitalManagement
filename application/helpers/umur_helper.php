<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('umur'))
{
	function umur($BirthDate)
	{
		 list($Month, $Day, $Year) = explode("/", $BirthDate);
 
		  $YearDiff = date("Y") - $Year;
		  $MonthDiff = date("m") - $Month;
		  $DayDiff = date("d") - $Day;
		 
		  if (date("m") < $Month || (date("m") == $Month && date("d") < $DayDiff)) {
		    $YearDiff--;
		  }
		  return $YearDiff;
	}
}
