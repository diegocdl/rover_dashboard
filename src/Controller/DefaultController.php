<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\RoverCmd;
use App\Entity\CameraImg;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(): Response {
        $roverCmd = $this->getDoctrine()->getRepository(RoverCmd::class)->getLast();
        $cameraImg = $this->getDoctrine()->getRepository(CameraImg::class)->getLast();
        return $this->render('index.html.twig', array(
            'cameraImg' => $cameraImg,
            'roverCmd' => $roverCmd
        ));
    }

    /**
     * @Route("/registerRoverCmd")
     */
    public function registerRoverCmd(Request $request): Response {
        $data = json_decode($request->getContent());
        $roverCmd = new RoverCmd();
        $roverCmd->setDatetime( new \DateTime());
        $roverCmd->setOhm1($data->ohm1);
        $roverCmd->setOhm2($data->ohm2);
        $roverCmd->setOhm3($data->ohm3);
        $roverCmd->setOhm4($data->ohm4);

        $em = $this->getDoctrine()->getManager();
        $em->persist($roverCmd);
        $em->flush($roverCmd);
        
        return new Response();
    }

    /**
     * @Route("/registerRoverImg")
     */
    public function registerRoverImg(Request $request): Response {
        $file = $request->files->get('file');
        $img_time = new \DateTime();
        $filename = "rover-" . $img_time->format('YmdHis') . ".jpg";
        $file->move("imgs", $filename);

        $em = $this->getDoctrine()->getManager();
        $img = new CameraImg();
        $img->setDatetimeImg($img_time);
        $img->setFilename($filename);
        $em->persist($img);
        $em->flush();

        return new Response();
    }
}