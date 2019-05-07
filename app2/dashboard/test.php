<?php
session_start();
require_once('../config/cAdivinanza.php');
$r = new cAdivinanza();

$adivinanza = $r->getAdivinanzas();

	foreach ($adivinanza as $adiv) {
		echo $adiv['id'] .'<br>';
				//saber si ya la contesto
					$res = $r->search_respuesta($adiv['id']);
					
					$res2 = $r->search_respuesta_incorrecta($adiv['id']);			
					
	
					if ($res) {	
						if ($res2) {
							echo "Esta en las respuetas y es incorrecta " .$adiv['id'].'<br>';

							//echo $adiv['id'];	
						}						
					}else{
						echo "No esta en las respuetas " .$adiv['id'].'<br>';
						//echo $adiv['id'];
					}

				}