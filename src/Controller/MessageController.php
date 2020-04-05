<?php

namespace App\Controller;

use App\Entity\Email;
use App\Message\EmailNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        $email = new Email();
        $email->setContent('');

        $form = $this->createFormBuilder($email)
            ->setAction($this->generateUrl('send_email'))
            ->add('content', TextareaType::class, ['attr' => ['rows' => 10, 'cols' => 30]])
            ->add('save', SubmitType::class, ['label' => 'Add to queue'])
            ->getForm();

        return $this->render('emails/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/send", name="send_email", methods={"POST"})
     */
    public function send(Request $request)
    {
        $form = $request->request->get('form');
        for ($i = 0 ; $i < 100000 ; ++$i) {
            $this->dispatchMessage(new EmailNotification($form['content'] . ' ' . $i));
        }
        $this->addFlash(
            'notice',
            'Email was send to queue!'
        );

        return $this->redirectToRoute('home');
    }
}