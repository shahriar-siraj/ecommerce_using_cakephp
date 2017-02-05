<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\I18n\Time;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use HTMLPurifier;
use HTMLPurifier_Config;

class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];

    /**
     * Hash the password before to save.
     *
     * @param string $password Password to be hashed.
     *
     * @return string
     */
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    /**
     * Get the full name of the user. If empty, return the username.
     *
     * @return string
     */
    protected function _getFullName()
    {
        $fullName = trim($this->first_name . ' ' . $this->last_name);
        return (!empty($fullName)) ? $fullName : $this->username;
    }

    /**
     * Set the user group name.
     *
     * @return string
     *
     * @throws \Exception\Execption
     */
    protected function _getGroupName()
    {
        if (!isset($this->group)) {
            throw new \Exception(__('You must select the Groups for the function User::_getGroupName().'));
        }
        if ($this->group->is_member == true && $this->premium === true) {
            return __('Premium');
        }
        return $this->group->name;
    }

}
