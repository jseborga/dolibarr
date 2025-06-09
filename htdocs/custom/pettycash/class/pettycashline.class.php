<?php
require_once DOL_DOCUMENT_ROOT.'/core/class/commonobjectline.class.php';

/**
 * Line of petty cash expense
 */
class PettyCashLine extends CommonObjectLine
{
    public $table_element = 'pc_pettycashline';
    public $element = 'pettycashline';
    public $ismultientitymanaged = 1;

    public $fk_pettycash;
    public $label;
    public $amount;
    public $fk_project;
    public $status = 0;
    public $doc_path;

    public function insert($notrigger = false)
    {
        return $this->insertCommon($notrigger);
    }
}
