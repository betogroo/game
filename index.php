<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <pre>
        <?php
        require_once 'Classes.php';
        
        echo "<br>";
        //Criando personagens para batalha as batalhas
//        $l1 = new Ladrao("Ladrão");
//        $l2 = new Ladrao('Ladrão II');
//        $c1 = new Cavaleiro("Arthur");
        
        $p[1] = new Ladrao("Ladrão");
        $p[2] = new Ladrao('Ladrão II');
        $p[3] = new Cavaleiro("Arthur");
        $p[4] = new Mago("Harry Porta");
        
        
        // armas para teste
        $ar1 = new Arma('Espada Curta', 'Espada', 1.1, 0, 0);
        $ar2 = new Arma('Espada Longa', 'Espada', 1.15, 0, 0);
        $ar3 = new Arma('Bolota de Pregos', 'Bolota', 1.3, 0, 0);
        
        $batalha[1] = new Batalha($p);
        
        print_r($batalha);
        
        
        ?>
</pre>
    </body>
</html>
