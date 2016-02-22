<?php
namespace VoltHelpers;

use Phalcon\Mvc\User\Component;

/**
 * VoltHelpers\Helpers
 */
class Helpers extends Component
{

  /**
   * Number ordinal service - returns 1st, 2nd, 10th, 43rd, 724th, etc.
   *
   * @paran int $number
   * @return string
   */
  public static function ordinal($number)
  {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
  }

  /**
   * Convert a string to currency
   *
   * @paran mixed $value
   * @return string
   */
  public static function strToCurrency($value)
  {

    $value = str_replace('$', '', $value);
    $value = str_replace(',', '', $value);
    return '$' . number_format((float) $value);

  }

  /**
   * Pluralize
   *
   * @param int $count
   * @param string $singular
   * @param string $plural
   */
  public static function pluralize($count, $singular, $plural)
  {

    return $count == 1 
      ? $singular 
      : $plural;

  }

}
