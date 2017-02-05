<?php
namespace App\Controller\Admin\Forum;
use App\Controller\AppController;
class CategoriesController extends AppController
{
    /**
     * Display all categories.
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('ProductCategories');
        $categories = $this->ProductCategories
            ->find('treeList', [
                'spacer' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            ])
            ->toArray();
        $this->set(compact('categories'));
    }
    /**
     * Add a category.
     *
     * @return \Cake\Network\Response
     */
    public function add()
    {
        $this->loadModel('ProductCategories');
        $category = $this->ProductCategories->newEntity($this->request->data, ['validate' => 'create']);
        if ($this->request->is('post')) {
            if ($category->parent_id === 0) {
                $category->parent_id = null;
            }
            if ($this->ProductCategories->save($category)) {
                $this->Flash->success(__d('admin', 'Your category has been created successfully !'));
                return $this->redirect(['action' => 'index']);
            }
        }
        //Categories list.
        $categories = $this->ProductCategories
            ->find('treeList', [
                'spacer' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            ])
            ->toArray();
        //Add the Root category.
        $categories = [0 => __d('admin', 'Root')] + $categories;
        //Apply a map fonction to add a correct indentation for the categories.
        $map = function ($value) {
            if ($value !== __d('admin', 'Root')) {
                return '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $value;
            }
            return $value;
        };
        $categories = array_map($map, $categories);
        $this->set(compact('category', 'categories'));
    }
    /**
     * Move up a category.
     *
     * @return \Cake\Network\Response
     */
    public function moveUp()
    {
        $this->loadModel('ProductCategories');
        $category = $this->ProduCtcategories
            ->find()
            ->where([
                'ProductCategories.id' => $this->request->id
            ])
            ->first();
        if (empty($category)) {
            $this->Flash->error(__d('admin', 'This category doesn\'t exist or has been deleted.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->ProductCategories->moveUp($category);
        $this->redirect($this->referer());
    }
    /**
     * Move down a category.
     *
     * @return \Cake\Network\Response
     */
    public function moveDown()
    {
        $this->loadModel('ProductCategories');
        $category = $this->ProductCategories
            ->find()
            ->where([
                'ProductCategories.id' => $this->request->id
            ])
            ->first();
        if (empty($category)) {
            $this->Flash->error(__d('admin', 'This category doesn\'t exist or has been deleted.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->ProductCategories->moveDown($category);
        $this->redirect($this->referer());
    }
    /**
     * Edit a category.
     *
     * @return \Cake\Network\Response
     */
    public function edit()
    {
        $this->loadModel('ProductCategories');
        $category = $this->ProductCategories
            ->find()
            ->where([
                'ProductCategories.id' => $this->request->id
            ])
            ->first();
        if (empty($category)) {
            $this->Flash->error(__d('admin', 'This category doesn\'t exist or has been deleted.'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->request->is('put')) {
            $this->ProductCategories->patchEntity($category, $this->request->data());
            if ($category->parent_id === 0) {
                $category->parent_id = null;
            }
            if ($this->ProductCategories->save($category)) {
                $this->Flash->success(__d('admin', 'This category has been updated successfully !'));
                return $this->redirect(['action' => 'index']);
            }
        }
        //Categories list.
        $categories = $this->ProductCategories
            ->find('treeList', [
                'spacer' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
                'keyPath' => 'id'
            ])
            ->toArray();
        //Add the Root category.
        $categories = [0 => __d('admin', 'Root')] + $categories;
        //Apply a map fonction to add a correct indentation for the categories.
        $map = function ($value) {
            if ($value !== __d('admin', 'Root')) {
                return '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $value;
            }
            return $value;
        };
        $categories = array_map($map, $categories);
        $this->set(compact('category', 'categories'));
    }
    /**
     * Delete a category.
     *
     * @return \Cake\Network\Response
     */
    public function delete()
    {
        $this->loadModel('ProductCategories');
        $category = $this->ProductCategories
            ->find()
            ->where([
                'ProductCategories.id' => $this->request->id
            ])
            ->first();
        if (empty($category)) {
            $this->Flash->error(__d('admin', 'This category doesn\'t exist or has been deleted.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->loadModel('Products');
        $threads = $this->Products
            ->find()
            ->where([
                'Products.category_id' => $category->id
            ])
            ->count();
        if ($threads > 0) {
            $this->Flash->error(__d('admin', 'This category is not empty, you must delete/transfer all the threads assigned to this category before to delete it.'));
            return $this->redirect(['action' => 'index']);
        }
        if ($this->ProductCategories->delete($category)) {
            $this->Flash->success(__d('admin', 'This category has been delete successfully !'));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__d('admin', 'There was an error while deleting this category.'));
            return $this->redirect(['action' => 'index']);
        }
    }
}