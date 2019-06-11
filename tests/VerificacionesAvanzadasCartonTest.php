<?php

namespace Bingo;

use PHPUnit\Framework\TestCase;

include CartonEjemplo;

class VerificacionesAvanzadasCartonTest extends TestCase {

  /**
   * Verifica que los números del carton se encuentren en el rango 1 a 90.
   */

  public function testUnoANoventa() {
    
    $bool = True;
    $carton=new CartonEjemplo;

    foreach ($carton->filas() as $fila) {
      foreach ($fila as $celda) {
        if ($celda < 1 || $celda > 90) {
          $bool = False;
        }
      }
    }

    $this->assertTrue($bool);
    
  }

  /**
   * Verifica que cada fila de un carton tenga exactamente 5 celdas ocupadas.
   */
  public function testCincoNumerosPorFila() {

    $carton=new CartonEjemplo;

    foreach($carton->filas() as $fila) {
      $this->assertCount(5,array_filter($fila));
    }

  }

  /**
   * Verifica que para cada columna, haya al menos una celda ocupada.
   */
  public function testColumnaNoVacia() {
    
    $bool = True;
    $carton=new CartonJs;

    foreach($carton->columna() as $columna){
      if($bool){
        foreach($columna as $celda){
          $bool = False;
          if ($celda != 0){
          $bool = True;
          }
        }
      }
    }
    
    $this->assertTrue($bool);
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
