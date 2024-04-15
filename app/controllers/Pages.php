<?php
// Toujours nommer les fichiers controller au pluriel pour ne pas les confondre avec les fichiers models
class Pages extends Controller
{

    private $postModel;
    public function __construct()
    {
        $this->postModel = $this->model('Post');
    }
    public function index()
    {

        $data = [
            'title' => 'Bonjour ceci est la page index',
            'content' => 'cette page est la page d\'accueil',
        ];

        $this->render('index', $data);
    }
    public function about()
    {
        $this->render('about');
    }
}
