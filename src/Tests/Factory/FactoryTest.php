<?php

namespace Welp\IcalBundle\Tests\Factory;

use Jsvrcek\ICS\Model\CalendarAlarm;
use Jsvrcek\ICS\Model\CalendarEvent;
use Jsvrcek\ICS\Model\CalendarFreeBusy;
use Jsvrcek\ICS\Model\CalendarTodo;
use Jsvrcek\ICS\Model\Description\Geo;
use Jsvrcek\ICS\Model\Description\Location;
use Jsvrcek\ICS\Model\Recurrence\RecurrenceRule;
use Jsvrcek\ICS\Model\Relationship\Attendee;
use Jsvrcek\ICS\Model\Relationship\Organizer;
use Welp\IcalBundle\Component\Calendar;
use Welp\IcalBundle\Factory\Factory;
use Welp\IcalBundle\Tests\CalendarTestCase;

/**
 * Tests for calendar factory
 *
 * @package Welp\IcalBundle\Tests
 * @author  Titouan BENOIT <titouan@welp.today>
 */
class FactoryTest extends CalendarTestCase
{

    /**
     * @var Factory
     */
    protected $factory;


    /**
     * Set up tests
     */
    final public function setUp(): void
    {
        $this->factory = new Factory();
    }


    /**
     * Test initiating factory
     */
    final public function testInit(): void
    {
        $this->assertInstanceOf(Factory::class, $this->factory);
    }


    /**
     * Test creating new calendar
     *
     */
    final public function testCreateCalendar(): void
    {
        $calendar = $this->factory->createCalendar();
        $this->assertCalendar($calendar);
    }

    /**
     * Test creating new calendarEvent
     *
     */
    final public function testCreateCalendarEvent(): void
    {
        $calendarEvent = $this->factory->createCalendarEvent();
        $this->assertInstanceOf(CalendarEvent::class, $calendarEvent);
    }

    /**
     * Test creating new calendarAlarm
     *
     */
    final public function testCreateCalendarAlarm(): void
    {
        $calendarAlarm = $this->factory->createCalendarAlarm();
        $this->assertInstanceOf(CalendarAlarm::class, $calendarAlarm);
    }

    /**
     * Test creating new calendarFreeBusy
     *
     */
    final public function testCreateCalendarFreeBusy(): void
    {
        $calendarFreeBusy = $this->factory->createCalendarFreeBusy();
        $this->assertInstanceOf(CalendarFreeBusy::class, $calendarFreeBusy);
    }

    /**
     * Test creating new calendarTodo
     *
     */
    final public function testCreateCalendarTodo(): void
    {
        $calendarTodo = $this->factory->createCalendarTodo();
        $this->assertInstanceOf(CalendarTodo::class, $calendarTodo);
    }

    /**
     * Test creating new Attendee
     *
     */
    final public function testCreateAttendee(): void
    {
        $attendee = $this->factory->createAttendee();
        $this->assertInstanceOf(Attendee::class, $attendee);
    }

    /**
     * Test creating new Organizer
     *
     */
    final public function testCreateOrganizer(): void
    {
        $organizer = $this->factory->createOrganizer();
        $this->assertInstanceOf(Organizer::class, $organizer);
    }

    /**
     * Test creating new Geo
     *
     */
    final public function testCreateGeo(): void
    {
        $geo = $this->factory->createGeo();
        $this->assertInstanceOf(Geo::class, $geo);
    }

    /**
     * Test creating new Location
     *
     */
    final public function testCreateLocation(): void
    {
        $location = $this->factory->createLocation();
        $this->assertInstanceOf(Location::class, $location);
    }

    /**
     * Test creating new RecurrenceRule
     *
     */
    final public function testCreateRecurrenceRule(): void
    {
        $recurrenceRule = $this->factory->createRecurrenceRule();
        $this->assertInstanceOf(RecurrenceRule::class, $recurrenceRule);
    }

    /**
     * Test timezone
     *
     */
    final public function testTimezone(): void
    {
        $this->factory->setTimezone('Europe/Paris');
        $calendar = $this->factory->createCalendar();
        $this->assertCalendar($calendar);
        $this->assertInstanceOf('\DateTimeZone', $calendar->getTimezone());
        $this->assertEquals('Europe/Paris', $calendar->getTimezone()->getName());

    }

}
