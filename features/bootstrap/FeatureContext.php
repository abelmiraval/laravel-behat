<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context 
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    // protected $content;
    private $a;
    private $resultado = 'El numero no es par';

    public function __construct()
    {
    }

    /**
     * @Given que tengo el numero a :a
     */
    public function numero($a) {
        $this->a = $a;
    }
    /**
    * @When compruebo si es par
    */
    public function comprarSiEsPar() {
       $temp = (int)$this->a;
       if ($temp % 2 == 0) {
           $this->resultado = 'Es par';
       }
    }
    /** 
    * @Then deberia obtener el siguiente resultado :resultado
    */
    public function resultadoBusquedaSuscripcion($resultado) {
        if ($this->resultado != $resultado) {
            throw new Exception("Actual resultado: ".$this->resultado);
        }
        return $this->resultado;
    }
}
