<?php

namespace XoopsModules\Tad_cal;

/*
require_once "rrule.php"
$rule = new \XoopsModules\Tad_cal\RRule('20111104T190000' , 'RRULE:FREQ=WEEKLY;UNTIL=20111230;INTERVAL=2;BYDAY=FR');
while($date = $rule->GetNext()){
echo "<p>".$date->Render()."</p>";
}

for($i=0;$i<=31;$i++){
$time=strtotime('2011-11-01')+86400*$i;
echo date("Y-m-d(w)",$time)."=".getWeekOfTheMonth($time)."<br>";
}
//算一下該日是該月的第幾週
function getWeekOfTheMonth($dateTimestamp=''){
$weekNum=date("W",$dateTimestamp)-date("W",strtotime(date("Y-m-01", $dateTimestamp)))+1;
return $weekNum ;
}
 */

/**
 * Class for parsing RRule and getting us the dates
 *
 * @package   awl
 * @subpackage   caldav
 * @author    Andrew McMillan <andrew@catalyst.net.nz>
 * @copyright Catalyst .Net Ltd
 * @license   http://gnu.org/copyleft/gpl.html GNU GPL v2
 */

//$ical_weekdays = array( 'SU' => 0, 'MO' => 1, 'TU' => 2, 'WE' => 3, 'TH' => 4, 'FR' => 5, 'SA' => 6 );

/**
 * 將日期轉為 iCalendar 格式的物件。  We do make the simplifying assumption
 * that all date handling in here is normalised to GMT.  One day we might provide some
 * functions to do that, but for now it is done externally.
 *
 * @package awl
 */
class IcalDate
{
    /**#@+
     * @access private
     */

    /** Text version */
    public $_text;

    /** Epoch version */
    public $_epoch;

    /** Fragmented parts */
    public $_yy;
    public $_mo;
    public $_dd;
    public $_hh;
    public $_mi;
    public $_ss;
    public $_tz;

    /** Which day of the week does the week start on */
    public $_wkst;

    public $ical_weekdays = ['SU' => 0, 'MO' => 1, 'TU' => 2, 'WE' => 3, 'TH' => 4, 'FR' => 5, 'SA' => 6];

    /**#@-*/

    /**
     * The constructor takes either an iCalendar date, a text string formatted as
     * an iCalendar date, or epoch seconds.
     * @param mixed $input
     */
    public function __construct($input)
    {
        if ('object' === gettype($input)) {
            $this->_text = $input->_text;
            $this->_epoch = $input->_epoch;
            $this->_yy = $input->_yy;
            $this->_mo = $input->_mo;
            $this->_dd = $input->_dd;
            $this->_hh = $input->_hh;
            $this->_mi = $input->_mi;
            $this->_ss = $input->_ss;
            $this->_tz = $input->_tz;

            return;
        }

        $this->_wkst = 1; // Monday
        if (preg_match('/^\d{8}[T ]\d{6}$/', $input)) {
            $this->SetLocalDate($input);
        } elseif (preg_match('/^\d{8}[T ]\d{6}Z$/', $input)) {
            $this->SetGMTDate($input);
        } elseif (0 == (int) $input) {
            $this->SetLocalDate(strtotime($input));

            return;
        } else {
            $this->SetEpochDate($input);
        }
    }

    /**
     * Set the date from a text string
     * @param mixed $input
     */
    public function SetGMTDate($input)
    {
        $this->_text = $input;
        $this->_PartsFromText();
        $this->_GMTEpochFromParts();
    }

    /**
     * Set the date from a text string
     * @param mixed $input
     */
    public function SetLocalDate($input)
    {
        $this->_text = $input;
        $this->_PartsFromText();
        $this->_EpochFromParts();
    }

    /**
     * Set the date from an epoch
     * @param mixed $input
     */
    public function SetEpochDate($input)
    {
        $this->_epoch = (int) $input;
        $this->_TextFromEpoch();
        $this->_PartsFromText();
    }

    /**
     * Given an epoch date, convert it to text
     */
    public function _TextFromEpoch()
    {
        $this->_text = date('Ymd\THis', $this->_epoch);
        //echo sprintf("<br> Text %s from epoch %d", $this->_text, $this->_epoch );
    }

    /**
     * Given a GMT epoch date, convert it to text
     */
    public function _GMTTextFromEpoch()
    {
        $this->_text = gmdate('Ymd\THis', $this->_epoch);
        //echo sprintf("<br> Text %s from epoch %d", $this->_text, $this->_epoch );
    }

