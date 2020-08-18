<?php

namespace DataStructureAlgorithms;

class Heap {

    public $a;  //数组，保存堆
    private $n; //堆最大存储数据个数
    public $count; //堆当前存储数据个数

    public function __construct($capacity)
    {
        $this->n = $capacity;
        $this->count = 0;
    }

    public function insert($data){
        if ($this->count >= $this->n) return -1;
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

    public function removeMax(){
        if($this->count == 0 ) return -1;
        $this->a[1] = $this->a[$this->count];
        unset($this->a[$this->count]);
        $this->count--;
        $this->heapify($this->n, 1);
    }

    private function heapify($n, $i){   //自上而下堆化
        while (true){
            $mostPos = $i;
            if(2*$i < $n && ($this->a[2*$i] > $this->a[$i])) $mostPos = 2*$i;
            if(2*$i+1 < $n && ($this->a[2*$i+1] > $this->a[$mostPos])) $mostPos = 2*$i+1;
            if($mostPos == $i) break;
            $this->swap($this->a, $i, $mostPos);
            $i = $mostPos;
        }
    }

    private function swap(&$array, $i, $j){
        $temp = $array[$j];
        $array[$j] = $array[$i];
        $array[$i] = $temp;
        return true;
    }
}

$heap = new Heap(4);
$heap->insert(2);
$heap->insert(3);
$heap->insert(4);
$heap->insert(5);
$heap->insert(6);
$heap->insert(7);
$heap->insert(8);
var_dump($heap->a);
var_dump($heap->count);
$heap->removeMax();
var_dump($heap->a);
var_dump($heap->count);