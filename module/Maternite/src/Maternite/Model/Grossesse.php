<?php

namespace Maternite\Model;

class Grossesse {
	public $id_patient;
	public $id_cons;
	public $ddr;
	public $duree_grossesse;
	public $nb_cpn;
	public $bb_attendu;
	public $vat_1;
	public $vat_2;
	public $vat_3;
	public $note_ddr;
	public $note_cpn;
	public $note_bb;
	public $note_vat;
	public function exchangeArray($data) {
				
		$this->ddr= (! empty ( $data ['ddr'] )) ? $data ['ddr'] : null;
		$this->duree_grossesse= (! empty ( $data ['duree_grossesse'] )) ? $data ['duree_grossesse'] : null;
		$this->bb_attendu= (! empty ( $data ['bb_attendu'] )) ? $data ['bb_attendu'] : null;		    
		$this->vat_1 = (! empty ( $data ['vat_1'] )) ? $data ['vat_1'] : null;
		$this->vat_2 = (! empty ( $data ['vat_2'] )) ? $data ['vat_2'] : null;
		$this->vat_3= (! empty ( $data ['vat_3'] )) ? $data ['vat_3'] : null;
		$this->nb_cpn= (! empty ( $data ['nb_cpn'] )) ? $data ['nb_cpn'] : null;
		$this->id_patient = (! empty ( $data ['id_patient'] )) ? $data ['id_patient'] : null;
		$this->note_ddr= (! empty ( $data ['note_ddr'] )) ? $data ['note_ddr'] : null;
		$this->note_cpn= (! empty ( $data ['note_cpn'] )) ? $data ['note_cpn'] : null;
		$this->note_bb= (! empty ( $data ['note_bb'] )) ? $data ['note_bb'] : null;
		$this->note_vat= (! empty ( $data ['note_vat'] )) ? $data ['note_vat'] : null;
		$this->id_cons = (! empty ( $data ['id_cons'] )) ? $data ['id_cons'] : null;
	}
	public function getArrayCopy() {
		//return get_object_vars ( $this );
	}
}