    /**
     * Given a text date, convert it to parts
     */
    public function _PartsFromText()
    {
        $this->_yy = (int) mb_substr($this->_text, 0, 4);
        $this->_mo = (int) mb_substr($this->_text, 4, 2);
        $this->_dd = (int) mb_substr($this->_text, 6, 2);
        $this->_hh = (int) mb_substr($this->_text, 9, 2);
        $this->_mi = (int) mb_substr($this->_text, 11, 2);
        $this->_ss = (int) mb_substr($this->_text, 13, 2);
    }

    /**
     * Given a GMT text date, convert it to an epoch
     */
    public function _GMTEpochFromParts()
    {
        $this->_epoch = gmmktime($this->_hh, $this->_mi, $this->_ss, $this->_mo, $this->_dd, $this->_yy);
        //echo sprintf("<br> Epoch %d from %04d-%02d-%02d %02d:%02d:%02d", $this->_epoch, $this->_yy, $this->_mo, $this->_dd, $this->_hh, $this->_mi, $this->_ss );
    }

    /**
     * 轉換本地時間為 Epoch 時間戳記
     */
    public function _EpochFromParts()
    {
        $this->_epoch = mktime($this->_hh, $this->_mi, $this->_ss, $this->_mo, $this->_dd, $this->_yy);
        //echo sprintf("<br> Epoch %d from %04d-%02d-%02d %02d:%02d:%02d", $this->_epoch, $this->_yy, $this->_mo, $this->_dd, $this->_hh, $this->_mi, $this->_ss );
    }

    /**
     * Set the day of week used for calculation of week starts
     *
     * @param string $weekstart The day of the week which is the first business day.
     */
    public function SetWeekStart($weekstart)
    {
        //global $ical_weekdays;
        $this->_wkst = $this->ical_weekdays[$weekstart];
    }

    /**
     * Set the day of week used for calculation of week starts
     * @param mixed $fmt
     * @return false|string
     */
    public function Render($fmt = 'Y-m-d H:i:s')
    {
        return date($fmt, $this->_epoch);
    }

    /**
     * Render the date as GMT
     * @param mixed $fmt
     * @return false|string
     */
    public function RenderGMT($fmt = 'Ymd\THis\Z')
    {
        return gmdate($fmt, $this->_epoch);
    }

    /**
     * No of days in a month 1(Jan) - 12(Dec)
     * @param mixed $mo
     * @param mixed $yy
     * @return int
     */
    public function DaysInMonth($mo = false, $yy = false)
    {
        if (false === $mo) {
            $mo = $this->_mo;
        }

        switch ($mo) {
            case 1: // January
            case 3: // March
            case 5: // May
            case 7: // July
            case 8: // August
            case 10: // October
            case 12: // December
                return 31;
                break;
            case 4: // April
            case 6: // June
            case 9: // September
            case 11: // November
                return 30;
                break;
            case 2: // February
                if (false === $yy) {
                    $yy = $this->_yy;
                }

                if ((0 == ($yy % 4)) && ((0 != ($yy % 100)) || (0 == ($yy % 400)))) {
                    return 29;
                }

                return 28;
                break;
            default:
                //echo sprintf("<br> Invalid month of '%s' passed to DaysInMonth", $mo );
                break;
        }
    }

    /**
     * Set the day in the month to what we have been given
     * @param mixed $dd
     */
    public function SetMonthDay($dd)
    {
        if ($dd == $this->_dd) {
            return;
        }
        // Shortcut
        $dd = min($dd, $this->DaysInMonth());
        $this->_dd = $dd;
        $this->_EpochFromParts();
        $this->_TextFromEpoch();
    }

    /**
     * Add some number of months to a date
     * @param mixed $mo
     */
    public function AddMonths($mo)
    {
        //echo sprintf("<br> Adding %d months to %s", $mo, $this->_text );
        $this->_mo += $mo;
        while ($this->_mo < 1) {
            $this->_mo += 12;
            $this->_yy--;
        }
        while ($this->_mo > 12) {
            $this->_mo -= 12;
            $this->_yy++;
        }

        if (($this->_dd > 28 && 2 == $this->_mo) || $this->_dd > 30) {
            // Ensure the day of month is still reasonable and coerce to last day of month if needed
            $dim = $this->DaysInMonth();
            if ($this->_dd > $dim) {
                $this->_dd = $dim;
            }
        }
        $this->_EpochFromParts();
        $this->_TextFromEpoch();
        //echo sprintf("<br> Added %d months and got %s", $mo, $this->_text );
    }

