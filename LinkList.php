<?php

class Node{

    public $data;
    public $next;
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
}

class LinkList{

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
    }

    public function show()
    {
        $cur = $this->head;

        while($cur)
        {
            echo($cur->data);
            echo(" ===> ");
            $cur = $cur->next;
        }
        echo("\n");
    }

    public function add_head($data)
    {
        $new_node = new Node($data);
        $new_node->next = $this->head;
        $this->head = $new_node;
    }

    public function delete_head()
    {
        $cur = $this->head;
        $this->head = $cur->next;
        unset($cur);
    }

    public function delete_at($c)
    {
        $cur = $this->head;
        $n=0;
        while($n<$c-1)
        {
            $n = $n + 1;
            $prev = $cur;
            $cur = $cur->next;
        }
        $prev->next = $cur->next;
        unset($cur);
    }

    public function add_at($data,$c)
    {
        $new_node = new Node($data);
        $cur = $this->head;
        $n = 0;
        while($n<$c-1){
            $n = $n + 1;
            $prev = $cur;
            $cur = $cur->next;
        }
        $prev->next = $new_node;
        $new_node->next = $cur;
    }

    public function reverse()
    {
        $cur = $this->head;
        $prev = NULL;
        while($cur)
        {
            $next = $cur->next;
            $cur->next = $prev;          
            $prev = $cur;
            $cur = $next;
        }
        $this->head = $prev;
    }

    public function count()
    {
        $cur = $this->head;
        $check = 0;
        while($cur)
        {
            $check = $check + 1; 
            $cur = $cur->next;
        }
        echo($check);
    }
    public function remove_duplicate()
    {
        $cur = $this->head;
        $prev = NULL;

        $dup = [];
        while($cur)
        {
            if(in_array($cur->data,$dup))
            {
                $prev->next = $cur->next;
            }
            else
            {
                $dup[] = $cur->data;
                $prev = $cur;
            }
        $cur  = $prev->next;
        }

    }

    public function rotate($pos)
    {
        $n = 0;
        $cur = $this->head;
        while($n<$pos-1)
        {
            $n = $n +1;
            $cur = $cur->next;
        }
  
        $next  = $cur->next;
        $first_next = $next;
        $cur->next = NULL;

        while($next->next!=NULL)
        {
            $next = $next->next;
        }
        $next->next = $this->head;
        $this->head = $first_next;
        
    }
}


$l = new LinkList();
$l->add(1);
$l->add(2);
$l->add(1);
$l->add(4);
$l->add(5);
$l->show();
// $l->reverse();
// $l->show();
// $l->remove_duplicate();

// $l->show();
$l->rotate(2);
$l->show();
?>