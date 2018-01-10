<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Theme;
use AppBundle\Entity\Category;
use AppBundle\Entity\Quiz;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use \Doctrine\Common\Util\Debug;
use Doctrine\ORM\EntityManagerInterface;
class QuizController extends Controller
{
    /**
     * @Route("/home/", name="Quiz-home-page")
     */
    public function indexAction(Request $request)
    {
//                 $ip = $request->getClientIp();
// if($ip == 'unknown'){
//     $ip = $_SERVER['REMOTE_ADDR'];
// }
// var_dump($ip);
    $animals = $this->getDoctrine()->getRepository(Category::class)->find(1);
    $sports = $this->getDoctrine()->getRepository(Category::class)->find(2);
    $science = $this->getDoctrine()->getRepository(Category::class)->find(3);
    $arts = $this->getDoctrine()->getRepository(Category::class)->find(4);
    $animalsTheme = $animals->getThemes();
    $sportTheme = $sports->getThemes();
    $scienceTheme = $science->getThemes();  
    $artsTheme = $arts->getThemes();
        return $this->render('quiz/index-quiz.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            // 'themes'=> $themes
            'animals' => $animalsTheme,
            'sports' => $sportTheme,
            'sciences' => $scienceTheme,
            'arts' => $artsTheme
        ]);
    }
    /**
     * @Route("/list/{id}", name="Quiz-list-page")
     */
    public function listAction($id)
    {
    $quizs = $this->getDoctrine()->getRepository(Theme::class)->find($id);
    $quizs = $quizs->getQuizs();
        return $this->render('quiz/list-quiz.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'quizs' => $quizs
        ]);
    }
    /**
     * @Route("/list/{quizName}/{quizId}/", name="questions")
     */
    public function questionsAction($quizId, $quizName)
    {
    $quizs = $this->getDoctrine()->getRepository(Quiz::class)->find($quizId);
    $quizs = $quizs->getQuestions();
        return $this->render('quiz/list-questions.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'quizs' => $quizs
        ]);
    }
}
