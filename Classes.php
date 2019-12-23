<?php

abstract class Personagem {
    private $nome;
    private $vidaMax;
    private $vida;
    private $armadura;
    private $forca;
    private $forcaDefault;
    private $velocidade;
    private $equipe;
    private $nivel;
    private $mao1;
    private $mao2;
    
    
    function __construct($nome) {
        $this->nome = $nome;
        $this->nivel = 1;
        $this->vidaMax = 100;
        $this->vida = $this->vidaMax;
        $this->armadura = 100;
        $this->forca = 150;
        $this->forcaDefault = $this->forca;
        $this->velocidade = 100;
        $this->mao1 = 0;
        $this->mao1 = 0;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function tomarpocao() {
        
        // Criar classe para a poção??
        if($this->vida * 1.1 > $this->vidaMax){
            $this->vida = $this->vidaMax;
        }else{
            $this->vida *= 1.1;
        }
        //echo $this->vida . "  " . $this->vidaMax;
        //$this->vida *= 1.1;
        return "{$this->nome} recuperou vida e ficou com {$this->vida}";
    }
    
    public function equiparArma($mao, $arma){
        
        if ($mao == 1){
            if (!empty($this->mao1)){
            echo "<br> Arma já está equipada. Equipar mesmo assim?";} // quando tiver interação
            $this->desequiparArma(1);//}
            //}else{
                $this->mao1 = $arma;
                $this->forca = $this->forca * $this->mao1->__get('forca');
                echo "<br>{$this->__get('nome')} equipou {$this->mao1->__get('nome')} "
                . "com sucesso!";
            //}
        }elseif($mao == 2){
            if (!empty($this->mao2)){
            echo "<br>Arma já está equipada. Equipar mesmo assim";}
           
                $this->mao2 = $arma;
                $this->defesa = $this->defesa * $this->mao2->__get('defesa');
                echo "<br>{$this->__get('nome')} equipou {$this->mao1->__get('nome')} "
                . "com sucesso!";
            }
        
    }
    
    public function desequiparArma($mao){
        if($mao == 1){
            $this->mao1 = 0;
            $this->forca = $this->forcaDefault;
            
        }elseif ($mao == 2){
            $this->mao2 = 0;
        }
    }
}

class Arma{
    private $nome;
    private $tipo;
    private $forca;
    private $defesa;
    private $velocidade;
    private $nivel;
    
    public function __construct($nome, $tipo, $forca, $defesa, $velocidade) {
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->forca = $forca;
        $this->defesa = $defesa;
        $this->velocidade = $velocidade;
        $this->nivel = 1;
    }
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }

}

class Mago extends Personagem{
    public function __construct($nome) {
        parent::__construct($nome);
        $this->__set('armadura', $this->__get('armadura')*0.95);
        $this->__set('vidaMax', $this->__get('vidaMax')*1.05);
        $this->__set('vida', $this->__get('vidaMax'));
    }
}

class Cavaleiro extends Personagem{
    public function __construct($nome) {
        parent::__construct($nome);
        $this->__set('armadura', $this->__get('armadura')*1.15);
        $this->__set('velocidade', $this->__get('velocidade')*0.85);
        $this->__set('mao1', new Arma('Espada Curta', 'Espada', 1.1, 0, 0));
        $this->__set('mao2', new Arma('Escudo redodno', 'Escudo', 0, 1.05, 0));
        $this->__set('forca',
                    $this->__get('forca') * $this->__get('mao1')->__get('forca')
                );
    }
}

class Ladrao extends Personagem{
    public function __construct($nome) {
        parent::__construct($nome);
        $this->__set('armadura', $this->__get('armadura')*0.80);
        $this->__set('velocidade', $this->__get('velocidade')*1.075);
        $this->__set('forca', $this->__get('forca')*0.95);
        $this->__set('forcaDefault', $this->__get('forca'));
        $this->__set('mao1', new Arma('Espada Curta', 'Espada', 1.1, 0, 0));
        //$this->forca = $this->forca * $this->mao1->__get('forca');
        $this->__set('forca',
                    $this->__get('forca') * $this->__get('mao1')->__get('forca')
                );
    }
}

class Batalha{
    // Passar array de personagens como parametro???
    private $idBatalha;
    private $p1;
    private $p2;
    private $dano;
    
    public function __construct($p1, $p2) {
        $this->idBatalha = rand();
        $this->p1 = $p1;
        $this->p2 = $p2;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }

    
    public function ataqueComum($ataque, $defesa) {
        //$ataque = $ataque;
        //$defesa = $defesa;
        $fatorAtaque = $ataque->__get('forca')* 0.1;
        $fatorDefesa = $defesa->__get('armadura')*0.1;
        $this->dano = $fatorAtaque - $fatorDefesa;
        echo $this->resumoBatalha($ataque, $defesa);
        $defesa->__set('vida', $defesa->__get('vida') - $this->dano);       
    }
    
    public function resumoBatalha($a, $d){
        echo "<br>Batalha: {$this->idBatalha}<br>";
        echo "{$a->__get('nome')} causou {$this->__get('dano')} de dano em "
        . "{$d->__get('nome')} utilizando {$a->mao1->__get('nome')} <br>";       
    }
    
    
}