    /**
     * Add some integer number of days to a date
     * @param mixed $dd
     */
    public function AddDays($dd)
    {
        $at_start = $this->_text;
        $this->_dd += $dd;
        while ($this->_dd < 1) {
            $this->_mo--;
            if ($this->_mo < 1) {
                $this->_mo += 12;
                $this->_yy--;
            }
            $this->_dd += $this->DaysInMonth();
        }
        while (($dim = $this->DaysInMonth($this->_mo)) < $this->_dd) {
            $this->_dd -= $dim;
            $this->_mo++;
            if ($this->_mo > 12) {
                $this->_mo -= 12;
                $this->_yy++;
            }
        }
        $this->_EpochFromParts();
        $this->_TextFromEpoch();
        //echo sprintf("<br> Added %d days to %s and got %s", $dd, $at_start, $this->_text );
    }

    /**
     * Add duration
     * @param mixed $duration
     */
    public function AddDuration($duration)
    {
        if (false === mb_strstr($duration, 'T')) {
            $duration .= 'T';
        }

        list($sign, $days, $time) = preg_split('/[PT]/', $duration);
        $sign = ('-' == $sign ? -1 : 1);
        //echo sprintf("<br> Adding duration to '%s' of sign: %d,  days: %s,  time: %s", $this->_text, $sign, $days, $time );
        if (preg_match('/(\d+)(D|W)/', $days, $matches)) {
            $days = (int) $matches[1];
            if ('W' === $matches[2]) {
                $days *= 7;
            }

            $this->AddDays($days * $sign);
        }
        $hh = 0;
        $mi = 0;
        $ss = 0;
        if (preg_match('/(\d+)(H)/', $time, $matches)) {
            $hh = $matches[1];
        }

        if (preg_match('/(\d+)(M)/', $time, $matches)) {
            $mi = $matches[1];
        }

        if (preg_match('/(\d+)(S)/', $time, $matches)) {
            $ss = $matches[1];
        }

        //echo sprintf("<br> Adding %02d:%02d:%02d * %d to %02d:%02d:%02d", $hh, $mi, $ss, $sign, $this->_hh, $this->_mi, $this->_ss );
        $this->_hh += ($hh * $sign);
        $this->_mi += ($mi * $sign);
        $this->_ss += ($ss * $sign);

        if ($this->_ss < 0) {
            $this->_mi -= ((int) abs($this->_ss / 60) + 1);
            $this->_ss += (((int) abs($this->_mi / 60) + 1) * 60);
        }
        if ($this->_ss > 59) {
            $this->_mi += ((int) abs($this->_ss / 60) + 1);
            $this->_ss -= (((int) abs($this->_mi / 60) + 1) * 60);
        }
        if ($this->_mi < 0) {
            $this->_hh -= ((int) abs($this->_mi / 60) + 1);
            $this->_mi += (((int) abs($this->_mi / 60) + 1) * 60);
        }
        if ($this->_mi > 59) {
            $this->_hh += ((int) abs($this->_mi / 60) + 1);
            $this->_mi -= (((int) abs($this->_mi / 60) + 1) * 60);
        }
        if ($this->_hh < 0) {
            $this->AddDays(-1 * ((int) abs($this->_hh / 24) + 1));
            $this->_hh += (((int) abs($this->_hh / 24) + 1) * 24);
        }
        if ($this->_hh > 23) {
            $this->AddDays(((int) abs($this->_hh / 24) + 1));
            $this->_hh -= (((int) abs($this->_hh / 24) + 1) * 24);
        }

        $this->_EpochFromParts();
        $this->_TextFromEpoch();
    }

