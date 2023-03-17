<?php

namespace Welp\IcalBundle\Component;

use Jsvrcek\ICS\Model\Calendar as vCalendar;

use Jsvrcek\ICS\Utility\Formatter;
use Jsvrcek\ICS\CalendarStream;
use Jsvrcek\ICS\CalendarExport;

/**
 * Calendar component
 *
 * @package Welp\IcalBundle\Component
 * @author  Titouan BENOIT <titouan@welp.today>
 */
class Calendar extends vCalendar
{
    final public const MIME_TYPE = 'text/calendar';
    /**
     * String $filename
     */
    private string $filename = 'calendar.ics';

    /**
     * Calendar contentType
     * @return String calendar contentType
     */
    final public function getContentType(): string
    {
        return self::MIME_TYPE;
    }

    /**
     * Export
     * @param Boolean $doImmediateOutput = false
     * @return String .ics formatted text
     */
    final public function export(bool $doImmediateOutput = false): string
    {
        //setup exporter
        $calendarExport = new CalendarExport(new CalendarStream(), new Formatter());
        $calendarExport->addCalendar($this);

        //set exporter to send items directly to output instead of storing in memory
        $calendarExport->getStreamObject()->setDoImmediateOutput($doImmediateOutput);

        //output .ics formatted text
        return $calendarExport->getStream();
    }

    /**
     * Set filename
     */
    final public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     */
    final public function getFilename(): string
    {
        return $this->filename;
    }
}
