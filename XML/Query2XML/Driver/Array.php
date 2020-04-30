<?php
/**
 * This file contains the class XML_Query2XML_Driver_Array.
 *
 * PHP version 5
 *
 * @category  XML
 * @package   XML_Query2XML
 * @author    Lukas Feiler <lukas.feiler@lukasfeiler.com>
 * @copyright 2008 Lukas Feiler
 * @license   http://www.gnu.org/copyleft/lesser.html  LGPL Version 2.1
 * @version   CVS: $Id: Array.php 259514 2008-05-10 21:04:44Z lukasfeiler $
 * @link      http://pear.php.net/package/XML_Query2XML
 */

/**
 * XML_Query2XML_Driver_Array extends XML_Query2XML_Driver.
 */
require_once 'XML/Query2XML.php';

/**
 * Array-based driver.
 *
 * usage:
 * <code>
 * $arrayDriver = XML_Query2XML_Driver_Array::factory();
 * $arrayDriver->addResultSet(
 *  'RESULT_SET_NAME', // to be used for $sql or $options['sql']
 *  array(
 *    array('column' => 'value', ...), // record #1
 *    array('column' => 'value', ...)  // record #2
 *  )
 * );
 * </code>
 * Usage scenario:
 * - Transform an array of associative arrays to XML:
 *   $query2xml->getFlatXML('RESULT_SET_ARTISTS_FLAT');
 * - Transform an array of index arrays to XML:
 *   $dom = $query2xml->getXML(
 *       'RESULT_SET_ARTISTS_FLAT',
 *       array(
 *          'rootTag' => 'data',
 *          'rowTag' => 'row',
 *          'idColumn' => false,
 *          'elements' => array(
 *              'name' => '0',
 *              'ID' => '1',
 *              'info' => '2'
 *          )
 *       )
 *   );
 * - Easy integration of other data sources without having
 *   to write a separate driver.
 * - Easy lookup table for static data. $options['sql']['data']
 *   can be used to specify the matching record.
 *
 * @category  XML
 * @package   XML_Query2XML
 * @author    Lukas Feiler <lukas.feiler@lukasfeiler.com>
 * @copyright 2008 Lukas Feiler
 * @license   http://www.gnu.org/copyleft/lesser.html  LGPL Version 2.1
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/XML_Query2XML
 * @since     Release 1.8.0RC1
 */
class XML_Query2XML_Driver_Array extends XML_Query2XML_Driver
{
    /**
     * An associative array of result sets.
     * @var array An associative array.
     */
    private $_resultSets = null;
    
    /**
     * Add a named result set.
     *
     * @param string $name      The name of the result set.
     * @param array  $resultSet An indexed array of associative arrays.
     *
     * @return void
     */
    public function addResultSet($name, array $resultSet)
    {
        $this->_resultSets[$name] = $resultSet;
    }
    
    /**
     * Remove a named result set.
     *
     * @param string $name The name of the result set to remove
     *
     * @return void
     */
    public function removeResultSet($name)
    {
        unset($this->_resultSets[$name]);
    }
    
    /**
     * Factory method
     *
     * @param array  $resultSet     An index array of associative arrays.
     *                              This argument is optional.
     * @param string $resultSetName The name of the result set. This argument
     *                              is optional. The default is an empty string.
     *
     * @return XML_Query2XML_Driver_Array
     */
    public static function factory(array $resultSet = null, $resultSetName = '')
    {
        $driver = new XML_Query2XML_Driver_Array();
        if (is_array($resultSet)) {
            $driver->addResultSet($resultSetName, $resultSet);
        }
        return $driver;
    }
    
    /**
     * Returns all records from a named result set.
     *
     * @param array  $query      An array with at least one element: 'query'.
     * @param string $configPath The configuration path.
     *
     * @return array An index array of associative arrays.
     */
    public function getAllRecords($query, $configPath)
    {
        $resultSetName = $query['query'];
        if (!isset($this->_resultSets[$resultSetName])) {
            throw new XML_Query2XML_ArrayException(
                $configPath . ': the result set "' . $resultSetName . '" '
                . 'does not exist'
            );
        }
        $resultSet = $this->_resultSets[$resultSetName];
        if (array_key_exists('data', $query)) {
            /*
             * Only return records that have a corresponding
             * column for each element key of $query['data']
             * and have the same column value as the array
             * element.
             */
            $filteredResultSet = array();
            for ($i = 0; $i < count($resultSet); $i++) {
                $include = true;
                foreach ($query['data'] as $key => $value) {
                    if (array_key_exists($key, $resultSet[$i])) {
                        if ($resultSet[$i][$key] != $value) {
                            $include = false;
                            break;
                        }
                    } else {
                        $include = false;
                    }
                }
                if ($include) {
                    $filteredResultSet[] = $resultSet[$i];
                }
            }
            $resultSet = $filteredResultSet;
        }
        
        return $resultSet;
    }
}

/**
 * Exception for errors related to the array driver.
 *
 * @category XML
 * @package  XML_Query2XML
 * @author   Lukas Feiler <lukas.feiler@lukasfeiler.com>
 * @license  http://www.gnu.org/copyleft/lesser.html  LGPL Version 2.1
 * @link     http://pear.php.net/package/XML_Query2XML
 * @since    Release 1.8.0RC1
 */
class XML_Query2XML_ArrayException extends XML_Query2XML_DriverException
{
    /**
     * Constructor
     *
     * @param string $message The error message.
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
?>