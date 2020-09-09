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

    public function addEdge($s, $t){  //无向边，一条边存两次
        $this->adj[$s]->addLast($t);
        $this->adj[$t]->addLast($s);
    }

    /**
     * 广度优先搜索，从s到t路径
     * @param $s
     * @param $t
     */
    public function bfs($s, $t){
        if($s == $t) return;
        $visited = [];    //已访问节点记录
        $visited[$s] = true;
        $queue = [];    //已访问节点但是其相连节点未被访问
        array_push($queue, $s);
        $prev  = [];    //存储s->t路径节点
        for($i = 0; $i < $this->vertex_num; $i++){
            $prev[$i] = -1;
        }

        while (count($queue) != 0){
            $w = array_shift($queue);
            for ($i = 0; $i < $this->adj[$w]->count; $i++){
                $q = $this->adj[$w]->get($i);
                if(empty($visited[$q])){
                    $prev[$q] = $w;
                    if($q == $t){
                        self::printRoute($prev, $s, $t);
                        return ;
                    }
                    $visited[$q] = true;
                    array_push($queue, $q);
                }
            }
        }
    }

    public $found = false;

    public function dfs($s, $t){
        if($s == $t) return;
        $this->found = false;
        $visited = [];    //已访问节点记录
        $prev  = [];    //存储s->t路径节点
        for($i = 0; $i < $this->vertex_num; $i++){
            $prev[$i] = -1;
        }

        $this->recurDfs($s, $t, $visited, $prev);
        self::printRoute($prev, $s, $t);
    }

    private function recurDfs($s, $t, $visited, &$prev){
        if($this->found == true) return;
        $visited[$s] = true;
        if($s == $t) {
            $this->found = true;
            return;
        }

        for ($i = 0; $i < $this->adj[$s]->count; $i++){
            $currentVertex = $this->adj[$s]->get($i);
            if(!isset($visited[$currentVertex])) {
                $prev[$currentVertex] = $s;
                $this->recurDfs($currentVertex, $t, $visited, $prev);
            }
        }
    }

    /**
     * 递归打印路径
     */
    public static function printRoute($prev, $s, $t){
        if($prev[$t] != -1 && $s != $t){
            self::printRoute($prev, $s, $prev[$t]);
        }

        print $t." ";

        return true;
    }
}

include_once 'vendor/autoload.php';

$graph = new UndirectedGraph(8);
$graph->addEdge(0, 1);
$graph->addEdge(0, 3);
$graph->addEdge(1, 4);
$graph->addEdge(1, 2);

$graph->addEdge(2, 5);
$graph->addEdge(3, 4);

$graph->addEdge(4, 5);
$graph->addEdge(4, 6);

$graph->addEdge(5, 7);
$graph->addEdge(6, 7);
//var_dump($graph);exit;
//$graph->bfs(0, 7);
$graph->dfs(0, 7);
