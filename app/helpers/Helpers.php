<?php
class Helpers {
    public static function doMessage() {
        $message = 'Hello';
        return $message;
    }

    public static function getMaxUpload() {
    	$max_upload = (int)(ini_get('upload_max_filesize'));
		$max_post = (int)(ini_get('post_max_size'));
		$memory_limit = (int)(ini_get('memory_limit'));
		$upload_mb = min($max_upload, $max_post, $memory_limit);

		return $upload_mb;
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

        return $day . ", " . $daynum . " " . $month . " " . $year;
    }
}