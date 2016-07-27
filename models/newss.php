<?php

class Newss extends Model
{
    public function getList($limit=5,$order='date_news')
    {
        $sql = "select * from news ";
        $sql .= " order by $order desc limit $limit";
        
        return $this->db->query($sql);
    }

    public function getByCategory($category)
    {
        $category = $this->db->escape($category);
        $sql = "select * from pages where id_category='{$category}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? ($result[0]) : null;
    }
    public function getById($id)
    {
        $id=(int)$id;
        $sql = "select * from news where id='{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? ($result[0]) : null;
    }

    public function save($data, $id=null){
        if (!isset($data['alias']) || !isset($data['title']) || !isset($data['content'])){
            return false;
        }
        $id= (int)$id;
        $alias=$this->db->escape($data['alias']);
        $title=$this->db->escape($data['title']);
        $content=$this->db->escape($data['content']);
        $is_published=isset($data['is_published']) ? 1 :0;

        if(!$id){
            $sql="
            insert into pages
            set alias='{$alias}',
                title='{$title}',
                content='{$content}',
                is_published='{$is_published}'
            ";
        }else {
            $sql="
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
    public function delete($id){
        $id=(int)$id;
        $sql="delete from pages where id = {$id}";
        return $this->db->query($sql);
    }

}