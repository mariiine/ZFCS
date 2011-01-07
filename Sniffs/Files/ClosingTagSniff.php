<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    ZFCS
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */

/**
 * This sniff checks that files do not end with a closing tag.
 *
 * @category   Zend
 * @package    ZFCS
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class ZFCS_Sniffs_Files_ClosingTagSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * register(): defined by PHP_CodeSniffer_Sniff interface
     *
     * @see    PHP_CodeSniffer_Sniff::register()
     * @return array
     */
    public function register()
    {
        return array(T_CLOSE_TAG);
    }

    /**
     * process(): defined by PHP_CodeSniffer_Sniff interface
     *
     * @see    PHP_CodeSniffer_Sniff::process()
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $next   = $phpcsFile->findNext(T_WHITESPACE, ($stackPtr + 1), null, true);

        if ($next === false) {
            $error = 'A closing tag is not permitted at the end of a PHP file';
            $phpcsFile->addError($error, $stackPtr, 'NotAllowed');
        }
    }
}
