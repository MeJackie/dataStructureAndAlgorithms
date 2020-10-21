<?php


namespace DataStructureAlgorithms;


class Node
{
    public $val;
    public $next;

    public function __construct($val = null, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class SigleLinklist
{
    public $head;

    public function __construct($item = null)
    {
        $this->head = new Node($item);
    }

    //插入节点
    public function insert($item, $new) {
        $newNode = new Node($new);  
        
        $current = $this->find($item);
        $new->next = $current->next;
        $current->next = $new;

        return $this;
    }

    // 插入到链尾
    public function insetLast($item){
        $current = $this->head;
        while($current->next != null) {
            $current = $current->next;
        }

        $current->next = new Node($item);

        return $this;
    }

    // 查找节点
    public function find($item) {
        $current = $this->head;
        if($current == null) {
            throw new \Exception("empty list");
        }

        while ($current->val != $item) {
            $current = $current->next;
        }

        if($current == null) {
            throw new \Exception("no ".$item." node");
        }

        return $current;
    }

    // 删除节点
    public function remove($item) {
        $previous = $this->findPrevious($item);
        $previous->next = $previous->next->next;
        return true;
    }

    // 获取节点前一个节点
    public function findPrevious($item) {
        $current = $this->head;

        while($current->next != null && $current->next->val != $item){
            $current = $current->next;
        }

        if($current == null) {
            throw new \Exception("no ".$item." node");
        }

        return $current;
    }

    // 更新节点
    public function update($old, $new){
        $current = $this->find($old);
        $current->val = $new;
    }


    // 打印节点
    public function display(){
        $current = $this->head;
        if ($current == null) {
            throw new \Exception("empty list");
        }

        while($current->next != null){
            echo $current->val."->";
            $current = $current->next;
        }

        echo $current->val;
        echo "\n";
    }
}

//include_once 'vendor/autoload.php';
//
$l = new SigleLinklist();
$l->insetLast(1)->insetLast(2)->insetLast(3);
$l->display();
$l->remove(2);
$l->display();
$l->update(3,4);
$l->display();


class doubleNodes
{
    public $val;
    public $previous;
    public $next;
}

// 双向链表插入
// $new->next = $current->next;
// $current->next->previous = $new;
// $current->next = $new;
// $new->previous = $current;

// 双向链表删除
// $current->next->previous = $current->previous;
// $current->previous->next = $current->next;
// $current->previous = null;
// $current->next = null;
class doubleLinkList
{

}






