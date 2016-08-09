<?php

class Newss extends Model
{

    public function getList($limit = 5, $order = 'date_news')
    {
        $sql = "SELECT a.*,cc.category_name FROM news AS a ";
        $sql .= " left join category cc on cc.id_category=a.id_category ";
        $sql .= " WHERE a.id_news IN (SELECT id_news FROM news AS b ";
        $sql .= " WHERE b.id_category = a.id_category AND (SELECT COUNT(*) FROM news AS c WHERE c.id_news >= b.id_news AND c.id_category = b.id_category) <=$limit) ";
        $sql .= " order by id_category,$order ";
        return $this->db->query($sql);
    }

    public function getListIndex($limit = 5, $order = 'date_news')
    {
        $sql = "SELECT a.*,cc.category_name FROM news AS a ";
        $sql .= " left join category cc on cc.id_category=a.id_category ";
        $sql .= " WHERE a.id_news IN (SELECT id_news FROM news AS b ";
        $sql .= " WHERE b.id_category = a.id_category AND (SELECT COUNT(*) FROM news AS c WHERE c.id_news >= b.id_news AND c.id_category = b.id_category) <=$limit) ";
        $sql .= " order by {$order} ";
        return $this->db->query($sql);

    }

    public function getNewsListById($id)
    {
        $sql = "select n.*,t1.id_tag,t1.tag_name from news n
                left join tag_news t on t.id_news=n.id_news
                left join tags t1 on t1.id_tag=t.id_tag 
                where n.id_news={$id}";
        $content = $this->db->query($sql);
        $tag = null;
        for ($i = 0; $i < count($content); $i++) {
            if ($content[$i]['id_tag'] != null) {
                $tag['tags'][$content[$i]['tag_name']] = $content[$i]['id_tag'];
            }
        }
        if ($tag == null) {
            return $content;
        }
        return array($content[0], $tag);
    }

    public function getCountPages($limit = 5)
    {
        $sql = "select count(id_news) as COUNT from news";
        $count_news = $this->db->query($sql);
        $total_rows = ($count_news[0]['COUNT']);
        $num_pages = ceil($total_rows / $limit);
        return $num_pages;
    }

    public function getNewsListByPage($page = 0, $limit = 5)
    {
        $start = $page * $limit;
        $sql = "select * from news limit {$start},{$limit}";
        return $this->db->query($sql);
    }

    public function getTagsList()
    {
        $sql = "select * from tags ";

        $result= $this->db->query($sql);

        for ($i = 0; $i < count($result); $i++) {
            $results[$result[$i]['id_tag']] = $result[$i]['tag_name'];
        }
        //echo "<pre>";print_r($results);exit;
        return $results;
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
        $result= $this->db->query($sql);
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
        $result=$this->db->query($sql);
        //echo "<pre>";print_r($result);exit;

        return $result;
        // return isset($result[0]) ? ($result[0]) : null;
    }

    public function getById($id)
    {
        $id = (int)$id;
        //$sql = "select * from news where id_news='{$id}' limit 1";
        $sql = "SELECT  * from news n
left join tag_news t on t.id_news=n.id_news
where n.id_news='{$id}'";
        $result = $this->db->query($sql);
        return isset($result[0]) ? ($result[0]) : null;
    }

    public function is_tags($id)
    {
        $id = (int)$id;
        //$sql = "select * from news where id_news='{$id}' limit 1";
        $sql = "SELECT  t.id_tag,t.id_news from news n
                left join tag_news t on t.id_news=n.id_news
                where n.id_news='{$id}'";
        $result = $this->db->query($sql);

        for ($i = 0; $i < count($result); $i++) {
            $results[$result[$i]['id_tag']] = $result[$i]['id_news'];
        }
        return $results;
    }

    public function saveTag($id_news, $tags)
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

    public function save($data, $id = null)
    {
        if (!isset($data['id_category']) || !isset($data['title_news']) || !isset($data['content_news'])) {
            return false;
        }
        if (isset($data['tags'])) {
            $this->saveTag($id, $data['tags']);
        }
        // var_dump($data);exit;
        $id = (int)$id;
        $id_category = $this->db->escape($data['id_category']);
        $title = $this->db->escape($data['title_news']);
        $content = $this->db->escape($data['content_news']);
        $is_published = isset($data['is_published']) ? 1 : 0;
        $is_analitic = isset($data['is_analitic']) ? 1 : 0;
        if (!$id) {
            $sql = "
            insert into news
            set id_category='{$id_category}',
                title_news='{$title}',
                content_news='{$content}',
                is_published='{$is_published}',
                is_analitic='{$is_analitic}',
            ";
        } else {
            $sql = "
            update news
            set id_category='{$id_category}',
                title_news='{$title}',
                content_news='{$content}',
                is_published='{$is_published}',
                is_analitic='{$is_analitic}'
                where id_news={$id}
            ";
        }
        return $this->db->query($sql);
    }

    public function delete($id)
    {
        $id = (int)$id;
        $sql = "delete from news where id_news= {$id}";
        return $this->db->query($sql);
    }

}