    /**
     * Produce an iCalendar format DURATION for the difference between this an another IcalDate
     *
     * @param date $from The start of the period
     * @return string The date difference, as an iCalendar duration format
     */
    public function DateDifference($from)
    {
        if (!is_object($from)) {
            $from = new self($from);
        }
        if ($from->_epoch < $this->_epoch) {
            /** One way to simplify is to always go for positive differences */
            return ('-' . $from->DateDifference($self));
        }
//    if ( $from->_yy == $this->_yy && $from->_mo == $this->_mo ) {
        /** Also somewhat simpler if we can use seconds */
        $diff = $from->_epoch - $this->_epoch;
        $result = '';
        if ($diff >= 86400) {
            $result = (int) ($diff / 86400);
            $diff = $diff % 86400;
            if (0 == $diff && (0 == ($result % 7))) {
                // Duration is an integer number of weeks.
                $result .= (int) ($result / 7) . 'W';

                return $result;
            }
            $result .= 'D';
        }
        $result = 'P' . $result . 'T';
        if ($diff >= 3600) {
            $result .= (int) ($diff / 3600) . 'H';
            $diff = $diff % 3600;
        }
        if ($diff >= 60) {
            $result .= (int) ($diff / 60) . 'M';
            $diff = $diff % 60;
        }
        if ($diff > 0) {
            $result .= (int) $diff . 'S';
        }

        return $result;
//    }

/**
 * From an intense reading of RFC2445 it appears that durations which are not expressible
 * in Weeks/Days/Hours/Minutes/Seconds are invalid.
 *  ==> This code is not needed then :-)
$yy = $from->_yy - $this->_yy;
$mo = $from->_mo - $this->_mo;
$dd = $from->_dd - $this->_dd;
$hh = $from->_hh - $this->_hh;
$mi = $from->_mi - $this->_mi;
$ss = $from->_ss - $this->_ss;

if ( $ss < 0 ) {  $mi -= 1;   $ss += 60;  }
if ( $mi < 0 ) {  $hh -= 1;   $mi += 60;  }
if ( $hh < 0 ) {  $dd -= 1;   $hh += 24;  }
if ( $dd < 0 ) {  $mo -= 1;   $dd += $this->DaysInMonth();  } // Which will use $this->_(mo|yy) - seemingly sensible
if ( $mo < 0 ) {  $yy -= 1;   $mo += 12;  }

$result = "";
if ( $yy > 0) {    $result .= $yy."Y";   }
if ( $mo > 0) {    $result .= $mo."M";   }
if ( $dd > 0) {    $result .= $dd."D";   }
$result .= "T";
if ( $hh > 0) {    $result .= $hh."H";   }
if ( $mi > 0) {    $result .= $mi."M";   }
if ( $ss > 0) {    $result .= $ss."S";   }
return $result;
 */
    }

    /**
     * Test to see if our _mo matches something in the list of months we have received.
     * @param string $monthlist A comma-separated list of months.
     * @return bool Whether this date falls within one of those months.
     */
    public function TestByMonth($monthlist)
    {
        //echo sprintf("<br> Testing BYMONTH %s against month %d", (isset($monthlist) ? $monthlist : "no month list"), $this->_mo );
        if (!isset($monthlist)) {
            return true;
        }
        // If BYMONTH is not specified any month is OK
        $months = array_flip(explode(',', $monthlist));

        return isset($months[$this->_mo]);
    }

    /**
     * Applies any BYDAY to the month to return a set of days
     * @param string $byday The BYDAY rule
     * @return array An array of the day numbers for the month which meet the rule.
     */
    public function GetMonthByDay($byday)
    {
        //echo sprintf("<br> Applying BYDAY %s to month", $byday );
        $days_in_month = $this->DaysInMonth();
        $dayrules = explode(',', $byday);
        $set = [];
        $first_dow = (date('w', $this->_epoch) - $this->_dd + 36) % 7;
        foreach ($dayrules as $k => $v) {
            $days = $this->MonthDays($first_dow, $days_in_month, $v);
            foreach ($days as $k2 => $v2) {
                $set[$v2] = $v2;
            }
        }
        asort($set, SORT_NUMERIC);

        return $set;
    }

    /**
     * Applies any BYMONTHDAY to the month to return a set of days
     * @param string $bymonthday The BYMONTHDAY rule
     * @return array An array of the day numbers for the month which meet the rule.
     */
    public function GetMonthByMonthDay($bymonthday)
    {
        //echo sprintf("<br> Applying BYMONTHDAY %s to month", $bymonthday );
        $days_in_month = $this->DaysInMonth();
        $dayrules = explode(',', $bymonthday);
        $set = [];
        foreach ($dayrules as $k => $v) {
            $v = (int) $v;
            if ($v > 0 && $v <= $days_in_month) {
                $set[$v] = $v;
            }
        }
        asort($set, SORT_NUMERIC);

        return $set;
    }

