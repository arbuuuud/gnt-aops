<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $guarded = array();

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	// Add your validation rules here
	public static $rules = [
		'username'					=> 'required',
		'name'						=> 'required',
		'password'					=> 'required|min:6|confirmed',
		'password_confirmation'		=> 'required|min:6',
		
	];

	public function roleString(){
		if($this->role_id==1){
			return "admin";
		}else{
			return "member";
		}
	}
	public function isAdmin(){
		if($this->role_id==1){
			return true;
		}else{
			return false;
		}
	}
	public function role()
    {
        return $this->belongsTo('Role');
    }

    public static function translateDate($date)
    {
    	$convert_date = strtotime($date);
    	// date('l, d F Y - H:i', strtotime($date));

    	$day    = date("l", $convert_date);
    	$daynum = date("d", $convert_date);
		$month  = date("F", $convert_date);
		$year	= date("Y", $convert_date);
		$hour	= date("H", $convert_date);
		$minute	= date("i", $convert_date);
		$second	= date("s", $convert_date);

		switch($day)
		{
			case "Monday":    $day = "Senin";  break;
			case "Tuesday":   $day = "Selasa"; break;
			case "Wednesday": $day = "Rabu";  break;
			case "Thursday":  $day = "Kamis"; break;
			case "Friday":    $day = "Jumat";  break;
			case "Saturday":  $day = "Sabtu";  break;
			case "Sunday":    $day = "Minggu";  break;
			default:          $day = "Unknown"; break;
		}

		switch($month)
		{
			case "January":   $month = "Januari";    break;
			case "February":  $month = "Februari";   break;
			case "March":     $month = "Maret";     break;
			case "April":     $month = "April";     break;
			case "May":       $month = "Mei";       break;
			case "June":      $month = "Juni";      break;
			case "July":      $month = "Juli";      break;
			case "August":    $month = "Agustus";    break;
			case "September": $month = "September"; break;
			case "October":   $month = "Oktober";   break;
			case "November":  $month = "November";  break;
			case "December":  $month = "Desember";  break;
			default:          $month = "Unknown";   break;
		}

		return $day . ", " . $daynum . " " . $month . " " . $year . " - " . $hour . ":" . $minute;
    }

}
