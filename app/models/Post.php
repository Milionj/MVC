<?php 

// Toujours nommer les fichiers models au singulier pour ne pas les confondre avec les fichiers controllers
class Post
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query('SELECT posts.*, users.name FROM posts INNER JOIN users ON posts.user_id = users.id');
        return $this->db->findAll();
    }
    public function addPost($data){
        $this->db->query('INSERT INTO posts (title, content, user_id) VALUES (:title, :content, :user_id)');
        $this->db->bind(':title',$data['title'] , PDO::PARAM_STR);
        $this->db->bind(':content', $data['content'], PDO::PARAM_STR);
        $this->db->bind(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
        $res = $this->db->execute();

        if($res){
            return true;
        } else {
            return false;
        }
    }

    public function postDetail($id)
    {

        $this->db->query('SELECT posts.*, users.name FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id = :id');
        $this->db->bind(':id', $id, PDO::PARAM_STR);
        return $this->db->findOne();
    }

    public function editPost($data){
        $this->db->query('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        $this->db->bind(':title',$data['title'] , PDO::PARAM_STR);
        $this->db->bind(':content', $data['content'], PDO::PARAM_STR);
        $this->db->bind(':id', $data['id'], PDO::PARAM_STR);
        $res = $this->db->execute();
        if($res){
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id, PDO::PARAM_STR);
        $res = $this->db->execute();
        if($res){
            return true;
        } else {
            return false;
        }
    }
}
