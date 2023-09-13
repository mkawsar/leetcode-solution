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

class swap_nodes_pairs
{
    function swapPairs($head)
    {
        $dummy = new ListNode();
        $dummy->next = $head;
        $prev = $dummy;
        while ($head !== null && $head->next !== null) {
            // Nodes to be swapped
            $firstNode = $head;
            $secondNode = $head->next;

            // Swap the nodes
            $prev->next = $secondNode;
            $firstNode->next = $secondNode->next;
            $secondNode->next = $firstNode;

            // Move pointers
            $prev = $firstNode;
            $head = $firstNode->next;
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
}

$arr = [1, 2, 3, 4, 5];
$head = (new swap_nodes_pairs())->createLinkedList($arr);
echo "Original Linked List: ";
(new swap_nodes_pairs())->printLinkedList($head);

$swappedHead = (new swap_nodes_pairs())->swapPairs($head);
echo "Swapped Linked List: ";
(new swap_nodes_pairs())->printLinkedList($swappedHead);
