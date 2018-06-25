<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Visitors;
use App\Entity\Users;
use jonasarts\Bundle\TCPDFBundle\TCPDF\TCPDF;
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
    $user = $this->getUser();
    $data = $_POST;
    //var_dump($user->getUsername());die();

    $pdf = $this->container->get('tcpdf');

    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }
    $pdf->SetFont('helvetica', '', 9);

    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);

    $pdf->setFontSubsetting(false);

    $pdf->AddPage();
    $html = file_get_contents('../src/Controller/pdftemplate.html');
    $pdf->writeHTML($html);
    $pdf->lastPage();
    ob_end_clean();

    $filename = $user->getId();
    $pdf->Output(dirname(__DIR__, 2) . '/generatedpdf/' . $filename, 'F');
    return new Response('we komen er wel');
    }
}

