<?php

namespace DataStructureAlgorithms;

class Heap {

    public $a;  //数组，保存堆
    private $n; //堆最大存储数据个数
    private $count; //堆当前存储数据个数

    public function __construct($capacity)
    {
        $this->n = $capacity;
        $this->count = 0;
    }

    public function insert($data){
        if ($this->count > $this->n) return ;
        $this->count++;
        $this->a[$this->count] = $data;
        $i = $this->count;
        while (floor($i/2) > 0 && ($this->a[$i] > $this->a[$i/2])){  // 自下而上堆化
            $temp = $this->a[$i/2];
            $this->a[$i/2] = $this->a[$i];
            $this->a[$i] = $temp;
            $i = $i/2;
        }
    }
}