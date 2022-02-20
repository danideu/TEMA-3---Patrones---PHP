<?php

// Parece razonable esperar que sólo haya un objeto Tigger (después de todo, ¡él es el único!), Pero la implementación actual permite tener múltiples objetos Tigger diferentes:

// Refactorizar la clase Tigger en un Singleton considerando los siguientes puntos:

// Establezca el método getInstance () que no tenga argumentos. Esta función es responsable de crear una instancia de la clase Tigger sólo una vez y devolver esta única instancia cada vez que se llama.
// Imprime en pantalla múltiples veces el rugido de Tigger.
// Añade un método getCounter () que devuelva el número de veces que Tigger ha realizado rugidos.

class Tigger {

        private static $instance = NULL;
        public $contador = 0;

        private function __construct() {
            echo "Building character..." . PHP_EOL;
        }

		private function __clone() { }

        public function roar() {
            echo "Grrr!" . PHP_EOL;
            $this->contador +=1;
        }

        public function getCounter() {
            echo "El contador de GR es:" . $this->contador;
        }

        public static function getInstance(){
			if (is_null(self::$instance)) {
					self::$instance = new Tigger();
			}
			return self::$instance;
        }
}

$tigger = Tigger::getInstance();
$tigger->roar();
$tigger->roar();
$tigger->roar();
$tigger->roar();
$tigger->getCounter();

?>