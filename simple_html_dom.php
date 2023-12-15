<?php
/**
 * simple_html_dom - HTML DOM parser
 * @copyright 2019, S.C. Chen
 * @url https://sourceforge.net/projects/simplehtmldom/
 * @url https://simplehtmldom.sourceforge.io/manual.htm
 * For PHP5+, PHP7+
 * 
 * Licensed under The MIT License
 * See the enclosed file LICENSE.TXT for license information (MIT)
 *
 * Paperg - Sergio Chinellato
 * suepported UTF-8 and remove noise in backward compatibility
 * file_put_contents and file_get_contents modified by DannyMo
 * file_put_contents fix by Nicolas Herchenroeder
 * Thanks to Jose Solorzano (https://sourceforge.net/projects/php-html/)
 * Contributors:
 * John Schlick (https://sourceforge.net/projects/php-html/)
 * Yousuke Kumakura (https://sourceforge.net/projects/php-html/)
 * Rus Carroll (https://sourceforge.net/projects/php-html/)
 * SPi (https://sourceforge.net/projects/php-html/)
 * Martin (https://sourceforge.net/projects/php-html/)
 * Sean Revell (https://sourceforge.net/projects/php-html/)
 * orgin (https://sourceforge.net/projects/php-html/)
 * J A Reinhardt (https://sourceforge.net/projects/php-html/)
 * Beni Cherniavsky-Paskin (https://sourceforge.net/projects/php-html/)
 * marcora (https://sourceforge.net/projects/php-html/)
 * Valid XML attribute names and attribute value entities by Sébastien Charland (https://github.com/mgdm/SimpleHTMLDOM)
 * 
 * Remember to set up your PHP error options to suppress warnings when using this library. 
 * See: https://simplehtmldom.sourceforge.io/manual.htm#errors
 * 
 * Revision 1.11.0 (2019-07-21)
 * - Moved the library to the MIT License.
 * - Code quality improvements.
 * - Added Composer support.
 * 
 * Revision 1.10.0 (2019-07-14)
 * - Removed PHP4 compatibility.
 * - Removed noise (PHP4 compatibility).
 * - Improved code quality.
 * - Added error suppression.
 * - Added test cases.
 * - PSR-4 autoloading support.
 * 
 * Revision 1.9.1 (2019-06-20)
 * - Code cleanup.
 * 
 * Revision 1.9.0 (2019-06-09)
 * - Updated sourceforge URL.
 * - Fixed various errors.
 * - Refactored code.
 * 
 * Revision 1.8.1 (2019-06-02)
 * - Replaced ereg functions with preg functions.
 * - Fixed issues related to PHP 7.
 * - Fixed warning in file_get_html().
 * 
 * Revision 1.8.0 (2019-05-19)
 * - Changed the code structure.
 * - Removed unnecessary functions.
 * - Improved performance.
 * - Added test cases.
 * 
 * Revision 1.7.1 (2019-05-12)
 * - Improved compatibility.
 * 
 * Revision 1.7.0 (2019-05-05)
 * - Refactored code.
 * - Added Composer support.
 * - Added PHPUnit tests.
 * 
 * Revision 1.6.0 (2019-04-28)
 * - Fixed various issues.
 * - Improved compatibility.
 * 
 * Revision 1.5.0 (2019-04-14)
 * - Fixed the issue with file_get_html().
 * - Fixed various issues.
 * 
 * Revision 1.4.1 (2019-03-31)
 * - Fixed PHP 7 compatibility.
 * 
 * Revision 1.4.0 (2019-03-24)
 * - Removed compatibility with PHP 4.
 * - Removed PHP 4 related code.
 * - Fixed various issues.
 * - Improved compatibility with different PHP versions.
 * 
 * Revision 1.3.1 (2019-03-17)
 * - Fixed the issue with PHP 7.
 * 
 * Revision 1.3.0 (2019-03-10)
 * - Changed the library license to MIT.
 * - Removed PHP 4 compatibility.
 * - Removed PHP 4 related code.
 * - Improved code quality.
 * - Added tests.
 * 
 * Revision 1.2.0 (2019-03-03)
 * - Changed the folder structure.
 * - Fixed various issues.
 * - Improved code quality.
 * 
 * Revision 1.1.0 (2019-02-24)
 * - Changed the class name to avoid conflicts with other libraries.
 * - Fixed various issues.
 * - Improved compatibility.
 * - Improved code quality.
 * 
 * Revision 1.0.0 (2019-02-17)
 * - Initial version.
 */

error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

// -----------------------------------------------------------------------------
// UTF-8 and pre-4.3.0

// output <html><body>...</body></html> from HTML content
define('HDOM_TYPE_TEXT', 9997);
// output <html>...</html> from HTML content
define('HDOM_TYPE_HTML', 9998);
// output text from HTML content
define('HDOM_TYPE_BOTH', 9999);

// -----------------------------------------------------------------------------
// UTF-8 and pre-4.3.0

//
