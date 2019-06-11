<?php
namespace Bingo;
class FabricaCartones {
  public function generarCarton() {
    // Algo de pseudo-código para ayudar con la evaluacion.
    $carton = $this->intentoCarton();
    if ($this->cartonEsValido($carton)) {
      return $carton;
    }
    else{
        $this->generarCarton();
    }
  }
  protected function cartonEsValido($carton) {
    if ($this->validarUnoANoventa($carton) &&
      $this->validarCincoNumerosPorFila($carton) &&
      $this->validarColumnaNoVacia($carton) &&
      $this->validarColumnaCompleta($carton) &&
      $this->validarTresCeldasIndividuales($carton) &&
      $this->validarNumerosIncrementales($carton) &&
      $this->validarFilasConVaciosUniformes($carton)
    ) {
      return TRUE;
    }
    return FALSE;
  }
  protected function validarUnoANoventa($carton) {
    $bool = TRUE;
    foreach ($carton->filas() as $fila) {
      foreach ($fila as $celda) {
        if($celda == 0){
          continue;
        }
        if ($celda < 1 || $celda > 90) {
          $bool = FALSE;
        }
      }
    }
    $this->assertTrue($bool);
  }
  protected function validarCincoNumerosPorFila($carton) {
    foreach($carton->filas() as $fila) {
      $this->assertCount(5,array_filter($fila));
    }
  }
  protected function validarColumnaNoVacia($carton) {
    $co = 0;
    foreach($carton->columnas() as $columna){
      foreach($columna as $celda){
        if ($celda != 0){
        $co=$co+1;
        }
      }
      if($co == 0){
        $this->assertTrue(FALSE);
      }
      else{
        $co = 0;
      }
    }
    $this->assertTrue(TRUE);
  }
  protected function validarColumnaCompleta($carton) {
    $co=0;
    foreach($carton->columnas() as $columna) {
      foreach($columna as $celda){
        if($celda != 0){
          $co++;
        }
      }
      $this->assertNotEquals(3, $co);
      $co = 0; 
    }
  }
  protected function validarTresCeldasIndividuales($carton) {
    $co = 0;
    $co2 = 0;

    foreach($carton->columnas() as $columna) {
      foreach($columna as $celda){
        if($celda != 0){
          $co++;
        }
      }
      if($co==1){
        $co2=$co2+1;
        $co=0;
      }
    }

    $this->assertTrue($co2==3);
  }
  protected function validarNumerosIncrementales($carton) {
    $max = 0;
    $cel = 0;
    foreach($carton->columnas() as $columna){
      $min = 100;
      foreach($columna as $celda){
        if($celda < $min && $celda != 0){
          $min = $celda;
        }
        if ($celda > $cel){
          $cel = $celda;
        }
      }
      if($min>$max){
        $this->assertTrue(TRUE);
      }
      else{
        $this->assertTrue(FALSE);
      }
      $max = $cel;
    }
  }
  }
  protected function validarFilasConVaciosUniformes($carton) {
    foreach($carton->filas() as $fila){	
      $co = 0;
      foreach($fila as $celda){
      	if($celda == 0){
         $co++; 
        }
        else{
         $comax=$co;
         $co = 0;
        }
      }
      if($comax < 3){
      $this->assertTrue(TRUE);
      }
      else{
        $this->assertTrue(FALSE);
      }
    }
  }
  public function intentoCarton() {
    $contador = 0;
    $carton = [
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0],
      [0,0,0]
    ];
    $numerosCarton = 0;
    while ($numerosCarton < 15) {
      $contador++;
      if ($contador == 50) {
        return $this->intentoCarton();
      }
      $numero = rand (1, 90);
      $columna = floor ($numero / 10);
      if ($columna == 9) { $columna = 8;}
      $huecos = 0;
      for ($i = 0; $i<3; $i++) {
        if ($carton[$columna][$i] == 0) {
          $huecos++;
        }
        if ($carton[$columna][$i] == $numero) {
          $huecos = 0;
          break;
        }
      }
      if ($huecos < 2) {
        continue;
      }
      $fila = 0;
      for ($j=0; $j<3; $j++) {
        $huecos = 0;
        for ($i = 0; $i<9; $i++) {
          if ($carton[$i][$fila] == 0) { $huecos++; }
        }
        if ($huecos < 5 || $carton[$columna][$fila] != 0) {
          $fila++;
        } else{
          break;
        }
      }
      if ($fila == 3) {
        continue;
      }
      $carton[$columna][$fila] = $numero;
      $numerosCarton++;
      $contador = 0;
    }
    for ( $x = 0; $x < 9; $x++) {
      $huecos = 0;
      for ($y =0; $y < 3; $y ++) {
        if ($carton[$x][$y] == 0) { $huecos++;}
      }
      if ($huecos == 3) {
        return $this->intentoCarton();
      }
    }
    return $carton;
  }
}

class carton {
    protected $carton;
    
    public function __cunstruct(array $aleatorio){
        $this->carton = $aleatorio;
    }

    public function filas() {
        return [
          [0, 16, 0, 38, 47, 0, 67, 77, 0],
          [9, 0, 28, 35, 0, 55, 0, 0, 84],
          [0, 12, 26, 0, 45, 0, 61, 0, 89],
        ];
    }

    public function columnas() {
        return [
          [0,9,0],
          [16,0,12],
          [0,28,26],
          [38,35,0],
          [47,0,45],
          [0,55,0],
          [67,0,61],
          [77,0,0],
          [0,84,89],
        ];
    }

    public function tieneNumero(int $numero) {
        return in_array($numero, $this->numerosDelCarton());
    }
}





public function cartones() {
    return [
      [new CartonEjemplo],
      [new CartonJs],
      [new Carton((new FabricaCarton)->generarCarton())]
    ];
}

$prueba=new FabricaCartones;
$prueba->generarCarton();
