<?php

use PHPUnit\Framework\TestCase;
use App\Fusee;
use PHPUnit\Framework\Attributes\DataProvider;



class FuseeTest extends TestCase {
    public function testEtatInitial(){
        $fusee = new Fusee("Ariane");
        $this->assertEquals("Ariane", $fusee->getNom());
        $this->assertEmpty($fusee->getEquipage());
    }

    public function testErreurCarburant(){
        $this->expectException(Exception::class);
        $fusee = new Fusee("Ariane");
        $fusee->ajouterCarburant(-10);
    }

    public function testEquipge(){
        $fusee = new Fusee("Ariane");
        $fusee->embarquerAstronaute("Thomas");
        $this->assertContains("Thomas", $fusee->getEquipage());
    }

    /* DATA PROVIDER */

    public static function fournisseurPortee(){
        return [
            [0, 0],
            [100, 250],
            [1000, 2500]
        ];
    }

    #[DataProvider('fournisseurPortee')]
    public function testCalculPortee($litres, $attendus){
        $fusee = new Fusee("Ariane");
        $fusee->ajouterCarburant($litres);
        $this->assertEquals($attendus, $fusee->calculerPortee($litres));
    }
}
