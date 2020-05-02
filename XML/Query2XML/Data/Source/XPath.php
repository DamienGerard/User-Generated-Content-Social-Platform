<?php
/**
 * This file contains the class XML_Query2XML_Data_Source_XPath.
 *
 * PHP version 5
 *
 * @category  XML
 * @package   XML_Query2XML
 * @author    Lukas Feiler <lukas.feiler@lukasfeiler.com>
 * @copyright 2009 Lukas Feiler
 * @license   http://www.gnu.org/copyleft/lesser.html  LGPL Version 2.1
 * @version   CVS: $Id: XPath.php 276639 2009-03-01 13:17:08Z lukasfeiler $
 * @link      http://pear.php.net/package/XML_Query2XML
 * @access    private
 */

/**
 * XML_Query2XML_Data_Source_ColumnValue extends the class
 * XML_Query2XML_Data_Source.
 */
require_once 'XML/Query2XML/Data/Source.php';

/**
 * Data Source Class that allows the results of an XPath query to be used
 * as a data source.
 *
 * usage:
 * <code>
 * $commandObject = new XML_Query2XML_Data_Source_XPath(
 *   new DOMXPath(DOMDocument::load('albums.xml')),
 *   '/music_store/album[artist_id="?"]',
 *   array('artistid')
 * );
 * </code>
 *
 * @category  XML
 * @package   XML_Query2XML
 * @author    Lukas Feiler <lukas.feiler@lukasfeiler.com>
 * @copyright 2009 Lukas Feiler
 * @license   http://www.gnu.org/copyleft/lesser.html  LGPL Version 2.1
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/XML_Query2XML
 * @access    private
 * @since     Release 1.8.0RC1
 */
class XML_Query2XML_Data_Source_XPath extends XML_Query2XML_Data_Source
{
    /**
     * THe DOMXPath instance used.
     * @var DOMXPath An instance of DOMXPath
     */
    private $_xpath = null;
    
    /**
     * An array of column names.
     * @var array
     */
    private $_data = array();
    
    /**
     * The placeholder string to be used.
     * @var string
     */
    private $_placeholder;
    
    /**
     * Constructor function.
     *
     * @param DOMXPath $xpath       An instance of DOMXPath.
     * @param string   $query       The XPath query.
     * @param mixed    $data        A string or an array of strings. Each string
     *                              will replace an occurance of $placeholder
     *                              within $query. This argument is optional.
     * @param string   $placeholder The string to use as a placeholder. The default
     *                              is '?'. This argument is optional.
     */
    public function __construct(DOMXPath $xpath,
                                $query,
                                $data = null,
                                $placeholder = '?')
    {
        $this->_xpath = $xpath;
        $this->_query = $query;
        if (is_string($data)) {
            $this->_data = array($data);
        } elseif (is_array($data)) {
            $this->_data = $data;
        } else {
            // unit test: MISSING
            throw new XML_Query2XML_ConfigException(
                'XML_Query2XML_Data_Source_XPath::__construct(): '
                . 'array or string expected as third argument.'
            );
        }
        $this->_placeholder = $placeholder;
    }
    
    /**
     * Creates a new instance of this class.
     * This method is called by XML_Query2XML.
     *
     * @param string $stringDef  String definition.
     * @param string $configPath The configuration path within the $options array.
     *                           This argument is optional.
     *
     * @return void
     */
    public function create($stringDef, $configPath)
    {
        throw new XML_Query2XML_ConfigException(
            'XML_Query2XML_Data_Source_XPath::create() is not yet fully implemented'
        );
    }
    
    /**
     * Called by XML_Query2XML for every record in the result set.
     *
     * @param array $record An associative array.
     *
     * @return array An array of DOMNode instances.
     * @throws XML_Query2XML_ConfigException If any of the columns specified
     *                                       using the third constructor argument
     *                                       does not exist.
     */
    public function execute(array $record)
    {
        $data = array();
        foreach ($this->_data as $columnName) {
            if (array_key_exists($columnName, $record)) {
                $data[] = $record[$columnName];
            } else {
                // UNIT TEST: MISSING
                throw new XML_Query2XML_ConfigException(
                    'XML_Query2XML_Data_Source_XPath::execute(): The column "'
                    . $columnName . '" was not found in the result set.'
                );
            }
        }
        $query = self::_replacePlaceholders(
            $this->_query,
            $data,
            $this->_placeholder
        );
        
        $elements = array();
        $result   = @$this->_xpath->query($query);
        if ($result === false) {
            // UNIT TEST: MISSING
            throw new XML_Query2XML_XMLException(
                'XML_Query2XML_Data_Source_XPath::execute(): could not execute '
                . 'XPath query "' . $query . '"'
            );
        }
        foreach ($result as $element) {
            $elements[] = $element;
        }
        return $elements;
    }
    
    /**
     * Replaces all placeholder strings (e.g. '?') with replacement strings.
     *
     * @param string $string        The string in which to replace the placeholder
     *                              strings.
     * @param array  &$replacements An array of replacement strings.
     * @param string $placeholder   The placeholder string.
     *
     * @return string The modified version of $string.
     */
    private static function _replacePlaceholders($string,
                                                 &$replacements,
                                                 $placeholder)
    {
        while (($pos = strpos($string, $placeholder)) !== false) {
            if (count($replacements) > 0) {
                $string = substr($string, 0, $pos) .
                          array_shift($replacements) .
                          substr($string, $pos+strlen($placeholder));
            } else {
                break;
            }
        }
        return $string;
    }
    
    /**
     * This method is called by XML_Query2XML in case the asterisk shortcut was used.
     *
     * The interface XML_Query2XML_Data_Source requires an implementation of
     * this method.
     *
     * @param string $columnName The column name that is to replace every occurance
     *                           of the asterisk character ('*') in the second and
     *                           third argument passed to the constructor ($query
     *                           and $data).
     *
     * @return void
     */
    public function replaceAsterisks($columnName)
    {
        $this->_query = str_replace('*', $columnName, $this->_query);
        foreach ($this->_data as $key => $value) {
            $this->_data[$key] = str_replace('*', $columnName, $value);
        }
    }
    
    /**
     * Returns a textual representation of this instance.
     * This might be useful for debugging.
     *
     * @return string
     */
    public function toString()
    {
        return get_class($this) . '(' . $this->_query . ')';
    }
}
?>