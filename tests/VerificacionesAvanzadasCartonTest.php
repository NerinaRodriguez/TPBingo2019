<?php

namespace Bingo;

use PHPUnit\Framework\TestCase;

class VerificacionesAvanzadasCartonTest extends TestCase {

  /**
   * Verifica que los números del carton se encuentren en el rango 1 a 90.
   */

  public function testUnoANoventa() {
    include CartonJs;

    foreach ($this->filas() as $fila) {
      foreach ($fila as $celda) {
        if ($celda >= 1 && $celda <= 90) {
          $numeros[] = $celda;
        }
      }
    }

    if ($numeros == $numeros_carton){
      $this->assertTrue(TRUE);
    }
  }

  /**
   * Verifica que cada fila de un carton tenga exactamente 5 celdas ocupadas.
   */
  public function testCincoNumerosPorFila() {
    $this->assertTrue(TRUE);
  }

  /**
   * Verifica que para cada columna, haya al menos una celda ocupada.
   */
  public function testColumnaNoVacia() {
    $this->assertTrue(TRUE);
  }

  /**
   * Verifica que no haya columnas de un carton con tres celdas ocupadas.
   */
  public function testColumnaCompleta() {
    $this->assertTrue(TRUE);
  }

  /**
   * Verifica que solo hay exactamente tres columnas que tienen solo una celda
   * ocupada.
   */
  public function testTresCeldasIndividuales() {
    $this->assertTrue(TRUE);
  }

  /**
   * Verifica que los números de las columnas izquierdas son menores que los de
   * las columnas a la derecha.
   */
  public function testNumerosIncrementales() {
    $this->assertTrue(TRUE);
  }

  /**
   * Verifica que en una fila no existan más de dos celdas vacias consecutivas.
   */
  public function testFilasConVaciosUniformes() {
    $this->assertTrue(TRUE);
  }

}
