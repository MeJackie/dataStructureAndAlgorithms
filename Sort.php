<?php

namespace DataStructureAlgorithms;
/**
 * 排序类
 * User: jianjian3
 * Date: 2019/8/8
 * Time: 10:42
 */
class Sort
{

    /*
     * 简单交换排序
     * T = O（n^2）
     * */
    public function swap(array $data) : array {
        $len = count($data);
        for ($i = 0; $i < $len;$i++){
            for ($j = $i+1; $j < $len; $j++){
                if(self::compare($data[$i],$data[$j])){
                    self::sortSwap($data[$i],$data[$j]);
                }
            }
        }
        return $data;
    }

    /*
     * 交换排序-冒泡排序
     * 两两比较相邻记录
     * T = O(n^2)
     * */
    public function bubble(array $data) : array {
         $len = count($data);
         for ($i = 0; $i < $len; $i++){
             for ($j=0; $j < $len-$i-1; $j++){
                 if(self::compare($data[$j],$data[$j+1])){
                     self::sortSwap($data[$j],$data[$j+1]);
                 }
             }
         }

         return $data;
    }

    /*
    * 交换排序-冒泡排序
    * 两两比较相邻记录
    * T = O(n^2)
    * 改进：增加交换信号；无交换，证明其后已有序，停止继续比较
    * */
    public function bubble2(array $data) : array {
        $len = count($data);
        $swap_flag = true;
        for ($i = 0; $i < $len && $swap_flag; $i++){
            $swap_flag = false;
            for ($j=0; $j < $len-$i-1; $j++){
                if(self::compare($data[$j],$data[$j+1])){
                    self::sortSwap($data[$j],$data[$j+1]);
                    $swap_flag = true;
                }
            }
        }

        return $data;
    }

    /*
     * 选择排序
     * 每次找出最小、最大数进行交换
     * */
    public function select(array $data){
        $len = count($data);
        for($i = 0; $i < $len; $i++){
            $most_one = $i;
            for ($j = $i+1; $j < $len; $j++){
                if(self::compare($data[$most_one],$data[$j])){
                    $most_one = $j;
                }
            }

            if($data[$most_one] != $data[$i]){
                self::sortSwap($data[$i],$data[$most_one]);
            }
        }

        return $data;
    }

    /*
     * 直接插入排序
     * 在有序序列中查找元素位置，并插入
     * */
    public function insert(array $data){
        $len = count($data);
        for ($i = 1; $i < $len; $i++){
           if($data[$i] < $data[$i-1]){
               $element = $data[$i];
               for ($j = $i-1; (0 <= $j) && ($data[$j] > $element); $j--){
                   $data[$j+1] = $data[$j];
               }

               $data[$j+1] = $element;
           }
        }

        return $data;
    }

    /*
     * 插入排序-希尔排序
     * 等距分组插入排序
     * T = O(nlogn)
     * */
    public function shell(array $data){
        $len = count($data);
        $increment = count($data);
        do {
            $increment = (int) ($increment/3 + 1);  //等距分割数组
            for($i = $increment; $i < $len; $i++){
                if($data[$i] < $data[$i-$increment]){
                    $element = $data[$i];
                    for($j = $i-$increment; ($j >= 0) && ($element < $data[$j]); $j-=$increment){
                        $data[$j+$increment] = $data[$j];
                    }
                }
                $data[$j+$increment] = $element;
            }
        } while($increment > 1);

        return $data;
    }


    /*
     * 堆排序
     * 数组下标从0开始
     * */
    public function heap(array $data){
        $len = count($data);

        for($i = (int)($len/2); $i > 0; $i--){   //从第一个非叶子节点开始，构建大顶堆
            $this->headAdjust($data,$i-1,$len-1);
        }

        for($i = $len-1; $i > 0; $i--){    //循环-顺序交换大顶堆到尾部，并对剩下的节点重新进行大顶堆构建；完成排序
            self::sortSwap($data[0],$data[$i]);
            $this->headAdjust($data,0,$i-1);
        }

        return $data;
    }

    /*
     * 调整堆，找出树中最大值放到其顶节点
     * @param array &$heap
     * @param int $startNodeNumber
     * @param int $endNodeNumber
     * 若节点从1标识，父节点为n，其左节点为2n,其右节点为2n+1
     * */
    private function headAdjust(&$heap,$startNodeNumber,$endNodeNumber){
        $parent = $heap[$startNodeNumber];
        for($j = $startNodeNumber*2; $j <= $endNodeNumber; $j *= 2){    //以左孩子为开始比较对象，找出最大的孩子节点
            if($j < $endNodeNumber && ($heap[$j] < $heap[$j+1])){
                ++$j;
            } elseif ($parent >= $heap[$j]){
                break;
            }

            //用$startNodeNumber标识最大值和最大值位置
            $heap[$startNodeNumber] = $heap[$j];
            $startNodeNumber = $j;
        }

        //将父节点赋值给最大节点，完成两节点的交换
        $heap[$startNodeNumber] = $parent;
    }




    private static function sortSwap(&$a,&$b){
        $c = $a;
        $a = $b;
        $b = $c;
    }

    private static function compare($a,$b){
        if($a < $b){
            return true;
        }

        return false;
    }

    public function EchoArr($data){
        echo implode('-',$data);
    }
}
//$arr = [7,6,2,3,1,5,6,4];

//$arr = [2,1,3,4,5,6,7,8,9];

$arr = [50,10,90,30,70,40,80,60,20];

$sort = (new Sort());
$sort->EchoArr($sort->heap($arr));

