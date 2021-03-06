<?php
/**
 * @category    Mana
 * @package     Mana_Admin
 * @copyright   Copyright (c) http://www.manadev.com
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
/* BASED ON SNIPPET: New Module/Helper/Data.php */
/**
 * Generic helper functions for Mana_Admin module. This class is a must for any module even if empty.
 * @author Mana Team
 */
class Mana_Admin_Helper_Data extends Mage_Core_Helper_Abstract {
    public function getStore() {
        $storeId = (int) Mage::app()->getRequest()->getParam('store', 0);
        return Mage::app()->getStore($storeId);
    }
	public function isGlobal() {
        return Mage::app()->isSingleStoreMode() || $this->getStore()->getId() == Mage_Core_Model_App::ADMIN_STORE_ID;
    }
	public function getStoreUrl($route, $params = array(), $query = array()) {
		if (!Mage::helper('mana_admin')->isGlobal()) {
			$params['store'] = Mage::helper('mana_admin')->getStore()->getId();
		}
		if (count($query)) {
			$params['_query'] = $query;
		}
		return Mage::getModel('adminhtml/url')->getUrl($route, $params);
	}
    public function processPendingEdits($type, &$edit) {
        foreach ($edit['pending'] as $id => $cells) {
            if (isset($edit['deleted'][$id])) {
                continue;
            }

            if (!($model = $this->loadEditedModel($type, $id, $edit['sessionId']))) {
                $model = $this->loadModel($type, $id);
            }
            else {
                $edit['saved'][$model->getEditStatus()] = $model->getId();
            }

            $isOriginal = false;
            if (!$model->getEditStatus()) {
                $isOriginal = true;
                $data = $model->getData();
                $model = $this->loadModel($type);
                $status = $data['id'];
                unset($data['id']);
                $model->addData($data)->setEditStatus($status)->setEditSessionId($edit['sessionId']);
            }

            $fields = array();
            $useDefault = array();
            foreach ($cells as $column => $cell) {
                if (!empty($cell['is_default'])) {
                    $useDefault[] = $column;
                }
                else {
                    $fields[$column] = $cell['value'];
                }
            }

            // processing
            // TD: $mistypedFields = $model->validateType($fields);
            $model->addEditedData($fields, $useDefault);

            $model->save();
            if ($isOriginal) {
                $edit['saved'][$id] = $model->getId();
            }
        }
        $edit['pending'] = array();
    }
    /**
     * @param int $id
     * @return Mana_Filters_Model_Filter2_Value
     */
    public function loadModel($type, $id = null) {
        if ($this->isGlobal()) {
            $model = Mage::getModel($type);
            if ($id) {
                $model->load($id);
            }
        }
        else {
            $model = Mage::getModel($type.'_store');
            if ($id) {
                $model->load($id);//->loadByGlobalId($id, $this->getStore()->getId());
            }
        }
        return $model;
    }
    public function loadEditedModel($type, $id, $sessionId) {
        if ($this->isGlobal()) {
            $collection = Mage::getResourceModel($type . '_collection');
        }
        else {
            $collection = Mage::getResourceModel($type . '_store_collection');
            $collection->addStoreFilter($this->getStore());
        }
        $collection->getSelect()
            ->where('`main_table`.`edit_status` = ?', $id)
            ->where('`main_table`.`edit_session_id` = ?', $sessionId);

        foreach ($collection as $item) {
            return $item;
        }
        return null;
    }

    public function loadSelectedModels($type, $edit) {
        if ($edit) {
            /* @var $collection Varien_Data_Collection_Db */
            if ($this->isGlobal()) {
                $collection = Mage::getResourceModel($type . '_collection');
            }
            else {
                $collection = Mage::getResourceModel($type . '_store_collection');
                $collection->addStoreFilter($this->getStore());
            }
            $collection
                ->setEditFilter($edit)
                ->addFieldToFilter('edit_massaction', 1)
                ->load();
            return $collection->getItems();
        }
        else {
            return array();
        }
    }
    public function dispatchGridAction($type, $controller, &$edit) {
        $request = Mage::app()->getRequest();
        if ($action = $request->getParam('action')) {
            if (!method_exists($controller, $action . 'GridAction')) {
                $controller = $this;
            }

            $method = $action.'GridAction';
            $controller->$method($type, $edit);
        }
    }
    public function addGridAction($type, &$edit) {
        $model = $this->loadModel($type);
        $model->setEditStatus(-1)->setEditSessionId($edit['sessionId']);
        if (!$this->isGlobal()) {
            $model->setStoreId($this->getStore()->getId());
        }
        $model->assignDefaultValues();
        $model->save();
        $edit['saved'][$model->getId()] = $model->getId();
    }

    public function removeGridAction($type, &$edit) {
        $models = $this->loadSelectedModels($type, $edit);
        if (count($models)) {
            foreach ($models as $model) {
                if (!$this->isGlobal() && $model->getGlobalId()) {
                    throw new Mage_Core_Exception($this->__('On store level, you can only delete rows which are specific to this store.'));
                }
                if (($id = array_search($model->getId(), $edit['saved'])) !== false) {
                    if ($id != $model->getId()) {
                        // modified
                        $edit['deleted'][$id] = $id;
                        unset($edit['saved'][$id]);
                    }
                    else {
                        // new
                        unset($edit['saved'][$model->getId()]);
                    }
                    $model->delete();
                }
                else {
                    // mot modified
                    $edit['deleted'][$model->getId()] = $model->getId();
                }
            }
        }
        else {
            throw new Mage_Core_Exception($this->__('Please select at least one grid row first.'));
        }
    }
    /**
     * @param Varien_Object $object
     * @param $field
     * @param $type
     * @throws Exception
     */
    public function saveEditedData($object, $field, $type, $beforeSaveCallback = null) {
        if ($edit = $object->getData($field)) {
            foreach ($edit['saved'] as $id => $editId) {
                if ($id != $editId) {
                    $editModel = $this->loadModel($type, $editId);
                    $data = $editModel->getData();
                    unset($data['id']);
                    $data['edit_status'] = 0;
                    $data['edit_session_id'] = 0;
                    $data['edit_massaction'] = 0;
                    $model = $this->loadModel($type, $id)->addData($data);
                    if ($beforeSaveCallback) {
                        call_user_func($beforeSaveCallback, $object, $model, $editModel);
                    }
                    $model->save();
                    $editModel->delete();
                }
                else {
                    $model = $this->loadModel($type, $id);
                    $model->setEditStatus(0);
                    $model->setEditSessionId(0);
                    $model->setEditMassaction(0);
                    if ($beforeSaveCallback) {
                        call_user_func($beforeSaveCallback, $object, $model, null);
                    }
                    $model->save();
                }
            }
            foreach ($edit['deleted'] as $id) {
                $model = $this->loadModel($type, $id);
                $model->delete();
            }
        }
        $object->unsetData($field);
        $object->setData('had_'. $field, true);
    }
    public function validateEditedData($object, $field, $type, $validateCallback = null) {
        if ($edit = $object->getData($field)) {
            foreach ($edit['saved'] as $id => $editId) {
                $editModel = $this->loadModel($type, $editId);
                $editModel->validate();
                if ($validateCallback) {
                    call_user_func($validateCallback, $object, $editModel);
                }
            }
        }
    }
}