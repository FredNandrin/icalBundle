<?php

namespace Welp\IcalBundle\Tests;

use Welp\IcalBundle\Component\Calendar;

/**
 * Abstract calendar test case
 *
 * @package Welp\IcalBundle\Tests
 * @author  Titouan BENOIT <titouan@welp.today>
 */
abstract class CalendarTestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * Assert calendar configs
     *
     * @param Calendar $calendar Actual calendar
     */
    final public function assertCalendar(Calendar $calendar):void
    {
        $this->assertInstanceOf(\Welp\IcalBundle\Component\Calendar::class, $calendar);
        $this->assertInstanceOf(\Jsvrcek\ICS\Model\Calendar::class, $calendar);
    }
}
