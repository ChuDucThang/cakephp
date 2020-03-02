<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event){
        $this->viewBuilder()->setLayout('dashboard');

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login(){
         $this->viewBuilder()->setLayout('login');
        if ($this->request->is('post')) {
            $users = $this->Auth->identify();
            if ($users) {
                $this->Auth->setUser($users);
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error('Your username or password is correct');
        }

    }

    public function register(){
         $this->viewBuilder()->setLayout('register');
        if ($this->request->is('post')) {
            $userTable = TableRegistry::get('Users');
            $user = $userTable->newEntity();

            $hasher = new DefaultPasswordHasher();
            $myusername = $this->request->getData('username');
            $mypassword = Security::hash($this->request->getData('password'), 'sha256', false);
            $myimage = $this->request->getData('image');
            $myfullname = $this->request->getData('fullname');
            $myphone = $this->request->getData('phone');
            $myaddress = $this->request->getData('address');
            $myemail = $this->request->getData('email');
            $mylevel = $this->request->getData('level');
            $mystatus = $this->request->getData('status');
            $mycreated = date('Y-m-d',time());
            $myupdated = date('Y-m-d',time());
            $mytoken = Security::hash(random_bytes(32));

            $user->username = $myusername;
            $user->password = $hasher->hash($mypassword);
            $user->image = $myimage;
            $user->fullname = $myfullname;
            $user->phone = $myphone;
            $user->address = $myaddress;
            $user->email = $myemail;
            $user->level = $mylevel;
            $user->status = $mystatus;
            $user->created_at = $mycreated;
            $user->updated_at = $myupdated;

            if($userTable->save($user)){
                $this->Flash->success('Successfull.');

                TransportFactory::setConfig('gmail', [
                    'host' => 'smtp.gmail.com',
                    'port' => 587,
                    'username' => 'my@gmail.com',
                    'password' => 'secret',
                    'className' => 'Smtp',
                    'tls' => true
                ]);

                $email = new Email();
                $email
                ->emailFormat('html')
                ->from('testemailsaishunkan@gmail.com','Admin')
                ->subject('Please confirm your email to activition your account')
                ->to($myemail)
                ->send('Hi' .$myfullname. '<br/>Please confirm your email link bellow</br/><a href="http://localhost/cakephp/users/verification"'.$mytoken.'>Verification Email</a>');

            }else{
                $this->Flash->error('Fail.');
            }

        }
    }


    public function verification(){

    }
}
