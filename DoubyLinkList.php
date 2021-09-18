<?php

class Node{
    public $prev;
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->prev = NULL;
        $this->next = NULL;
    }
}

class DoublyLinkList{

    public $head;

    public function __construct()
    {
        $this->head = NULL;
    }

    public function add($data)
    {
       $new_node = new Node($data);

       $cur = $this->head;

       if($cur==NULL)
       {
           $this->head = $new_node;
           return;
       }

       while($cur->next!=NULL)
       {
           $cur = $cur->next;
       }
       $cur->next = $new_node;
       $new_node->prev = $cur;
    }

    public function show()
    {
        $cur = $this->head;

        while($cur)
        {
            echo $cur->data;
            echo " <==> ";
            $cur = $cur->next;
        }
        echo "\n";
    }

    public function add_head($data)
    {
        $new_node = new Node($data);

        $cur = $this->head;
        $new_node->next = $cur;
        $cur->prev = $new_node;
        $this->head = $new_node;
    }

    public function delete_head()
    {
        $cur = $this->head;
        $next = $cur->next;
        $next->prev = NULL;
        $this->head = $next;
        unset($cur);
    }

    public function add_at($data,$pos)
    {
        $new_node = new Node($data);

        $n = 0;
        $cur = $this->head;
        while($n<$pos-1)
        {
            $n = $n +1;
            $prev = $cur;
            $cur = $cur->next;
        }

        $prev->next = $new_node;
        $new_node->prev = $prev;
        $cur->prev = $new_node;
        $new_node->next = $cur;
    }

    public function delete_at($pos)
    {
        $n = 0;
        $cur = $this->head;
        while($n<$pos-1)
        {
            $n = $n+1;
            $prev = $cur;
            $cur = $cur->next;
        }
        $next = $cur->next;
        $prev->next = $next;
        $next->prev = $prev;
        unset($cur);

    }

    public function reverse()
    {

    }

    public function count()
    {

    }

    public function remove_dupicate()
    {
        
    }
}

$d = new DoublyLinkList();
$d->add(3);
$d->add(4);
$d->add_head(2);
$d->add_head(1);
$d->add_head(0);
$d->show();
$d->delete_head();
$d->show();
$d->add_at(100,3);
$d->show();
$d->delete_at(3);
$d->show();

?>