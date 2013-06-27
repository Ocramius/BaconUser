<?php
/**
 * BaconUser
 *
 * @link      http://github.com/Bacon/BaconUser For the canonical source repository
 * @copyright 2013 Ben Scholzen 'DASPRiD'
 * @license   http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */

namespace BaconUserTest\Repository;

use BaconUser\Entity\PasswordResetRequest;
use BaconUser\Repository\PasswordResetRepository;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * @covers BaconUser\Repository\PasswordResetRepository
 */
class PasswordResetRepositoryTest extends TestCase
{
    public function testCanRetrieveObject()
    {
        $adapter    = $this->getMock('Doctrine\Common\Persistence\ObjectRepository');
        $repository = new PasswordResetRepository($adapter);

        $adapter->expects($this->once())
                ->method('findOneBy')
                ->with(array('email' => 'test@test.com'))
                ->will($this->returnValue(new PasswordResetRequest()));

        $password = $repository->findOneByEmail('test@test.com');

        $this->assertInstanceOf('BaconUser\Entity\PasswordResetRequest', $password);
    }
}