<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use Cake\Auth\DefaultPasswordHasher;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class UsersController extends AppController
{
     /**
     * 権限管理
     */
    public function isAuthorized($user)
    {
        $id = $this->request->params['pass'][0];
        if ($id == $user['id']) {
            return true;
        }
        return false;
    }
    
    /**
     * Initialization method
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    /**
     * ログインページ
     */
    public function login()
    {
        $this->set('title', 'ログイン');
        $this->viewBuilder()->setLayout('login');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl(['controller' => 'items', 'action' => 'list']));
            } else {
                $this->Flash->error('メールアドレスまたはパスワードが正しくありません。');
            }
        }

        // デバッグ用。パスワード手動で作ってDBに入れたい時
        // $hasher = new DefaultPasswordHasher();
        // var_dump($hasher->hash('skedan'));
    }

    /**
     * ログアウト
     */
    public function logout()
    {
        $this->Flash->success('ログアウトしました。');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * ユーザー情報変更
     */
    public function edit($id= null)
    {
        $this->set('title', 'ユーザー情報変更');
        $data = $this->Users->find('all');
        $this->Users->id = $id;
	    if($this->request->is('get')) {
	        // $this->request->data=$this->Users->read();   
	    }
	    else {
	        if($this->Users->save($this->request->data)) {
	            $this->Session->setFlash('更新完了');
	            $this->redirect(array('action'=>'lists'));
	        }
	        else {
	            $this->Sessin->setFlash('更新失敗');
	        }
	    }
    }
    
}


