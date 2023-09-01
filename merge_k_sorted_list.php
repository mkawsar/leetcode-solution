<?php

class ListNode
{
    public $val;
    public $next;

    public function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

function mergeKLists($lists)
{
    $minHeap = new SplMinHeap();

    // Push the head of each linked list into the min-heap
    foreach ($lists as $list) {
        if ($list !== null) {
            $minHeap->insert($list);
        }
    }

    $dummy = new ListNode();
    $current = $dummy;

    while (!$minHeap->isEmpty()) {
        $minNode = $minHeap->extract();
        $current->next = $minNode;
        $current = $current->next;

        if ($minNode->next !== null) {
            $minHeap->insert($minNode->next);
        }
    }

    return $dummy->next;
}

// Helper function to create a linked list from an array
function createLinkedList($arr)
{
    $dummy = new ListNode(0);
    $current = $dummy;

    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }

    return $dummy->next;
}

// Helper function to print a linked list
function printLinkedList($head)
{
    $current = $head;

    while ($current !== null) {
        echo $current->val . " -> ";
        $current = $current->next;
    }

    echo "null\n";
}

// Example usage
$arr1 = [1, 4, 5];
$arr2 = [1, 3, 4];
$arr3 = [2, 6];

$lists = [
    createLinkedList($arr1),
    createLinkedList($arr2),
    createLinkedList($arr3)
];

$mergedList = mergeKLists($lists);
echo "Merged List: ";
printLinkedList($mergedList);
