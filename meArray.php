<?php


namespace DataStructureAlgorithms;


class meArray
{

    /**
     * 滑动窗口,求最小字串（lc.209）
     */
    public function t(){

    }


    /**
     * 三数求和为零  $nums = [-1,-1,1,1,-2,2,3];
     * 双指针
     * @param array $nms
     * @return array
     */
    public function getThreeSum(array $nms) {
        $res = [];
        $size = count($nms);
        if ($size < 3) {
            return $res;
        }
        sort($nms);

        for($i = 0; $i < $size; $i++){
            $current = $nms[$i];
            // 因为升序，当前值大于零，其后值肯定大于定；不满足相加=0
            if($current > 0) break;

            $left = $i+1;
            $right = $size-1;

            // 跳过和前一个值相同的值
            if($i > 0 && $nms[$i] == $nms[$i-1]){
                continue;
            }

//            var_dump($nms);exit;

            while ($left < $right) {
                $sum = $current + $nms[$left] + $nms[$right];
                if($sum == 0) {
                    array_push($res, [$nms[$i], $nms[$left], $nms[$right]]);

                    // 跳过重复
                    $left++;
                    while($left < $right && $nms[$left] == $nms[$left-1]){
                        $left++;
                    }
                    $right--;
                    while($left < $right && $nms[$right] == $nms[$right+1]){
                        $right--;
                    }
                } else if($sum > 0){
                    $right--;
                } else {
                    $left++;
                }
            }

        }

        return $res;
    }
}