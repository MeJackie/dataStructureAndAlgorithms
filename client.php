<?php
require 'Heap.php';

$heap = new \DataStructureAlgorithms\Heap(4);
$heap->insert(2);
$heap->insert(3);
$heap->insert(4);
$heap->insert(5);
var_dump($heap->a);