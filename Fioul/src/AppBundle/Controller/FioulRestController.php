<?php
/**
 * Created by PhpStorm.
 * User: nizard
 * Date: 29/06/17
 * Time: 00:56
 */

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations


class FioulRestController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Get("fiouls/{id}/{fdate}/{sdate}")
     */
    public function getFioulAction(Request $request)
    {
        $format = 'Y-m-d';
        $id = $request->get('id');
        $firstdate = $request->get('fdate');
        $seconddate = $request->get('sdate');
        $firstdate = \DateTime::createFromFormat($format, $firstdate);
        $seconddate = \DateTime::createFromFormat($format, $seconddate);
        $response = $this->getDoctrine()->getRepository('AppBundle:Fioul')->getFioulbyIdBetweenTwoDate($id, $firstdate, $seconddate);
        if (empty($response))
            return new JsonResponse(['message' => 'No result found'], Response::HTTP_NOT_FOUND);
        return new JsonResponse($response);
    }
}