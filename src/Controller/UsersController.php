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
        $this->Authentication->allowUnauthenticated(['login','register','verification','logout', 'forgotpassword' ]);

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if ($this->request->session()->read('Auth.level') == 1 || $this->request->session()->read('Auth.level') == 2) {
            $users = $this->paginate($this->Users);

            $this->set(compact('users'));
        }else{
            $this->Flash->error(__('Nhân viên không có quyền truy cập chức năng này.'));
            return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
        }
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
            $user->password = Security::hash($this->request->getData('password'), 'md5',true);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->request->session()->read('Auth.level') == 1) {
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
             $this->Flash->error(__('Admin mới có quyền thực hiện chức năng này'));
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

    public function login()
    {
        $this->viewBuilder()->setLayout('login');
        $result = $this->Authentication->getResult();
        
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/dashboard';
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function register(){
         $this->viewBuilder()->setLayout('register');
        if ($this->request->is('post')) {
            $userTable = TableRegistry::get('Users');
            $user = $userTable->newEntity();

            $hasher = new DefaultPasswordHasher();
            $myusername = $this->request->getData('username');
            $mypassword = $this->request->getData('password');
            $myimage = $this->request->getData('image');
            $myfullname = $this->request->getData('fullname');
            $myphone = $this->request->getData('phone');
            $myaddress = $this->request->getData('address');
            $myemail = $this->request->getData('email');
            $mylevel = $this->request->getData('level');
            $mystatus = 1;
            $mycreated = date('Y-m-d',time());
            $myupdated = date('Y-m-d',time());
            $mytoken = Security::hash(random_bytes(32));

            $user->username = $myusername;

            $user->password = Security::hash($mypassword,'md5', true);
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
                ->send('Hi' .$myfullname. '<br/>Please confirm your email link bellow</br/><a href="http://localhost.local/users/verification"'.$mytoken.'>Verification Email</a>');

            }else{
                $this->Flash->error('Fail.');
            }

        }
    }


    public function verification(){
        $this->viewBuilder()->setLayout('login');
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }

    public function forgotpassword(){
         $this->viewBuilder()->setLayout('login');
         if ($this->request->is('post') ){
            // set new pass
            $mypassreset = random_int(100000, 999999);

            $myemail = $this->request->getData('email');

            $userTable = TableRegistry::get('Users');
            $user = $userTable->find('all')->where(['email' => $myemail])->first();
            $user->password = Security::hash($mypassreset,'md5',true);

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
                ->send('Mat khau moi cua ban la ' .$mypassreset. ' Dung mat khau moi de dang nhap.');

            }else{
                $this->Flash->error('Fail.');
            }


         //     $userTable = TableRegistry::get('Users');
         //     $user = $userTable->find('all')->where(['password' => $mypass])->first();
         }
    }

    public function profile(){
        $id = $this->request->session()->read('Auth.id');

        $profile = $this->paginate($this->Users->find()->where(['Users.id' => $id]));
        $this->set('profile', $profile);
    }

    public function updateprofile($id){

          $profile = $this->Users->get($id, [
            'contain' => [],
        ]);
           if ($this->request->is(['patch', 'post', 'put'])) {
            $profile = $this->Users->patchEntity($profile, $this->request->getData());
            if ($this->Users->save($profile)) {
                $this->Flash->success(__('Updated profile.'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('profile'));

    }
}
