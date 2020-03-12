<?php

function Time_en(){
    date_default_timezone_set("Asia/Bangkok");
    $timestamp = time();
    $date_time = date("l-d-m-Y H:i:s", $timestamp);
    echo $date_time;

}



function Time_th(){
    date_default_timezone_set("Asia/Bangkok");
    $timestamp  =  time();
    $date_day   =  date("l", $timestamp);
    $date_date  =  date("d", $timestamp);
    $date_Month =  date("m", $timestamp);
    $date_year  =  date("Y", $timestamp);  

    switch ($date_day) {

        case 'Sunday':
            $date_day = "อาทิตย์";
            break;
        case 'Monday':
            $date_day = "จันทร์";
            break;
        case 'Tuesday':
            $date_day = "อังคาร";
            break;
        case 'Wednesday':
            $date_day = "พุธ";
            break;
        case 'Thursday':
            $date_day = "พฤหัสบดี";
            break;
        case 'Friday':
            $date_day = "ศุกร์";
            break;
        case 'Saturday':
            $date_day = "เสาร์";
            break;

        default:
            echo "Function day Error";
    }

    switch ($date_Month) {
        
                case 1:
                    $date_Month = "มกราคม";
                    break;
                case 2:
                    $date_Month = "กุมภาพันธ์";
                    break;
                case 3:
                    $date_Month = "มีนาคม ";
                    break;
                case 4:
                    $date_Month = "เมษายน";
                    break;
                case 5:
                    $date_Month = "พฤษภาคม";
                    break;
                case 6:
                    $date_Month = "มิถุนายน";
                    break;
                case 7:
                    $date_Month = "กรกฎาคม";
                    break;
                case 8:
                    $date_Month = "สิงหาคม";
                    break;
                case 9:
                    $date_Month = "กันยายน";
                    break;
                case 10:
                    $date_Month = "ตุลาคม";
                    break;
                case 11:
                    $date_Month = "พฤศจิกายน";
                    break;
                case 12:
                    $date_Month = "ธันวาคม";
                    break;
        
                default:
                    echo "Function Month Error";
            }

    $date_year = $date_year+543;

    echo "วัน ".$date_day." ที่ ".$date_date." เดือน ".$date_Month." พ.ศ. ".$date_year;

}

function Day_th($date_day){
    date_default_timezone_set("Asia/Bangkok");
    $timestamp  =  time();

    switch ($date_day) {

        case 'Sunday':
            $date_day = "อาทิตย์";
            break;
        case 'Monday':
            $date_day = "จันทร์";
            break;
        case 'Tuesday':
            $date_day = "อังคาร";
            break;
        case 'Wednesday':
            $date_day = "พุธ";
            break;
        case 'Thursday':
            $date_day = "พฤหัสบดี";
            break;
        case 'Friday':
            $date_day = "ศุกร์";
            break;
        case 'Saturday':
            $date_day = "เสาร์";
            break;

        default:
            echo "Function day Error: ";
    }
    return 'วัน'.$date_day;
}

function Time_second(){
    date_default_timezone_set("Asia/Bangkok");
    $timestamp    =  time();
    $date_time    =  date("H:i:s", $timestamp);
    $date_hour    =  date("H", $timestamp);
    $date_minute  =  date("i", $timestamp);  
    $date_second  =  date("s", $timestamp);  

    $date_hour    = $date_hour*60*60;
    $date_minute  = $date_minute*60;
    $date_second  = $date_second;
    
    $time         = $date_hour+$date_minute+$date_second;

    echo $time;

}

function Time_cover($time_cover){
    $sub_hour   = substr($time_cover,0,-6);
    $sub_minute = substr($time_cover,3,-3);
    $sub_second = substr($time_cover,6);

    $sub_hour   = $sub_hour*60*60;
    $sub_minute = $sub_minute*60;
    $sub_second = $sub_second;

    $time_cover = $sub_hour+$sub_minute+$sub_second;

    return $time_cover;
}


function hash_pass($Password){
    $salt = "nkldsfgioetgeiqe-qfm94mfr9gf0d_masmf%$#af@!#?>L0)*&JJ(&&GDE%EADS^";
    $hash256 = hash_hmac(sha256,$Password,$salt);
    $hashmd5 = md5($hash256);
    echo $hashmd5;
}

function second_cover($second){
    $hour = floor(($second/60)/60);
    $hour_second = $second-(($hour*60)*60);

    
    $minute_one  = ($hour_second/60);
    $str = strpos($minute_one,".");
    $sub_time = substr($minute_one,$str+1);


    $minute = substr($sub_time,0,2);
    if($minute == ""){
        $minute = 0;
    }

    $second = substr($sub_time,2,2);
    if($second == ""){
        $second = '0';
    }

    if($second < 10){
        if($minute < 10){
            if($hour < 10){
                echo '0'.$hour.':0'.$minute.':0'.$second;
            }else{
                echo $hour.':0'.$minute.':0'.$second;
            }
        }else{
            echo $hour.':'.$minute.':0'.$second;
        }
    }else{
        echo $hour.':'.$minute.':'.$second;
    }


}

