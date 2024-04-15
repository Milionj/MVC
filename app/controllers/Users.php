<?php
class Users extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                "name" => trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS)),
                "email" => trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)),
                "password" => trim($_POST['password']),
                "confirm_password" => trim($_POST['confirm_password']),
                "name_error" => '',
                "email_error" => '',
                "password_error" => '',
                "confirm_password_error" => '',
            ];
            if (empty($data['name'])) {
                $data['name_error'] = "Veuillez entrer un nom";
            }

            if (empty($data['email'])) {
                $data['email_error'] = "Veuillez entrer votre email";
            } else {
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_error'] = "Veuillez entrer un email valide";
                }

                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_error'] = "Cet email existe déjà";
                }
            }

            if (empty($data['password'])) {
                $data['password_error'] = "Veuillez entrer un mot de passe";
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = "Veuillez confirmer votre mot de passe";
            }

            if (trim($_POST['password']) !== trim($_POST['confirm_password'])) {
                $data['confirm_password_error'] = "Les mots de passe ne sont pas identiques";
            }

            if (empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data)) {
                    redirect('users/login');
                    flash('Vous êtes inscrit avec succès et pouvez vous connecter');
                } else {
                    flash('Une erreur est survenue', "alert alert-danger");
                    $this->render("register");
                }
            } else {
                $this->render("register", $data);
            }
        } else {
            $this->render("register");
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                "email" => trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)),
                "password" => trim($_POST['password']),
                "email_error" => '',
                "password_error" => '',
            ];

            if (empty($data['email'])) {
                $data['email_error'] = "Veuillez entrer votre email";
            }
            else{
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_error'] = "Veuillez entrer un email valide";
                }
                else if (!$this->userModel->findUserByEmail($data['email'])) {
                    $data['email_error'] = "Utilisateur inconnu";
                }

            }

            if (empty($data['password'])) {
                $data['password_error'] = "Veuillez entrer votre mot de passe";
            }

            if (empty($data['email_error']) && empty($data['password_error'])) {
                $loggedInUser = $this->userModel->login($data);
                if ($loggedInUser) {
                    flash("Vous êtes connecté");
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_error'] = "Mot de passe incorrect";
                    $this->render("login", $data);
                }
            } else {
                $this->render("login", $data);
            }
        } else {
            $this->render("login");
        }
    }

    public function createUserSession($user)
    {

        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_role'] = $user->role;
        $_SESSION['user_logged_in'] = true;
        redirect('posts/index');
    }

    public function logout()
    {

        if (isset($_SESSION['user_logged_in'])) {
            session_destroy();
            flash("Vous avez bien été deconnecté");
            redirect('pages/index');
        }
        else {
            flash("Vous devez vous connecter pour pouvoir vous deconnecter");
            redirect('pages/index');
        }
    }
}
