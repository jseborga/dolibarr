<?php
require_once DOL_DOCUMENT_ROOT.'/core/class/commonobject.class.php';

/**
 * PettyCash account
 */
class PettyCash extends CommonObject
{
    public $table_element = 'pc_pettycash';
    public $element = 'pettycash';
    public $picto = 'money-bill-alt';
    public $ismultientitymanaged = 1;

    const STATUS_OPEN = 0;
    const STATUS_SUBMITTED = 1;
    const STATUS_VERIFIED = 2;
    const STATUS_INVOICED = 3;

    public $fk_user;
    public $balance;
    public $status;
    public $fk_project;
    public $doc_path;

    /** Create record */
    public function create(User $user, $notrigger = false)
    {
        $this->date_creation = dol_now();
        return $this->createCommon($user, $notrigger);
    }

    /** Update record */
    public function update(User $user, $notrigger = false)
    {
        $this->date_update = dol_now();
        return $this->updateCommon($user, $notrigger);
    }

    /** Validate account */
    public function validate(User $user, $notrigger = false)
    {
        $this->status = self::STATUS_SUBMITTED;
        return $this->update($user, $notrigger);
    }

    public function setVerified(User $user)
    {
        $this->status = self::STATUS_VERIFIED;
        return $this->update($user);
    }

    public function setInvoiced(User $user)
    {
        $this->status = self::STATUS_INVOICED;
        return $this->update($user);
    }
}
