<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    /**
     * Undocumented function
     * @Route("/hello/{name}", name="hello", defaults={"name": "bel inconnue"})
     * @param [type] $currentRoute
     * @return void
     */
    public function sayHello($currentRoute)
    {
        $name = $currentRoute['name'];

        require __DIR__ . "/../../pages/hello.php";
    }
}
