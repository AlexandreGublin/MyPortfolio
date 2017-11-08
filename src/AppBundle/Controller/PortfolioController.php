<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PortfolioController extends Controller
{

    /**
     * @Route("/", name="portfolio")
     */
    public function showPortfolioAction(Request $request)
    {
        $cleanName = $cleanEmail = $cleanSubject = $cleanData = $result = null;

        //Création d'un formulaire sans entité
        $form = $this->createFormBuilder()
            ->add('nom', TextType::class)
            ->add('email', EmailType::class)
            ->add('sujet', TextType::class)
            ->add('message', TextareaType::class)
            ->add('envoyer', SubmitType::class, array('label' => 'Submit'))
            ->getForm();

        //Traiter les données reçu
        $form->handleRequest($request);

        //Si on appuie sur le btn envoyer et que le formulaire est valide
        if ($form->isSubmitted() && $form->isValid()) {
            //Mise en variable des données nécessaires
            $name = $form['nom']->getData();
            $email = $form['email']->getData();
            $subject = $form['sujet']->getData();
            $data = $form['message']->getData();

            //Nettoyage des variables
            $cleanName = filter_var($name, FILTER_SANITIZE_STRING);
            $cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
            $cleanSubject = filter_var($subject, FILTER_SANITIZE_STRING);
            $cleanData = filter_var($data, FILTER_SANITIZE_STRING);


            //Création de l'objet du message
            $message = new \Swift_Message();
            $message->setSubject($cleanSubject);
            $message->setFrom(
                $cleanEmail
            );
            $message->setTo('alexandre.gublin@imerir.com');
            $message->setBody($cleanData);

            //On passe notre mesage a mailer pour qu'il l'envoie
            $result = $this->get('mailer')->send($message);


//            //Création d'une session
//            $session = new Session();
//
//            //Message d'erreur/succès
//            if($result == 1){
//                $session->getFlashBag()->add('notificationEmail','Email sent.');
//
//            }
//            $session->getFlashBag()->add('notificationEmail',"Error, mail not sent.");
//            $result = 0;

        }

        //Renvoyer sur la page contact avec le formulaire
        return $this->render('portfolio/portfolio.html.twig', array('form' => $form->createView()
        ));
    }

    /**
     * @Route("/test/", name="test")
     */
    public function testAction()
    {
        return $this->render('portfolio/test.html.twig');
    }
}
