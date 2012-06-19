<?php

namespace Jimdo\JimkanbanBundle\Tests\Lib\Printer;
use \Jimdo\JimkanbanBundle\Lib\Printer\PrinterService;
use \Jimdo\JimkanbanBundle\Lib\Printer\GcpPrinter;

class GcpPrinterTest extends \PHPUnit_Framework_TestCase
{
    const SOME_PRINTER_ID = 1;

    /**
     * @test
     */
    public function itShouldUseGcpClientToSubmitPrintJob()
    {
        $somePrinterId = self::SOME_PRINTER_ID;
        $someFile = array(
            'content' => 'dd',
            'mime' => 'aa/bb'
        );

        $client = $this->getMock('\Jimdo\JimkanbanBundle\Lib\Google\GCP\GCPClient', arraY(), array(), '', false);
        $client->expects($this->once())->method('submitPrintJob')->with($somePrinterId, $someFile);

        $printer = new GcpPrinter($client);
        $printer->doPrint($somePrinterId, $someFile);
    }
}