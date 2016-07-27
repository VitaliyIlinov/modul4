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

    public function getNewsListById($id,$order = 'date_news')
    {
        $sql = "SELECT * FROM news  where id_news={$id} ";
        $sql .= " order by {$order} ";
        return $this->db->query($sql);
    }

    public function getCategoryList($limit = 5, $order = 'date_news')
    {
        $sql = "SELECT a.*,cc.category_name FROM news AS a ";
        $sql .= " left join category cc on cc.id_category=a.id_category ";
        $sql .= " WHERE a.id_news IN (SELECT id_news FROM news AS b ";
        $sql .= " WHERE b.id_category = a.id_category AND (SELECT COUNT(*) FROM news AS c WHERE c.id_news >= b.id_news AND c.id_category = b.id_category) <=$limit) ";
        $sql .= " order by id_category,$order ";



        return $this->db->query($sql);
    }

    public function getCategoryById($id)
    {
        $id =(int)$id;
        $sql = "select * from news n
                left join category c on c.id_category=n.id_category 
                where c.id_category={$id}";
        return $this->db->query($sql);
       // return isset($result[0]) ? ($result[0]) : null;
    }

    public function getById($id)
    {
        $id = (int)$id;
        $sql = "select * from news where id='{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? ($result[0]) : null;
    }

    public function save($data, $id = null)
    {
        if (!isset($data['alias']) || !isset($data['title']) || !isset($data['content'])) {
            return false;
        }
        $id = (int)$id;
        $alias = $this->db->escape($data['alias']);
        $title = $this->db->escape($data['title']);
        $content = $this->db->escape($data['content']);
        $is_published = isset($data['is_published']) ? 1 : 0;

        if (!$id) {
            $sql = "
            insert into pages
            set alias='{$alias}',
                title='{$title}',
                content='{$content}',
                is_published='{$is_published}'
            ";
        } else {
            $sql = "
            update pages
            set alias='{$alias}',
                title='{$title}',
                content='{$content}',
                is_published='{$is_published}'
                where id={$id}
            ";
        }
        return $this->db->query($sql);
    }

    public function delete($id)
    {
        $id = (int)$id;
        $sql = "delete from pages where id = {$id}";
        return $this->db->query($sql);
    }

}