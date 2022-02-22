<?php
// Desea que sus pavos se comporten como patos, por lo que debe aplicar el adaptador pattern. En el mismo archivo, escriba una clase llamada TurkeyAdapter y asegúrese de que tenga en cuenta lo siguiente:

// La traducción del quack entre clases es fácil: simplemente llame al método Gobble cuando sea apropiado.

// Aunque ambas clases tienen un método fly, los pavos sólo pueden volar a rachas cortas, no pueden volar largas distancias como los patos. Para mapear entre el método fly de un pato y el método del pavo, debe llamar al método fly del pavo cinco veces para compensarlo.

abstract class Animals{
    abstract function quack();
    abstract function fly();
}

class Duck extends Animals{

    public function quack() {
        echo "Quack \n" . "<br>";
    }

    public function fly() {
        echo "I'm flying \n" . "<br>";
    }
}

class Turkey {

    public function gobble() {
        echo "Gobble gobble \n"  . "<br>";
    }

    public function fly() {
        echo "I'm flying a short distance \n"  . "<br>";
    }
}

class TurkeyAdapter extends Animals{

    private $turkeyAdapter;
    private $contador = 0;

    public function __construct(){
        $this->turkeyAdapter = new Turkey();
    }
    public function quack() {
        return $this->turkeyAdapter->gobble();
    }

    public function fly() {
        while ( $this->contador < 5 ){
            echo "I'm flying a short distance \n"  . "<br>";
            $this->contador += 1;
        }
        $this->contador = 0;
    }
}


function duck_interaction($duck) {
    $duck->quack();
    $duck->fly();
}

$duck = new Duck;
$turkey = new Turkey;
$turkey_adapter = new TurkeyAdapter($turkey);
echo "The Turkey says...\n" . "<br>";
$turkey->gobble();
$turkey->fly();
echo "The Duck says...\n" . "<br>";
duck_interaction($duck);
echo "The TurkeyAdapter says...\n" . "<br>";
duck_interaction($turkey_adapter);

// Output
// The expected output is as follows:
// The Turkey says...
// Gobble gobble
// I'm flying a short distance
// The Duck says...
// Quack
// I'm flying
// The TurkeyAdapter says...
// Gobble gobble
// I'm flying a short distance
// I'm flying a short distance
// I'm flying a short distance
// I'm flying a short distance
// I'm flying a short distance


?>