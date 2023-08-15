<?php

# Intuition
# The function uses two pointers, first and second, which are initially set to the dummy node. The first pointer advances n + 1 steps ahead to create a gap between the two pointers. Then, both pointers are moved until the first pointer reaches the end of the list. At this point, the second pointer is at the node just before the node to be removed. We then modify the pointers to remove the node.

# Approach
# The removeNthFromEnd function takes the head node of a linked list and an integer n as input. It removes the nth node from the end of the list and returns the modified list's head.

class ListNode {
    public $val;
    public $next;

    public function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function removeNthFromEnd($head, $n) {
    $dummy = new ListNode(0);
    $dummy->next = $head;
    
    $first = $dummy;
    $second = $dummy;
    
    for ($i = 1; $i <= $n + 1; $i++) {
        $first = $first->next;
    }
    
    while ($first != null) {
        $first = $first->next;
        $second = $second->next;
    }
    
    $second->next = $second->next->next;
    
    return $dummy->next;
}

// Helper function to create a linked list from an array
function createLinkedList($arr) {
    $dummy = new ListNode(0);
    $current = $dummy;

    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }

    return $dummy->next;
}

$arr = [1, 2, 3, 4, 5];
$n = 2;

$head = createLinkedList($arr);

$modifiedHead = removeNthFromEnd($head, $n);
