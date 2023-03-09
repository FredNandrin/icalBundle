<?php

namespace Welp\IcalBundle\Tests\Response;

use Welp\IcalBundle\Component\Calendar;
use Welp\IcalBundle\Response\CalendarResponse;
use Welp\IcalBundle\Tests\CalendarTestCase;

/**
 * Tests for CalendarResponse
 *
 * @package Welp\IcalBundle\Tests\Response
 * @author  Titouan BENOIT <titouan@welp.today>
 */
class CalendarResponseTest extends CalendarTestCase
{
    /**
     * Testing calendar response
     *
     */
    final public function testCalendarResponse(): void
    {
        $calendar = new Calendar();
        $response = new CalendarResponse($calendar, \Symfony\Component\HttpFoundation\Response::HTTP_OK);

        $this->assertInstanceOf(\Symfony\Component\HttpFoundation\Response::class, $response);
        $this->assertInstanceOf(\Welp\IcalBundle\Response\CalendarResponse::class, $response);
        $this->assertEquals(\Symfony\Component\HttpFoundation\Response::HTTP_OK, $response->getStatusCode());

        $this->assertEquals($calendar->export(), $response->getContent());

        $this->assertStringContainsString(
            $calendar->getContentType()."; charset=utf-8",
            $response->headers->get('Content-Type')
        );
        $this->assertStringContainsString($calendar->getFilename(), $response->headers->get('Content-Disposition'));
    }
}
