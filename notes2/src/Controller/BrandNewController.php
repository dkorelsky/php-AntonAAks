<?php

namespace App\Controller;

use App\Entity\Notes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BrandNewController extends AbstractController
{
//    /**
//     * @route ("/add-notes/{slug}",name="user-notes")
//     */
    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param $slug
     * @return JsonResponse
     * @Route("/add-notes/{slug}",name="user-notes", methods={"PUT"})
     */
    public function addNote(Request $request,EntityManagerInterface $entityManager, $slug)
    {
        try{
            $note = new Notes();
            $note->setLogin($slug);
            $note->setContent($request->get('content'));
            $note->setDate(new \DateTime('now'));

            $entityManager->persist($note); // persist - нанчинает отслеживать изменения $note

            $entityManager->flush();// flush - пушит изменения в базу

            $data = [
                'status' => 200,
                'success' => "Note added successfully",
            ];
            return $this->response($data, 200);

        }catch (\Exception $e){
            $data = [
                'status' => 422,
                'errors' => "Data no valid",
            ];
            return $this->response($data, 422);
        }

    }
}
