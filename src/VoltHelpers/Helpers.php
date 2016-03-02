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


  /**
   * Return pagination link path
   *
   * @return string
   */
  public static function paginationPath()
  {

    $di = new \Phalcon\DI();

    // Get requested URI so we can grab the path route
    $uri = parse_url($di->getDefault()->getRequest()->getURI());

    // Get query params and add an empty 'page' param. 
    // The pagination template will append the page number.
    $q = $di->getDefault()->getRequest()->getQuery();
    $q['page'] = '';
    unset($q['_url']);

    // Return new URI with empty page param
    return $uri['path'] . '?' . http_build_query($q);

  }

}
