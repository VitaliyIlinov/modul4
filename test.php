<?php
class A
{
    function foo()
    {
        if (isset($this)) {
            echo '$this определена (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this не определена.\n";
        }
    }
}

class B
{
    function bar()
    {
        // Замечание: следующая строка вызовет предупреждение, если включен параметр E_STRICT.
        A::foo();
    }
}

$a = new A();
$a->foo();

// Замечание: следующая строка вызовет предупреждение, если включен параметр E_STRICT.
A::foo();
$b = new B();
$b->bar();

// Замечание: следующая строка вызовет предупреждение, если включен параметр E_STRICT.
B::bar();
