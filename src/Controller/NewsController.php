<?php

namespace App\Controller;

use App\Entity\News;
use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="app_news")
     */
    public function index(NewsRepository $NewsRepository): Response
    {
        $allNewsFromBDD = $NewsRepository->findAll();

        return $this->render('news/index.html.twig', [
            "allNews" => $allNewsFromBDD,
            'controller_name' => 'NewsController',
        ]);
    }
        public function show(
        $id,
        $slug, 
        NewsRepository $NewsRepository
        ): Response
    {
        // dump($index);
        // TODO : aller chercher le bon film dans le BDD : MovieRepository->find()
        $news = $NewsRepository->find($id);
        // ? si le slug n'est pas bon on va rediriger vers la bonne URL, pour le référencement
        if ($slug != $news->getSlug()){
            return $this->redirectToRoute("app_news", ["id" => $news->getId(), "slug" => $news->getSlug()]);
        }
        // on utilise le findOneBy() en précisant la propriété sur laquelle on cherche, et sa valeur
        // "slug" => $slug
        // $movie = $movieRepository->findOneBy(["slug" => $slug]);
        

        // TODO : si le film n'existe pas je doit renvoyer une 404
        // ! sinon cela va me faire une erreur coté twig
        // dd($movie); // null
        if ($news === null){
            // renvoyer une 404
            // on lance un exception 404 (notFound)
            // symfony va l'attraper et changer la réponse en réponse 404
            throw $this->createNotFoundException("la news n'existe pas");
        }

        return $this->render("news/index.html.twig", 
        [
            // "movieIndex" => $index, // ne sert plus, relique du temps où on avait pas de BDD
            "newsForView" => $news
        ]);
    }

}
