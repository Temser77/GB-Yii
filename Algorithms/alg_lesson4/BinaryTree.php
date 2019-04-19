<?php

class BinaryNode {

    public $value;
    public $left;
    public $right;

    public function __construct($value)
    {
        $this->value = $value;
        $this->right = null;
        $this->left = null;
    }
}


class BinaryTree {
    protected $root;

    public function __construct()
    {
        $this ->root = null;
    }

    public function isEmpty() {
        return $this->root === null;
    }

    public function insert($item) {
        $node = new BinaryNode($item);

        if($this->isEmpty()) {
            $this->root = $node;
        }

        else {
            $this->insertNode($node, $this->root);
        }
    }

    public function insertNode($node, &$subtree) {

        if($subtree === null) {
            $subtree = $node;
        }

        else {
            if ($node->value > $subtree->value) {
                $this->insertNode($node, $subtree->right);
            } else if ($node->value < $subtree->value) {
                $this->insertNode($node, $subtree->left);
            } else {
            }
        }
    }

    public function &findNode($value, &$subtree) {
        if(is_null($subtree)) {
            return false;
        }

        if($subtree->value > $value ) {
            return $this->findNode($value, $subtree->left);
        }
        elseif($subtree->value < $value ) {
            return $this->findNode($value, $subtree->right);
        }

        else {
            return $subtree;
        }
     }

    public function delete($value) {

        if($this->isEmpty()) {
            throw new \Exeption("Tree is empty");
        }

        $node = &$this->findNode($value, $this->root);

        if($node) {
            $this -> deleteNode($node);
        }

        return $this;


    }

    public function deleteNode (BinaryNode &$node) {

        if(is_null($node->left) && is_null($node->right)) {
            $node = null;
        }

        elseif (is_null($node->left)) {
            $node = $node->right;
        }

        elseif (is_null($node->right)) {
            $node = $node->left;
        }

        else {

            if(is_null($node->right->left)) {
                $node->right->left = $node ->left;
                $node = $node->right;
             }

            else {
                $node->value = $node->right->left->value;
                $this->deleteNode($node->right->left);
            }
        }

    }
}


$tree = new BinaryTree();

$tree->insert(5);
$tree->insert(3);
$tree->insert(7);
$tree->insert(6);
$tree->insert(9);
$tree->insert(2);
$tree->insert(4);
$tree->insert(1);
$tree->insert(8);

//var_dump($tree);


$tree->delete(7);
$tree->delete(3);

var_dump($tree);
