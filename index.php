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
        //Criando dois personagens para batalha
        $l1 = new Ladrao("Ladrão");
        $l2 = new Ladrao('ladrão II');
        
        
        // duas armas para teste
        $ar1 = new Arma('Espada Curta', 'Espada', 1.1, 0, 0);
        $ar2 = new Arma('Espada Longa', 'Espada', 1.15, 0, 0);
        
        $batalha[1] = new Batalha($l1, $l2);
     
        // Testando desequipando arma
        $l1->desequiparArma(1);
        $l2->desequiparArma(1);

        $l1->equiparArma(1, $ar1);
        $l2->equiparArma(1, $ar2);
        
        $batalha[1]->ataqueComum($l1, $l2);
        $batalha[1]->ataqueComum($l2, $l1);
        
        //print_r($batalha[1]);
        
        
        
        
        
        
        
      
        
      
        
        
        //print_r($batalha);
 
        
        
        
        
        
        
        
       
        // put your code here
        ?>
</pre>
    </body>
</html>
