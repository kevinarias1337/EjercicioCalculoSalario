<?php

if(isset($_POST["btncalcular"])){
require_once 'logica/Salud.php';
require_once 'logica/Pension.php';
require_once 'logica/Caja.php';
require_once 'logica/Salario.php';

$cantidadHoras = $_POST["txthorastrabajadas"];
$valorHora = $_POST["txtcostohoratrabajo"];

sleep(1);

$objSalario = new Salario($cantidadHoras, $valorHora);
$objCaja = new Caja($cantidadHoras, $valorHora);
$objPension = new Pension($cantidadHoras, $valorHora);
$objSalud = new Salud($cantidadHoras, $valorHora);

//$objSalario->setCantidadHoras($cantidadHoras);
//$objSalario->setValorHora($valorHora);

echo "<b>El salario bruto es </b>" . $objSalario->calcularSalarioBruto() . "<br>";

if($objSalario->calcularSalarioBruto()<=1000000){
    //$objSalud->setCantidadHoras($cantidadHoras);
    //$objSalud->setValorHora($valorHora);
    echo "<b>Descuento de salud es de </b>" . $objSalud->calcularSalud(0.02);

    //$objPension->setCantidadHoras($cantidadHoras);
    //$objPension->setValorHora($valorHora);
    echo "<br><b>Descuento de pensión es de </b>" . $objPension->calcularPension(0.04);

    $incremento=$objSalario->calcularSalarioBruto()*0.03;

    $salarioFinal=($objSalario->calcularSalarioBruto()+$incremento)-$objSalud->calcularSalud(0.02)-$objPension->calcularPension(0.04);
    echo "<br><b>El salario final es de </b>" . $salarioFinal;


}else if($objSalario->calcularSalarioBruto()>1000000 && $objSalario->calcularSalarioBruto()<=2000000){
    //$objSalud->setCantidadHoras($cantidadHoras);
    //$objSalud->setValorHora($valorHora);
    echo "<b>Descuento de salud es de </b>" . $objSalud->calcularSalud(0.04);

    //$objPension->setCantidadHoras($cantidadHoras);
    //$objPension->setValorHora($valorHora);
    echo "<br><b>Descuento de pensión es de </b>" . $objPension->calcularPension(0.06) . "<br>";

    //$objCaja->setCantidadHoras($cantidadHoras);
    //$objCaja->setValorHora($valorHora);
    echo "<b>Descuento caja de compensación es de </b>" . $objCaja->calcularCaja(0.02);

    $salarioFinal=($objSalario->calcularSalarioBruto()-$objSalud->calcularSalud(0.04)-$objPension->calcularPension(0.06)-$objCaja->calcularCaja(0.02));
    echo "<br><b>El salario final es de </b>" . $salarioFinal;


}else if($objSalario->calcularSalarioBruto()>2000000){
    //$objSalud->setCantidadHoras($cantidadHoras);
    //$objSalud->setValorHora($valorHora);
    echo "<b>Descuento de salud es de </b>" . $objSalud->calcularSalud(0.05);

    //$objPension->setCantidadHoras($cantidadHoras);
    //$objPension->setValorHora($valorHora);
    echo "<br><b>Descuento de pensión es de </b>" . $objPension->calcularPension(0.07) . "<br>";

    //$objCaja->setCantidadHoras($cantidadHoras);
    //$objCaja->setValorHora($valorHora);
    echo "<b>Descuento caja de compensación es de </b>" . $objCaja->calcularCaja(0.03);

    $salarioFinal=($objSalario->calcularSalarioBruto()-$objSalud->calcularSalud(0.05)-$objPension->calcularPension(0.07)-$objCaja->calcularCaja(0.03));
    echo "<br><b>El salario final es de </b>" . $salarioFinal;
}

}
?>