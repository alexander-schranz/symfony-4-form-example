<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class TestController
{
    public function __construct(
        private FormFactoryInterface $formFactory,
        private Environment $twig,
    ) {
    }

    public function __invoke()
    {
        $form = $this->formFactory->createBuilder()
            ->add('name', TextareaType::class)
            ->getForm();

        return new Response($this->twig->render('base.html.twig', [
            'form' => $form->createView(),
        ]));
    }
}
