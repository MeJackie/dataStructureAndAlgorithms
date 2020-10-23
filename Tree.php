<?php
declare(strict_types=1);

namespace DataStructureAlgorithms;
/**
 * 树
 * User: jianjian3
 * Date: 2020/8/3
 * Time: 10:36
 */
class TreeNode {
    public $value;
    public $leftChild;
    public $rightChild;
    
    
    public function __construct($value, $leftChild, $rightChild) {
        $this->value = $value;
        $this->leftChild = $leftChild;
        $this->rightChild = $rightChild;
    }
}

class Tree
{
    public $root;

    public function __construct(array $nums = null){
        if(count($nums) > 0) {
            $this->root = new TreeNode($nums[0], null, null);
            for($i = 1; $i < count($nums); $i++) {
                $this->addLeaf($nums[$i]);
            }
        }
    }

    public function addLeaf(int $item) {
        $dummp = '';
        $dummp = $this->root;        
        while($dummp != null) {
            if ($dummp->value > $item) {
                if($dummp->leftChild == null){
                    $dummp->leftChild = new TreeNode($item, null, null); 
                    break;
                } else {
                    $dummp = $dummp->leftChild; 
                }
            } else if($dummp->value <= $item){
                if($dummp->rightChild == null ) {
                    $dummp->rightChild = new TreeNode($item, null, null);
                    break;
                } else {
                    $dummp = $dummp->rightChild; 
                }
            }
        }
    }
}

$t = new Tree([1,2,3]);
// $t->root = new TreeNode(1,null,null);
// $t->root->leftChild = new TreeNode(2, null, null);
// $t->root->rightChild = new TreeNode(3, null, null);

// $t->root->rightChild = new TreeNode(3, null, null);
// $t->root->rightChild = new TreeNode(3, null, null);
// $t->root->rightChild = new TreeNode(3, null, null);
// $t->root->rightChild = new TreeNode(3, null, null);

// 判断二叉树是否是镜像

var_dump($t);