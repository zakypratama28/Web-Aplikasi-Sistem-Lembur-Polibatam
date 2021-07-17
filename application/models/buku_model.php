<?php

class Buku_Model extends CI_Model{
	
	public function isidata(){
		return array(
			array(
				'judul'=>'Sang Pemimpin',
				'pengarang'=>'Andrea Hirata',
				'tahun'=>'1991' ),
			array(
				'judul'=>'Koala Kumal',
				'pengarang'=>'Raditya Dika',
				'tahun'=>'1985' ),
		);
		}
	}
?>