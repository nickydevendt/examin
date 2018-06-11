<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Visitors;
use App\Entity\Users;

class Pdfcreator extends Controller
{
    /**
    * @Route("/letscreate")
    * @Security("has_role('ROLE_USER') || has_role('ROLE_VISITOR') || has_role('ROLE_ADMIN')")
    */
    public function CreatePage() {
        return $this->render('resumecreator.html.twig', array(
        'session' => $_SESSION, 'user' => $this->getUser(),
        ));
    }

    /**
     * @Route("/letscreate/building")
     *  @Security("has_role('ROLE_USER') || has_role('ROLE_ADMIN') || has_role('ROLE_VISITOR')")
     */
    public function buildpdf() {
    // create new pdf document
    $data = $_POST;
    //var_dump($data);

    $pdf = $this->container->get('tcpdf');
    //$pdf = TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }
    $pdf->SetFont('helvetica', '', 9);

    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->AddPage();
    $html = file_get_contents('../src/Controller/pdftemplate.html');
    $pdf->writeHTML($html);
    $pdf->lastPage();
    ob_end_clean();
    //ob_clean();
    $filename = 'blarps';
    $pdf->Output(dirname(__DIR__, 2) . '/generatedpdf/' . $filename, 'F');
    return new Response('we komen er wel');
    }
}

