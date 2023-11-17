<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index( 
        Request $request , 
        ManagerRegistry $doctrine , 
        MailerInterface $mailer
        ): Response
    {

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request) ;

        if($form->isSubmitted()){
            if($form->isValid()){
                $em = $doctrine->getManager();
                $em->persist($contact);
                $em->flush();

                $email = new Email();
                $email->from("malik.h@webdevpro.net")
                      ->to($contact->getDestinataire())
                      ->subject("tester 3rd party SMTP : Sending Blue")
                      ->text($contact->getMessage())
                      ->html("<p>{$contact->getMessage()}</p>");

                $email = new TemplatedEmail();
                $email->from("malik.h@webdevpro.net")
                      ->to($contact->getDestinataire())
                      ->subject("tester 3rd party SMTP : Sending Blue")
                      ->htmlTemplate("emails/first.html.twig")
                      ->context([
                        "to" => $contact->getDestinataire() ,
                        "message" => $contact->getMessage()
                      ]);
                      
                $mailer->send($email);
                
                $this->addFlash("message" , "message ajouté en base de donnée et email envoyé à {$contact->getDestinataire()}");
            } else {
                $this->addFlash("erreur" , "une erreur dans la saisie du formulaire");
            }
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'Envoyer des emails depuis un formulaire',
            'form' => $form->createView()
        ]);
    }
}
