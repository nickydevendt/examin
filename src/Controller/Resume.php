<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class Resume extends Controller
{
    /**
    * @Route("/resume")
    */
    public function Resume() {
        $_SESSION['admin'] = 0;
        $_SESSION['userid'] = 0;

        return $this->render('resume.html.twig', array(
        'session' => $_SESSION,
        ));
    }
    /**
    *   @Route("/resume/nlpdf")
    */
    public function getDutchPdf() {
    // this needs async loading.....
        $pdfdir = dirname(__DIR__, 2). '/generatedpdf/';

        if(isset($_POST['nlpdf'])) {
            $file = dirname(__DIR__,2) . '/generatedpdf/' . 'nl-nickydevendt.pdf';

            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            }
            if(!file_exists($file)) {
                $message =  '<div class="alert">
                <span class="closebtn">&times;</span>
                <strong>Error</strong> Doesnt exist!
                </div>';
                echo $message;
            }
        }
    }

    /**
    *   @Route("/resume/ukpdf")
    */
    public function getUkPdf() {

    }

    /**
    *   @Route("/resume/gerpdf")
    */
    public function getGerPdf() {

    }
}

