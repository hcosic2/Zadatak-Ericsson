<?php

class baza{
    const korisnik = 'root';
    const server = 'localhost';
    const lozinka = '';
    const baza = 'ericsson_baza';
    
    function spajanje(){
        $this->spojeno = new mysqli(self::server, self::korisnik, self::lozinka, self::baza);
        if ($this->spojeno->connect_errno){
            echo "Neuspješno spajanje na bazu: " .
                    $this->spojeno->connect_errno . ", " . 
                    $this->spojeno->connect_error;
            
            }
          $this->spojeno->set_charset("utf8");
          if($this->spojeno->connect_errno) {
              echo 'Neuspješno postavljanje znakova za bazu:' . 
                      $this->spojeno->connect_errno. ", " .
                      $this->spojeno->connect_error;
              
          }
          return $this->spojeno;
        }
        
    function prekid() {
        $veza = self::spajanje();
        if(mysqli_close($veza)){
        } else {
            echo 'Veza nije prekinuta!';
            exit();
        }
    }
    function selectUpit($upit){
        $veza = self::spajanje();
        $rezultat = $veza->query($upit) or trigger_error("Greška kod upita: {$upit} - Greška: ".$veza->error.''.E_USER_ERROR);
         
        if(!$rezultat){
            $rezultat = null;
        }
        return $rezultat;
        
        }
        
    function upiti($upit){
        $veza = self::spajanje();
        if($rezultat = $veza->query($upit)){
            self::prekid();
        } else {
            echo 'Pogrešan upit';
			echo "<br />";
			echo $upit;
			echo "<br />";
			echo $veza->error;
            exit();
        }
        return $rezultat;
    }
    }
