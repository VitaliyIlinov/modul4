<?php

class Comments extends Model
{

    public function getCommentById($id_comment){
        $sql = "SELECT u.login, c.* FROM comments c
        left join users u on u.id=c.id_user
        where id_comment='{$id_comment}'";
        return $this->db->query($sql);
    }
    
    public function get_comments($id_news)
    {
        $sql = "SELECT u.login, c.* FROM comments c
        left join users u on u.id=c.id_user
        where id_news='{$id_news}' order by id_parent,date_time desc";
        $result = $this->db->query($sql);
        foreach ($result as $key => $value) {
            if ($value['id_parent'] == 0) {
                $results[$value['id_comment']] = $value;
            } else {
                $results[$value['id_parent']]['childs'][] = $value;
            }
        }
        $results['count'] = count($result);
        return $results;
    }

    public function top_commentators($limit=5){
        $sql="select c.*,count(*) as cnt,u.login from comments c
              left join users u on u.id=c.id_user
              group by c.id_user order by cnt desc
              limit {$limit}";
        return $this->db->query($sql);
    }

    public function getCommentCnt($id_user,$limit){
        $sql="select count(*) as cnt from comments where id_user={$id_user}";
        $cnt_pages=$this->db->query($sql);
        $result= ceil($cnt_pages[0]['cnt']/$limit);
        return $result;
    }

    public function getThemes($limit=3){
        $sql="select c.*,n.title_news from (select max(date_time) datet,id_news from comments 
group by id_news limit {$limit}) c
left join news n on n.id_news=c.id_news";
        return $this->db->query($sql);

    }

    public function getCommentsByUser($id_user,$page=0,$limit=5){
        $page=$page*$limit;
        $sql="select c.*,n.title_news,u.login from comments c
              left join users u on u.id=c.id_user
              left join news n on n.id_news=c.id_news
              where c.id_user ={$id_user} order by  c.date_time desc limit {$page},{$limit} ";
        $result['comment']= $this->db->query($sql);
        $result['count_page']=$this->getCommentCnt($id_user,$limit);
        return $result;
    }
    
    public function vote($id_comment, $type)
    {
        if(!Session::get('login')){
            echo json_encode(array('result' => 'Login please'));
            exit;
        }
        $user = Session::get('login');
        $sql = "Select v.*,u.login from votes_comment v
        left join users u on u.id=v.id_user where id_comment={$id_comment} and
         u.login like '%$user%'";

        $result = $this->db->query($sql);
        $get_user = $this->db->query("select id from users where login like'%$user%'");
        if (!isset($result[0])) {
            $sql = "INSERT INTO votes_comment (id_comment,id_user)
             VALUES ({$id_comment},{$get_user[0]['id']})";
            $this->db->query($sql);
            $this->cnt_like($id_comment, $type);
        } else {
            header('Content-Type: text/json; charset=utf-8');
            echo json_encode(array('result' => 'you are voted this news'));
            exit;
        }
    }


    public function cnt_like($id_comment, $type)
    {
        $type = 'cnt_' . $type;
        $sql = ("UPDATE comments SET {$type}=({$type}+1) WHERE id_comment='{$id_comment}'");
        $result = $this->db->query($sql);
        header('Content-Type: text/json; charset=utf-8');
        echo json_encode(array('result' => 'success'));
        exit;
    }

    public function add_comment($id_user, $id_news, $comment, $id_parent = 0)
    {
        //$id_parent = !empty($data['id_parent']) ? $data['id_parent'] : null;
        $sql_user = "select id,login from users where login like '%{$id_user}%'";
        $comment = htmlspecialchars($this->db->escape($comment));
        if ($result = $this->db->query($sql_user)) {
            $id_user = $result[0]['id'];
        }
        $sql = "
            insert into comments
            set id_user='{$id_user}',
                id_news='{$id_news}',
                comment='{$comment}',
                id_parent='{$id_parent}'
            ";
        $this->db->query($sql);
        return $this->db->last_id();
    }

    public function change_comment($comment,$id_comment){
        $sql="update comments set comment='{$comment}' where id_comment ={$id_comment}";
        $result=$this->db->query($sql);
        echo json_encode(array('result' => 'success'));
        exit;
    }
}