<?php

class Page extends \Eloquent {

    protected $guarded = array();

	// Add your validation rules here
	public static $rules = [
		'title' => 'required',
        'slug'  => 'required|alpha_dash|unique:pages|',
	];

    // Custom validation rules for store (update)
    public static function rules ($id=0, $merge=[]) {
        return array_merge(
            [
                'title' => 'required',
                'slug'  => 'required|alpha_dash|unique:pages,slug'.($id ? ",$id" : ''),
            ], 
        $merge);
    }

	public function parent()
    {
        return $this->belongsTo('Page', 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany('Page', 'parent_id');
    }

    public function documents()
    {
        return $this->morphMany('Document', 'documentable');
    }

    public function scopeFindBySlug($query, $slug)
    {
    	return $query->whereSlug($slug);
    }

    public function scopePublished($query)
    {
        return $query->whereStatus('1');
    }

    public function generateLink()
    {
        return 'pages';
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