<?php
/**
 * This file contains the class XML_Query2XML_Data_Source.
 *
 * PHP version 5
 *
 * @category  XML
 * @package   XML_Query2XML
 * @author    Lukas Feiler <lukas.feiler@lukasfeiler.com>
 * @copyright 2009 Lukas Feiler
 * @license   http://www.gnu.org/copyleft/lesser.html  LGPL Version 2.1
 * @version   CVS: $Id: Source.php 309898 2011-04-02 17:38:08Z lukasfeiler $
 * @link      http://pear.php.net/package/XML_Query2XML 
 */

/**
 * XML_Query2XML_Data_Source extends XML_Query2XML_Data.
 */
require_once 'XML/Query2XML/Data.php';

/**
 * Abstract class extended by all Data Source Classes.
 *
 * @category  XML
 * @package   XML_Query2XML
 * @author    Lukas Feiler <lukas.feiler@lukasfeiler.com>
 * @copyright 2009 Lukas Feiler
 * @license   http://www.gnu.org/copyleft/lesser.html  LGPL Version 2.1
 * @version   Release: 1.7.2
 * @link      http://pear.php.net/package/XML_Query2XML
 * @since     Release 1.7.1RC1
 */
abstract class XML_Query2XML_Data_Source extends XML_Query2XML_Data
{
    /**
     * Returns the first pre-processor.
     *
     * As this is a Data Source Class, it has no pre-processors.
     * Therefore $this will be returned.
     *
     * @return XML_Query2XML_Data_Source $this
     */
    public final function getFirstPreProcessor()
    {
        return $this;
    }
    
    /**
     * Replaces every occurence of an asterisk ('*') in the data source
     * specification.
     *
     * @param string $columnName The name of the column that is to replace
     *                           all occurences of '*'.`
     *
     * @return void
     */
    public abstract function replaceAsterisks($columnName);
}
?>