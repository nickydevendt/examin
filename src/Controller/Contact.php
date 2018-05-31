<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class Contact extends Controller
{
    /**
        * @Route("/contact")
        */
    public function Contact() {
        return $this->render('contact.html.twig', array(
        'session' => $_SESSION,
        ));
    }
    /**
     * @Route("/contact/sendmail")
     */
    public function sendMail() {
        var_dump('fuck you');
        if(isset($_POST['contactsend'])) {
            $email = $_POST['email'];
            $pattern = '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i';

            if(preg_match($pattern ,$email) && isset($_POST['name']) && !empty($_POST['name'])) {
                if(isset($_POST['contactsend']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
                    try {
                        $to         = 'nicky@sensimedia.nl';
                        $subject    = "message from contact page!";
                        $message    = array(
                            $_POST['name'],
                            $_POST['phone'],
                            $_POST['message']
                            );
                        $headers    = "from: " . $_POST['email'];
                        $mail = mail($to,$subject,implode("\r\n", $message), $headers);
                        if($mail) {
                            return '<div class="alert succes">
                            <span class="closebtn">&times;</span>
                            <strong>Succes!</strong> The email was send I will come back to you shortly.
                            </div>';
                        }
                    } catch(Exception $e) {
                        $message =  '<div class="alert">
                        <span class="closebtn">&times;</span>
                        <strong>Danger!!</strong> something went wrong try again or comeback at a later time.
                        </div>';
                        return $message;
                    }
                }
            }else {
                $message =  '<div class="alert">
                    <span class="closebtn">&times;</span>
                    <strong>Small error!!</strong> email pattern doesnt apply for normal email standards there is probably a mistake inside your email adres you gave in!.
                    </div>';
                return $message;
            }
        }
    }
}

