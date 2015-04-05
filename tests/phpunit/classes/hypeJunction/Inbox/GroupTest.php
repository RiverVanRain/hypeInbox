<?php

namespace hypeJunction\Inbox;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-12-04 at 10:54:51.
 */
class GroupTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var Group
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		_elgg_services()->setValue('session', new \ElggSession(new \Elgg_Http_MockSessionStorage()));
		$this->object = new Group;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {

	}

	/**
	 * @covers hypeJunction\Inbox\Group::create
	 */
	public function testCreate() {
		$this->assertInstanceOf(get_class($this->object), Group::create(array()));
	}

	/**
	 * @covers hypeJunction\Inbox\Group::add
	 * @covers hypeJunction\Inbox\Group::guids
	 * @covers hypeJunction\Inbox\Group::toGUID
	 */
	public function testAdd() {
		$mock = $this->getMock('\\ElggEntity');
		$mock->expects($this->once())
				->method('getGUID')
				->willReturn(4);

		$guids = $this->object
				->add('foo')
				->add(array('bar', new \stdClass))
				->add(0)
				->add(1)
				->add(array(2, 3))
				->add($mock)
				->add(array(array(5, 6), array(array(7, 8, array(9)))))
				->guids();

		$this->assertEquals(array(1, 2, 3, 4, 5, 6, 7, 8, 9), $guids);
	}

	/**
	 * @covers hypeJunction\Inbox\Group::add
	 * @covers hypeJunction\Inbox\Group::entities
	 * @covers hypeJunction\Inbox\Group::toEntity
	 */
	public function testEntities() {
		$mock = $this->getMock('\\ElggEntity');
		$mock->expects($this->once())
				->method('getGUID')
				->willReturn(4);

		$entities = $this->object
				->add('foo')
				->add(array('bar', new \stdClass))
				->add(0)
				->add(1)
				->add(array(2, 3))
				->add($mock)
				->entities();

		$this->assertInternalType('array', $entities);
		foreach ($entities as $entity) {
			$this->assertInstanceOf('\\ElggEntity', $entity);
		}
	}

}