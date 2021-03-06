<?php
/**
 * PHPCompatibility, an external standard for PHP_CodeSniffer.
 *
 * @package   PHPCompatibility
 * @copyright 2012-2020 PHPCompatibility Contributors
 * @license   https://opensource.org/licenses/LGPL-3.0 LGPL3
 * @link      https://github.com/PHPCompatibility/PHPCompatibility
 */

namespace PHPCompatibility\Tests\UseDeclarations;

use PHPCompatibility\Tests\BaseSniffTest;

/**
 * Test the NewUseConstFunction sniff.
 *
 * @group newUseConstFunction
 * @group useDeclarations
 *
 * @covers \PHPCompatibility\Sniffs\UseDeclarations\NewUseConstFunctionSniff
 *
 * @since 7.1.4
 */
class NewUseConstFunctionUnitTest extends BaseSniffTest
{

    /**
     * testNewUseConstFunction
     *
     * @dataProvider dataNewUseConstFunction
     *
     * @param int $line The line number.
     *
     * @return void
     */
    public function testNewUseConstFunction($line)
    {
        $file = $this->sniffFile(__FILE__, '5.5');
        $this->assertError($file, $line, 'Importing functions and constants through a "use" statement is not supported in PHP 5.5 or lower.');
    }

    /**
     * Data provider dataNewUseConstFunction.
     *
     * @see testNewUseConstFunction()
     *
     * @return array
     */
    public function dataNewUseConstFunction()
    {
        return array(
            array(29),
            array(30),
            array(31),
            array(32),
        );
    }


    /**
     * testNoFalsePositives
     *
     * @dataProvider dataNoFalsePositives
     *
     * @param int $line The line number.
     *
     * @return void
     */
    public function testNoFalsePositives($line)
    {
        $file = $this->sniffFile(__FILE__, '5.5');
        $this->assertNoViolation($file, $line);
    }

    /**
     * Data provider.
     *
     * @see testNoFalsePositives()
     *
     * @return array
     */
    public function dataNoFalsePositives()
    {
        return array(
            array(7),
            array(8),
            array(9),
            array(15),
            array(19),
            array(24),
            array(37),
            array(38),
            array(39),
            array(45),
            array(46),
            array(51),
        );
    }


    /**
     * Verify no notices are thrown at all.
     *
     * @return void
     */
    public function testNoViolationsInFileOnValidVersion()
    {
        $file = $this->sniffFile(__FILE__, '5.6');
        $this->assertNoViolation($file);
    }
}
