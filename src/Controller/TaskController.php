<?php

namespace App\Controller;

use Exception;
use Symfony\Component\Routing\Annotation\Route;

class TaskController
{
    /**
     * Undocumented function
     * @Route("/", name="list")
     * @param array $currentRoute
     * @return void
     */
    public function index(array $currentRoute)
    {
        $urlGenerator = $currentRoute["urlGenerator"];
        $data = require_once 'data.php';

        require __DIR__ . "../../../pages/list.php";
    }

    /**
     * Undocumented function
     * @Route("/show/{id}", name="show", requirements={"id" : "\d+"})     
     * @param array $currentRoute
     * @return void
     */
    public function show(array $currentRoute)
    {
        $id = $currentRoute['id'];
        $urlGenerator = $currentRoute["urlGenerator"];
        $data = require_once "data.php";

        if (!$id || !array_key_exists($id, $data)) {
            throw new Exception("La tâche demandée n'existe pas !");
        }
        $task = $data[$id];

        require __DIR__ . "../../../pages/show.php";
    }

    /**
     * Undocumented function
     * @Route("/create", name="create", host="localhost", 
     *        schemes={"http", "https"}, methods={"GET","POST"}) 
     * @param array $currentRoute
     * @return void
     */
    public function create(array $currentRoute)
    {
        $urlGenerator = $currentRoute["urlGenerator"];

        // Si la requête arrive en POST, c'est qu'on a soumis le formulaire :
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Traitement à la con (enregistrement en base de données, 
            //redirection, envoi d'email, etc)...
            var_dump("Bravo, le formulaire est soumis (TODO : traiter les données)", $_POST);

            // Arrêt du script
            return;
        }

        require __DIR__ . "../../../pages/create.php";
    }
}
