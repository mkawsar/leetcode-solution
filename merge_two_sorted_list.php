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

function mergeTwoLists($list1, $list2)
{
    $dummy = new ListNode();
    $current = $dummy;

    while ($list1 != null && $list2 != null) {
        if ($list1->val < $list2->val) {
            $current->next = $list1;
            $list1 = $list1->next;
        } else {
            $current->next = $list2;
            $list2 = $list2->next;
        }
        $current = $current->next;
    }

    if ($list1 != null) {
        $current->next = $list1;
    }

    if ($list2 != null) {
        $current->next = $list2;
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

    while ($current != null) {
        echo $current->val . " -> ";
        $current = $current->next;
    }

    echo "null\n";
}

$arr1 = [1, 2, 4];
$arr2 = [1, 3, 4];

$list1 = createLinkedList($arr1);
$list2 = createLinkedList($arr2);

echo "List 1: ";
printLinkedList($list1);

echo "List 2: ";
printLinkedList($list2);

$mergedList = mergeTwoLists($list1, $list2);
echo "Merged List: ";
printLinkedList($mergedList);

