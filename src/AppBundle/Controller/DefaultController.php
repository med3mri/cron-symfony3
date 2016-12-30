<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */    
    public function indexAction(Request $request) {
        return $this->render('AppBundle:form:documentation.html.twig');
    }
    /**
     * @Route("/cronform", name="cronform")
     */    
    public function cronformAction(Request $request) { 
        
        $url  = $this->getParameter('pathfile');
        if(file_exists($url)){

            $names=file($url);	
            $i = 0;	
            $formBuilder = $this->createFormBuilder($names);
            foreach($names as $name)
            {
                $formBuilder->add("Heure$i", TextType::class,array('data'=> preg_replace('/\\\n/m', '', $name),'attr' => array('class'=>'form-control')));
                $i++;
            }		
               $form = $formBuilder->getForm();
                return $this->render('AppBundle:form:index.html.twig', array(
                        'form' => $form->createView(),
                ));
        }
        else{
        return $this->render('AppBundle:form:index.html.twig');
}
    }    
}
