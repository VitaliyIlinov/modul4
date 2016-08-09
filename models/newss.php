<?php

class Newss extends Model
{
    public function getListIndex($limit = 5, $order = 'date_news')
    {
        $sql = "SELECT a.*,cc.category_name FROM news AS a ";
        $sql .= " left join category cc on cc.id_category=a.id_category ";
        $sql .= " WHERE a.id_news IN (SELECT id_news FROM news AS b ";
        $sql .= " WHERE b.id_category = a.id_category AND (SELECT COUNT(*) FROM news AS c WHERE c.id_news >= b.id_news AND c.id_category = b.id_category) <=$limit) ";
        $sql .= " order by a.id_category, {$order} desc";
        return $this->db->query($sql);
    }
    public function getCountPages($limit = 5)
    {
        $sql = "select count(id_news) as COUNT from news";
        $count_news = $this->db->query($sql);
        $total_rows = ($count_news[0]['COUNT']);
        $num_pages = ceil($total_rows / $limit);
        return $num_pages;
    }


    public function getTagsList()
    {
        $sql = "select * from tags ";
        $result = $this->db->query($sql);
        for ($i = 0; $i < count($result); $i++) {
            $results[$result[$i]['id_tag']] = $result[$i]['tag_name'];
        }
        return $results;
    }
    
    public function is_tags($id)
    {
        $id = (int)$id;
        //$sql = "select * from news where id_news='{$id}' limit 1";
        $sql = "SELECT  t.id_tag,t1.tag_name from news n
                right join tag_news t on t.id_news=n.id_news
                left join tags t1 on t1.id_tag=t.id_tag
                where n.id_news='{$id}'";
        $result = $this->db->query($sql);
        if ($result) {
            for ($i = 0; $i < count($result); $i++) {
                $results[$result[$i]['id_tag']] = $result[$i]['tag_name'];
            }
            return $results;
        }
        return false;
    }

    public function getNewsListById($id)
    {
        $sql = "select n.*,t1.id_tag,t1.tag_name from news n
                left join tag_news t on t.id_news=n.id_news
                left join tags t1 on t1.id_tag=t.id_tag 
                where n.id_news={$id}";
        $content = $this->db->query($sql);
        $content = array_pop($content);

        if (!Session::get('login') && $content['is_analitic'] == 1) {
            $content['content_news'] = $this->is_analitic($content['content_news'],5);
        }
        if ($tags = $this->is_tags($id)) {
            $content['tags'] = $tags;
        }
        return $content;
    }
    
    public function is_analitic($content, $row = 5)
    {
        $sentences = explode('.', $content);
        $content = '';
        for ($i = 0; $i < $row; $i++) {
            if (!isset($sentences[$i])) {
               return $content;
            }
            $content .= $sentences[$i] . '.';
        }
        return $content .= ' <a href="/users/login/">Зарегистрироваться...</a>';
    }

    public function getNewsListByTagId($id)
    {
        $sql = "select n.*,t1.id_tag,t1.tag_name from news n
                left join tag_news t on t.id_news=n.id_news
                left join tags t1 on t1.id_tag=t.id_tag 
                where t1.id_tag={$id}";
        return $this->db->query($sql);
    }


    public function getCategoryList($limit = 15, $order = 'date_news')
    {
        $sql = "SELECT * FROM category ";
        $result = $this->db->query($sql);
        for ($i = 0; $i < count($result); $i++) {
            $results[$result[$i]['id_category']] = $result[$i]['category_name'];
        }
        //echo "<pre>";print_r($results);exit;
        return $results;
    }

    public function getCategoryById($id)
    {
        $id = (int)$id;
        $sql = "select * from news n
                left join category c on c.id_category=n.id_category 
                where c.id_category={$id}";
        $result = $this->db->query($sql);
        //echo "<pre>";print_r($result);exit;

        return $result;
        // return isset($result[0]) ? ($result[0]) : null;
    }

    public function saveTag($tags, $id_news = null)
    {
        $cnt_tags = count($tags);
        $sql = "delete from tag_news where id_news='{$id_news}'";
        $this->db->query($sql);
        for ($i = 0; $i < $cnt_tags; $i++) {
            $sql = "insert into tag_news
                    set id_news='{$id_news}',
                    id_tag='{$tags[$i]}'";
            $this->db->query($sql);
        }
    }

    public function getNewsListByPage($page = 0, $limit = 10)
    {
        $start = $page * $limit;
        $sql = "select * from news order by date_news desc limit {$start},{$limit}";
        $result = $this->db->query($sql);
        $result['count'] = $this->getCountPages($limit);
        return ($result);
    }

    public function move_uploaded_file($file){
        $uploads_dir = ROOT.DS.'webroot'.DS.'image';
        $tmp_name = $file["photo"]["tmp_name"];
        $name = $file["photo"]["name"];
        move_uploaded_file($tmp_name, $uploads_dir.DS.$name);
        return $name;
    }
    
    public function save($data, $image,$id = null)
    {
        if (!isset($data['id_category']) || !isset($data['title_news']) || !isset($data['content_news'])) {
            return false;
        }
        $id = (int)$id;
        $id_category = $this->db->escape($data['id_category']);
        $title = $this->db->escape($data['title_news']);
        $content = $this->db->escape($data['content_news']);
        $is_published = isset($data['is_published']) ? 1 : 0;
        $is_analitic = isset($data['is_analitic']) ? 1 : 0;
        // echo "<pre>";print_r($data); exit;
        if (!$id) {
            $sql = "
            insert into news
            set id_category='{$id_category}',
                title_news='{$title}',
                content_news='{$content}',
                is_published='{$is_published}',
                is_analitic='{$is_analitic}',
                image_news='{$image}'
            ";
            $result = $this->db->query($sql);
            $id = $this->db->last_id();
        } else {
            $sql = "
            update news
            set id_category='{$id_category}',
                title_news='{$title}',
                content_news='{$content}',
                is_published='{$is_published}',
                is_analitic='{$is_analitic}',
                image_news='{$image}'
                where id_news={$id}
            ";
            $result = $this->db->query($sql);
        }
        if (isset($data['tags'])) {
            $this->saveTag($data['tags'], $id);
        }
        return $result;

    }

    public function delete($id)
    {
        $id = (int)$id;
        $sql = "delete from news where id_news= {$id}";
        return $this->db->query($sql);
    }

}