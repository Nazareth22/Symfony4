<?php
/**
 * Created by PhpStorm.
 * User: MVYaroslavcev
 * Date: 19/02/19
 * Time: 20:53
 */

namespace App\Controller;


use App\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DefaultController extends AbstractController
{
    public function index()
    {
        $person = $this->getDoctrine()->getRepository(Person::class)->findOneBy(array('name'=>'Иван'));

        return $this->render('site/index.html.twig', array('person'=>$person));
    }

}