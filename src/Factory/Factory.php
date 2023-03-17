<?php

namespace Welp\IcalBundle\Factory;

use Welp\IcalBundle\Component\Calendar;

use Jsvrcek\ICS\Model\CalendarEvent;
use Jsvrcek\ICS\Model\CalendarAlarm;
use Jsvrcek\ICS\Model\CalendarFreeBusy;
use Jsvrcek\ICS\Model\CalendarTodo;

use Jsvrcek\ICS\Model\Relationship\Attendee;
use Jsvrcek\ICS\Model\Relationship\Organizer;

use Jsvrcek\ICS\Model\Description\Geo;
use Jsvrcek\ICS\Model\Description\Location;

use Jsvrcek\ICS\Model\Recurrence\RecurrenceRule;

use Jsvrcek\ICS\Utility\Formatter;
use Jsvrcek\ICS\CalendarStream;
use Jsvrcek\ICS\CalendarExport;

/**
 * Calendar Factory
 *
 * @package Welp\IcalBundle\Factory
 * @author  Titouan BENOIT <titouan@welp.today>
 */
class Factory
{
    private ?\DateTimeZone $timezone = null;
    private ?string $prodid = null;

    /**
     * Create new calendar
     */
    final public function createCalendar(): Calendar
    {
        $calendar = new Calendar();

        if (!is_null($this->timezone)) {
            $calendar->setTimezone($this->timezone);
        }

        if (!is_null($this->prodid)) {
            $calendar->setProdId($this->prodid);
        }

        return $calendar;
    }

    /**
     * Create new CalendarEvent
     */
    final public function createCalendarEvent(): CalendarEvent
    {
        return new CalendarEvent();
    }

    /**
     * Create new CalendarAlarm
     */
    final public function createCalendarAlarm(): CalendarAlarm
    {
        return new CalendarAlarm();
    }

    /**
     * Create new CalendarFreeBusy
     */
    final public function createCalendarFreeBusy(): CalendarFreeBusy
    {
        return new CalendarFreeBusy();
    }

    /**
     * Create new CalendarTodo
     */
    final public function createCalendarTodo(): CalendarTodo
    {
        return new CalendarTodo();
    }

    /**
     * Create new Attendee
     */
    final public function createAttendee(): Attendee
    {
        return new Attendee(new Formatter());
    }

    /**
     * Create new Organizer
     */
    final public function createOrganizer(): Organizer
    {
        return new Organizer(new Formatter());
    }

    /**
     * Create new Geo
     */
    final public function createGeo(): Geo
    {
        return new Geo();
    }

    /**
     * Create new Location
     */
    final public function createLocation(): Location
    {
        return new Location();
    }

    /**
     * Create new RecurrenceRule
     */
    final public function createRecurrenceRule(): RecurrenceRule
    {
        return new RecurrenceRule(new Formatter());
    }

    /**
     * Set default timezone for calendars
     */
    final public function setTimezone(string $timezone): void
    {
        $this->timezone = new \DateTimeZone($timezone);
    }

    /**
     * Set default prodid for calendars
     *
     * @param string $prodid
     */
    final public function setProdid(?string $prodid): void
    {
        $this->prodid = $prodid;
    }
}
