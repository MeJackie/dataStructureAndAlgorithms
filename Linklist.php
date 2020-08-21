<?php


namespace DataStructureAlgorithms;

use DataStructureAlgorithms\Node;

class Linklist
{
    public $head;
    public $size;    //链表大小
    public $count;   //当前链表节点数

    public function __construct($size)
    {
        $this->head = new Node();
        $this->count = 0;
        $this->size = $size;
    }

    public function addLast($value){
        $this->add($this->count, $value);
    }

    public function add($index, $value){
        if($index > $this->size){
            throw new \Exception("链表已满");
        }

        $prev = $this->head;
        for($i = 0; $i < $index; $i++){
            $prev = $prev->next;
        }

        $prev->next = new Node($value, $prev->next);

        $this->count++;
    }

    public function get($index){
        if($index > $this->size-1){
            throw new \Exception("超出链表范围");
        }

        $prev = $this->head->next;
        for ($i = 0; $i < $this->size; $i++){
            if($index == $i){
                return $prev->val;
            }
            $prev = $prev->next;
        }
    }
}

//include_once 'vendor/autoload.php';
//
//$linklist = new Linklist(100);
//$linklist->addLast(2);
//$linklist->addLast(3);
//$linklist->addLast(4);
//$linklist->addLast(5);
//var_dump($linklist);