<?php
class Posts extends Controller
{
    private $postModel;
    private $commentModel;
    public function __construct()
    {
        $this->postModel = $this->model('Post');
        $this->commentModel = $this->model('Comment');
        if (!checkUserLog()) {
            redirect('pages');
            die();
        }
    }
    public function index()
    {

        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];

        $this->render('index', $data);
    }

    public function addPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                "title" => trim(filter_input(INPUT_POST, 'postTitle', FILTER_SANITIZE_SPECIAL_CHARS)),
                "content" => trim(filter_input(INPUT_POST, 'postContent', FILTER_SANITIZE_SPECIAL_CHARS)),
                "title_error" => '',
                "content_error" => '',
            ];


            if (empty($data['title'])) {
                $data['title_error'] = "Veuillez entrer un titre";
            }

            if (empty($data['content'])) {
                $data['content_error'] = "Veuillez entrer un contenu";
            }

            if (empty($data['title_error']) && empty($data['content_error'])) {
                if ($this->postModel->addPost($data)) {
                    redirect('posts');
                    flash('Le post a bien été ajouté');
                } else {
                    $this->render('addPost');
                }
            } else {
                $this->render('addPost', $data);
            }
        } else {

            $this->render('addPost');
        }
    }

    public function postDetail($id)
    {
        $data = [
            'post' => $this->postModel->postDetail($id),
            'comments' => $this->commentModel->getComments($id)

        ];
        $this->render('postDetail', $data);
    }

    public function editPost($id)
    {
        $postData = $this->postModel->postDetail($id);
        if (checkUserId() !== $postData->user_id) {
            redirect('posts');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $data = [
                    "title" => trim(filter_input(INPUT_POST, 'postTitle', FILTER_SANITIZE_SPECIAL_CHARS)),
                    "content" => trim(filter_input(INPUT_POST, 'postContent', FILTER_SANITIZE_SPECIAL_CHARS)),
                    "id" => $id,
                    "title_error" => '',
                    "content_error" => '',
                    'post' => $postData
                ];


                if (empty($data['title'])) {
                    $data['title_error'] = "Veuillez entrer un titre";
                }

                if (empty($data['content'])) {
                    $data['content_error'] = "Veuillez entrer un contenu";
                }

                if (empty($data['title_error']) && empty($data['content_error'])) {
                    if ($this->postModel->editPost($data)) {
                        redirect('posts');
                        flash('Le post a bien été édité');
                    } else {
                        $this->render('editPost');
                    }
                } else {
                    $this->render('editPost', $data);
                }
            } else {
                $data = [
                    'post' => $postData
                ];
                $this->render('editPost', $data);
            }
        }
    }

    public function deletePost($id)
    {

        if (checkUserId() !== $this->postModel->postDetail($id)->user_id) {
            flash('Erreur - Action non autorisée', 'alert alert-danger');
            redirect('posts');
        } else {
            if ($this->postModel->deletePost($id)) {
                flash('Le post a bien été supprimé');
                redirect('posts');
            } else {
                flash('Erreur', 'alert alert-danger');
                redirect('posts');
            }
        }
    }

    public function addComment($id)
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                "comment" => trim(filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS)),
                "post_id" => $id,
                "user_id" => $_SESSION['user_id'],
                "comment_error" => '',
            ];

            if (empty($data['comment'])) {
                $data['comment_error'] = "Veuillez entrer un commentaire";
            }

            if (empty($data['comment_error'])) {
                if ($this->commentModel->addComment($data)) {
                    flash('Le commentaire a bien été ajouté');
                    redirect('posts/postDetail/' . $id);
                }
                else{
                    flash('Erreur', 'alert alert-danger');
                    redirect('posts/postDetail/' . $id);
                }
            }
            else{
                redirect('posts/postDetail/' . $id);
            }
        }
    }
}