/* ทำงานผิดพลาด
function second_cover($second){
    $hour = floor(($second/60)/60);

    $hour_second = $second-($hour*60*60);
    $minute  = floor($hour_second/60);

    $minute_second = $second-($minute*60);

    $minute_second = ($hour_second+$minute_second)-$second;
    $second = floor($minute_second);

    if($second < 10){
        if($minute < 10){
            if($hour < 10){
                echo '0'.$hour.':0'.$minute.':0'.$second;
            }else{
                echo $hour.':0'.$minute.':0'.$second;
            }
        }else{
            echo $hour.':'.$minute.':0'.$second;
        }
    }else{
        echo $hour.':'.$minute.':'.$second;
    }


}*/

function second_cover_hour($second){
    
    $hour = floor(($second/60)/60);
    $hour_second = $second-(($hour*60)*60);

    
    $minute_one  = ($hour_second/60);
    $str = strpos($minute_one,".");
    $sub_time = substr($minute_one,$str+1);


    $minute = substr($sub_time,0,2);
    if($minute == ""){
        $minute = 0;
    }

    $second = substr($sub_time,2,2);
    if($second == ""){
        $second = '0';
    }


    if($hour < 10){
        if($minute < 10){
            return '0'.$hour.' ชั่วโมง 0'.$minute.' นาที ';
        }else {
            return '0'.$hour.' ชั่วโมง '.$minute.' นาที ';
        }
    }else {
        if($minute < 10){
            return ''.$hour.' ชั่วโมง 0'.$minute.' นาที ';
        }else {
            return ''.$hour.' ชั่วโมง '.$minute.' นาที ';
        }
    }
    
}


/* ทำงานผิดพลาด
function second_cover_hour($second){
    $hour = floor(($second/60)/60);

    $hour_second = $second-(($hour*60)*60);
    $minute  = floor($hour_second/60);

    $minute_second = $second-($minute*60);

    $minute_second = ($hour_second+$minute_second)-$second;
    $second = floor($minute_second);

    if($second < 10){
        if($minute < 10){
            if($hour < 10){
                return '0'.$hour.' ชั่วโมง 0'.$minute.' นาที';
            }else{
                return $hour.' ชั่วโมง 0'.$minute.' นาที';
            }
        }else{
            if($hour < 10){
                return '0'.$hour.' ชั่วโมง '.$minute.' นาที';
            }else{
                return $hour.' ชั่วโมง '.$minute.' นาที';
            }
        }
    }else{
        if($minute < 10){
            if($hour < 10){
                return '0'.$hour.' ชั่วโมง 0'.$minute.' นาที';
            }else{
                return $hour.' ชั่วโมง 0'.$minute.' นาที';
            }
        }else{
            if($hour < 10){
                return '0'.$hour.' ชั่วโมง '.$minute.' นาที';
            }else{
                return $hour.' ชั่วโมง '.$minute.' นาที';
            }
        }
    }


}*/


function second_cover_return($second){
    $hour = floor(($second/60)/60);
    $hour_second = $second-(($hour*60)*60);

    
    $minute_one  = ($hour_second/60);
    $str = strpos($minute_one,".");
    $sub_time = substr($minute_one,$str+1);


    $minute = substr($sub_time,0,2);
    if($minute == ""){
        $minute = 0;
    }

    $second = substr($sub_time,2,2);
    if($second == ""){
        $second = '0';
    }

    if($second < 10){
        if($minute < 10){
            if($hour < 10){
                return '0'.$hour.':0'.$minute.':0'.$second;
            }else{
                return $hour.':0'.$minute.':0'.$second;
            }
        }else{
            if($hour < 10){
                return '0'.$hour.':'.$minute.':0'.$second;
            }else{
                return $hour.':'.$minute.':0'.$second;
            }
        }
    }else{
        return $hour.':'.$minute.':'.$second;
    }


}
/* ทำงานผิดพลาด
function second_cover_return($second){
    $hour = floor(($second/60)/60);

    $hour_second = $second-($hour*60*60);
    $minute  = floor($hour_second/60);

    $minute_second = $second-($minute*60);

    $minute_second = ($hour_second+$minute_second)-$second;
    $second = floor($minute_second);

    if($second < 10){
        if($minute < 10){
            if($hour < 10){
                return '0'.$hour.':0'.$minute.':0'.$second;
            }else{
                return $hour.':0'.$minute.':0'.$second;
            }
        }else{
            if($hour < 10){
                return '0'.$hour.':'.$minute.':0'.$second;
            }else{
                return $hour.':'.$minute.':0'.$second;
            }
        }
    }else{
        return $hour.':'.$minute.':'.$second;
    }


}*/


function Time_now(){
    date_default_timezone_set("Asia/Bangkok");
    $timestamp = time();
    $date_time = date("H:i", $timestamp);
    echo $date_time;
}
/*
Time_en(); // function แสดงวันที่ภาษาอังกฤษ
echo "<br>";
Time_th(); // function แสดงวันที่ภาษาไทย
echo "<br>";
Time_second (); // function แสดงเวลาปัจจุบัน ที่ถูกแปลงเป็นวินาทีแล้ว
echo "<br>";

$time_now = "12:58:52";
Time_cover($time_now); // function แสดงเวลาที่รับเข้ามาผ่านตัวแปลแล้วแปลงเป็นวินาที
echo "<br>";
hash_pass("05/09/2540"); // function hash รหัสผ่าน

echo "<br>";
$second = "58946";
second_cover($second);
*/





?>