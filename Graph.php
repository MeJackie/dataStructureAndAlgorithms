<?php


namespace DataStructureAlgorithms;

use DataStructureAlgorithms\Linklist;

class UndirectedGraph
{
    private $vertex_num; //订单个数
    private $adj;  //邻接表

    public function __construct($vertex_num)
    {
        $this->vertex_num = $vertex_num;
        for ($i = 0; $i < $vertex_num; $i++){
            $this->adj[$i] = new Linklist($vertex_num);
        }
    }

    public function addEdge($s, $t){
        $this->adj[$s]->addLast($t);
        $this->adj[$t]->addLast($s);
    }
}

include_once 'vendor/autoload.php';

$graph = new UndirectedGraph(4);
$graph->addEdge(2, 3);
var_dump($graph);