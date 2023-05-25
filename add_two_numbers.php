<?php

class Solution 
{
    function addTwoNumbers($l1, $l2)
    {
        return $this->add($l1, $l2);
    }
    function add(ListNode $l1, ListNode $l2, $p = 0)
    {
        $pnode = null;
        $val = $l1->val + $l2->val + $p;
        $p = 0;
        if ($val >= 10) {
            $p = 1;
            $val -= 10;
        }

        $node = new ListNode($val);

        if ($l1->next !== null && $l2->next !== null) {
            $pnode = $this->add($l1->next, $l2->next, $p);
        } elseif ($l1->next !== null) {
            $pnode = $this->add($l1->next, new ListNode(0), $p);
        } elseif ($l2->next !== null) {
            $pnode = $this->add(new ListNode(0), $l2->next, $p);
        } elseif ($p > 0) {
            $pnode = new ListNode($p);
        }

        $node->next = $pnode;

        return $node;
    }
}

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }

    function next(int $val)
    {
        return $this->next = new ListNode($val);
    }

    public function __toString()
    {
        $string = $this->val;
        if ($this->next != null) {
            $string .= '-'. (string)$this->next;
        }

        return (string)$string;
    }
}

$node1 = new ListNode(2);
$node1->next(4)->next(3);

$node2 = new ListNode(5);
$node2->next(6)->next(4);

echo (new Solution())->addTwoNumbers($node1, $node2);
