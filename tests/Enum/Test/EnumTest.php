<?php
/**
 * EnumTest.php
 *
 * @author      Nick van Ginkel <nick@videodock.com>
 * @copyright   2016 Video Dock b.v.
 *
 * This file is part of the enum project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Videodock\Component\Enum\Test;

use Videodock\Component\Enum\Helpers\EnumHelper;

class EnumTest extends \PHPUnit_Framework_TestCase
{

    private function createTrait()
    {
        $trait = '\Videodock\Component\Enum\Enum';
        return $this->getObjectForTrait($trait);
    }

    public function setUp()
    {
        $this->createTrait();
    }

    /**
     * @test
     */
    public function it_detects_proper_values_and_constants()
    {
        $enum = new FakeEnum();

        \PHPUnit_Framework_Assert::assertContains('SOME_KEY', $enum->keys());
        \PHPUnit_Framework_Assert::assertArrayHasKey('SOME_KEY', $enum->values());
        \PHPUnit_Framework_Assert::assertArrayNotHasKey('some-value',$enum->values());

        \PHPUnit_Framework_Assert::assertContains('some-value', $enum->values());
        \PHPUnit_Framework_Assert::assertSame('SOME_KEY', $enum->getConstantForValue('some-value'));

        \PHPUnit_Framework_Assert::assertTrue($enum->has('some-value'));
        \PHPUnit_Framework_Assert::assertFalse($enum->has('SOME-VALUE'));
    }

    /**
     * @test
     */
    public function it_can_be_validated_as_an_enum()
    {
        \PHPUnit_Framework_Assert::assertTrue(EnumHelper::isEnum(FakeEnum::class));
        \PHPUnit_Framework_Assert::assertFalse(EnumHelper::isEnum(WrongEnum::class));
    }
}