    /**
     * Applies any BYDAY to the week to return a set of days
     * @param string $byday The BYDAY rule
     * @param string $increasing When we are moving by months, we want any day of the week, but when by day we only want to increase. Default false.
     * @return array An array of the day numbers for the week which meet the rule.
     */
    public function GetWeekByDay($byday, $increasing = false)
    {
        //global $ical_weekdays;
        //var_export($this->ical_weekdays);
        //echo sprintf("<br> Applying BYDAY %s to week", $byday );
        $days = explode(',', $byday);
        $dow = date('w', $this->_epoch);
        $set = [];
        foreach ($days as $k => $v) {
            $daynum = $this->ical_weekdays[$v];
            $dd = $this->_dd - $dow + $daynum;
            //echo "<div style='color:red;'>$v : $dd</div>";
            if ($daynum < $this->_wkst) {
                $dd += 7;
            }

            if ($dd > $this->_dd || !$increasing) {
                $set[$dd] = $dd;
            }
        }
        asort($set, SORT_NUMERIC);

        return $set;
    }

    /**
     * Test if $this is greater than the date parameter
     * @param string $lesser The other date, as a local time string
     * @return bool True if $this > $lesser
     */
    public function GreaterThan($lesser)
    {
        if (is_object($lesser)) {
            //echo sprintf("<br> Comparing %s with %s", $this->_text, $lesser->_text );
            return ($this->_text > $lesser->_text);
        }
        //echo sprintf("<br> Comparing %s with %s", $this->_text, $lesser );
        return ($this->_text > $lesser); // These sorts of dates are designed that way...
    }

    /**
     * Test if $this is less than the date parameter
     * @param string $greater The other date, as a local time string
     * @return bool True if $this < $greater
     */
    public function LessThan($greater)
    {
        if (is_object($greater)) {
            //echo sprintf("<br> Comparing %s with %s", $this->_text, $greater->_text );
            return ($this->_text < $greater->_text);
        }
        //echo sprintf("<br> Comparing %s with %s", $this->_text, $greater );
        return ($this->_text < $greater); // These sorts of dates are designed that way...
    }

    /**
     * Given a MonthDays string like "1MO", "-2WE" return an integer day of the month.
     *
     * @param string $dow_first The day of week of the first of the month.
     * @param string $days_in_month The number of days in the month.
     * @param string $dayspec The specification for a month day (or days) which we parse.
     *
     * @return array An array of the day numbers for the month which meet the rule.
     */
    public function &MonthDays($dow_first, $days_in_month, $dayspec)
    {
        //global $ical_weekdays;
        //echo sprintf("<br>MonthDays: Getting days for '%s'. %d days starting on a %d", $dayspec, $days_in_month, $dow_first );
        $set = [];
        preg_match('/([0-9-]*)(MO|TU|WE|TH|FR|SA|SU)/', $dayspec, $matches);
        $numeric = (int) $matches[1];
        $dow = $this->ical_weekdays[$matches[2]];

        $first_matching_day = 1 + ($dow - $dow_first);
        while ($first_matching_day < 1) {
            $first_matching_day += 7;
        }

        //echo sprintf("<br> MonthDays: Looking at %d for first match on (%s/%s), %d for numeric", $first_matching_day, $matches[1], $matches[2], $numeric );

        while ($first_matching_day <= $days_in_month) {
            $set[] = $first_matching_day;
            $first_matching_day += 7;
        }

        if (0 != $numeric) {
            if ($numeric < 0) {
                $numeric += count($set);
            } else {
                $numeric--;
            }
            $answer = $set[$numeric];
            $set = [$answer => $answer];
        } else {
            $answers = $set;
            $set = [];
            foreach ($answers as $k => $v) {
                $set[$v] = $v;
            }
        }

//    dbg_log_array( "RRule", 'MonthDays', $set, false );

        return $set;
    }

    /**
     * Given set position descriptions like '1', '3', '11', '-3' or '-1' and a set,
     * return the subset matching the list of set positions.
     *
     * @param string $bysplist  The list of set positions.
     * @param string $set The set of days that we will apply the positions to.
     *
     * @return array The subset which matches.
     */
    public function &applyBySetPos($bysplist, $set)
    {
        //echo sprintf("<br> ApplyBySetPos: Applying set position '%s' to set of %d days", $bysplist, count($set) );
        $subset = [];
        sort($set, SORT_NUMERIC);
        $max = count($set);
        $positions = explode('[^0-9-]', $bysplist);
        foreach ($positions as $k => $v) {
            if ($v < 0) {
                $v += $max;
            } else {
                $v--;
            }
            $subset[$set[$v]] = $set[$v];
        }

        return $subset;
    }
}
