<?php
namespace Jimdo\JimkanbanBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jimdo\JimkanbanBundle\Lib\TemplateData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \Jimdo\JimkanbanBundle\Entity\PrinterRepository;



/**
 * TicketType controller.
 *
 */
class TemplateViewController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Bundle\FrameworkBundle\Controller\Response
     */
    public function ticketAction(Request $request)
    {
        $templateData = $this->getTemplateData();

        return $this->render(
            'JimdoJimkanbanBundle:Template:ticket.html.twig',
            $templateData
        );
    }


    public function ticketprintAction()
    {
        $templateData = $this->getTemplateData(false);

        return $this->render(
            'JimdoJimkanbanBundle:Template:print-ticket.html.twig',
            $templateData
        );
    }

    public function storyAction()
    {
        $templateData = $this->getTemplateData();

        return $this->render(
            'JimdoJimkanbanBundle:Template:story.html.twig',
            $templateData
        );
    }

    public function storyprintAction()
    {
        $templateData = $this->getTemplateData(false);

        return $this->render(
            'JimdoJimkanbanBundle:Template:print-story.html.twig',
            $templateData
        );
    }

    /**
     * @param bool $includePrinters
     * @return array
     */
    private function getTemplateData($includePrinters = true)
    {
        $service = 'jimdo.template_data_view';

        if ($includePrinters) {
            $service .= '_printers';
        }

        $templateDataService = $this->container->get($service);
        $templateData = $templateDataService->getTemplateData();

        return $templateData;
    }
}