<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Canguro;

final class CanguroTest extends TestCase
{
    /**
     *  @covers Prueba 1
     */
    public function testSeEcuentran()
    {
        $canguro = new Canguro();
        $this->assertEquals("YES", $canguro->Encuentro(0,3,4,2));
    }
    /**
     * @covers Prueba 1
     */
    public function testNoSeEcuentran()
    {
        $canguro = new Canguro();
        $this->assertEquals("NO", $canguro->Encuentro(0,2,5,3));
    }

    /**
     * @expectedException InvalidArgumentException
     * Regla: 0 <= x1 <x2 <= 10000 
     * @covers Regla 1
     */
    public function testCreaExcepcionPorReglasPosicionPrimera()
    {
        $canguro = new Canguro();
        $canguro->Encuentro(10001,2,5,3);
    }
    /**
     * @expectedException InvalidArgumentException
     * Regla: 1 <v1 <= 10000 
     * @covers Regla 2
     */
    public function testCreaExcepcionPorReglasVelocidadPrimera()
    {
        $canguro = new Canguro();
        $canguro->Encuentro(0,10001,5,3);
    }
    /**
     * @expectedException InvalidArgumentException
     * 0 <= x1 <x2 <= 10000 
     * @covers Regla 3
     */
    public function testExcepcionPorReglasPosicionSegundo()
    {
        $canguro = new Canguro();
        $canguro->Encuentro(0,2,10001,3);
    }
    
    /**
     * @expectedException InvalidArgumentException
     * 1 <v2 <= 10000 
     * @covers Regla 4
     */
    public function testExcepcionPorReglasVelocidadSegundo()
    {
        $canguro = new Canguro();
        $canguro->Encuentro(0,2,5,10001);
    }

}
