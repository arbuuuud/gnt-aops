<?php

class Video extends \Eloquent {

	protected $guarded = array();

	// Add your validation rules here
	public static $rules = [
		'title' => 'required',
		'slug' => 'required|alpha_dash|unique:videos',
        'image' => 'required|image',
        'file'  => 'required|mimes:mp4'
	];

	// Custom validation rules for store (update)
	public static function rules ($id=0, $merge=[]) {
        return array_merge(
            [
                'title' => 'required',
                'slug'  => 'required|alpha_dash|unique:videos,slug'.($id ? ",$id" : ''),
            ], 
        $merge);
    }

    public static $imagerules = [
        'image' => 'required|image'
    ];

    public static $videorules = [
        'file' => 'required|mimes:mp4'
    ];

	public function category()
    {
        return $this->belongsTo('Videocategory', 'video_category_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status','=','1');
    }

    public static function translateDate($date)
    {
        $convert_date = strtotime($date);
        // date('l, d F Y - H:i', strtotime($date));

        $day    = date("l", $convert_date);
        $daynum = date("d", $convert_date);
        $month  = date("F", $convert_date);
        $year   = date("Y", $convert_date);
        $hour   = date("H", $convert_date);
        $minute = date("i", $convert_date);
        $second = date("s", $convert_date);

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