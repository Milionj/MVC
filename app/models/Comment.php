<?php
class Comment
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addComment($data)
    {
        $this->db->query('INSERT INTO comments (content, post_id, user_id, date) VALUES (:content, :post_id, :user_id, NOW())');
        $this->db->bind(':content', $data['comment'], PDO::PARAM_STR);
        $this->db->bind(':post_id', $data['post_id'], PDO::PARAM_STR);
        $this->db->bind(':user_id', $data['user_id'], PDO::PARAM_STR);
        $res = $this->db->execute();

        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function getComments($id)
    {
        $this->db->query('SELECT comments.*, users.name FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.post_id = :id');
        $this->db->bind(':id', $id, PDO::PARAM_STR);
        return $this->db->findAll();
    }
}
