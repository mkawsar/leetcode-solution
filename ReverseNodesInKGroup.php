<?php

/**
 * Leetcode problem 25
 */

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

class ReverseNodesInKGroup
{
    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k)
    {
        if (!$head || $k == 1) {
            return $head;
        }

        $dummy = new ListNode(0);
        $dummy->next = $head;
        $prev = $dummy;
        $current = $head;
        $count = 0;

        // Count the number of nodes in the linked list
        while ($current != null) {
            $count++;
            $current = $current->next;
        }

        while ($count >= $k) {
            $current = $prev->next;
            $next = $current->next;

            for ($i = 1; $i < $k; $i++) {
                $current->next = $next->next;
                $next->next = $prev->next;
                $prev->next = $next;
                $next = $current->next;
            }

            $prev = $current;
            $count -= $k;
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


// Example usage
$arr = [1, 2, 3, 4, 5];
$k = 2;

$head = (new ReverseNodesInKGroup())->createLinkedList($arr);

echo "Original Linked List: ";
(new ReverseNodesInKGroup())->printLinkedList($head);

$reversedHead = (new ReverseNodesInKGroup())->reverseKGroup($head, $k);
echo "Reversed Linked List in Groups of $k: ";
(new ReverseNodesInKGroup())->printLinkedList($reversedHead);