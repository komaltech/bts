<?php

/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 08/04/16
 * Time: 2:26
 */

namespace Yanna\bts\Http\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Yanna\bts\Domain\Entity\DocList;
use Yanna\bts\Domain\Entity\Document;
use Yanna\bts\Domain\Entity\Documentation;
use Yanna\bts\Domain\Entity\EngineerDua;
use Yanna\bts\Domain\Entity\Site;
use Yanna\bts\Domain\Entity\Remark;
use Yanna\bts\Domain\Services\EngineerServices;
use Yanna\bts\Http\Form\gmapForm;
use Yanna\bts\Http\Form\inputImage;
use Yanna\bts\Http\Form\inputImageOutdoor;
use Yanna\bts\Http\Form\loginForm;
use Yanna\bts\Http\Form\RemarkForm;
use Yanna\bts\Http\Form\selectSiteAfterLoginForm;
use Yanna\bts\Domain\Entity\User;
use Yanna\bts\Domain\Entity\Engineer;
use Yanna\bts\Http\Form\photoForm;
use Yanna\bts\Domain\Services\userPasswordMatcher;
//use Yanna\bts\Domain\Services\UserServices;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Yanna\bts\Http\Form\siteForm;
use Yanna\bts\Http\Form\selectSiteForm;
use Yanna\bts\Http\Form\userForm;

class AppController implements ControllerProviderInterface
{

    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Main Controller
     * @param  Application $app [description]
     * @return Controller           [description]
     */
    public function connect(Application $app)
    {
        $controller = $app['controllers_factory'];

        /**
         * -------------------------
         * Core Controller
         * -------------------------
         */
        $controller->get('/error404', [$this, 'errorPageAction'])
            ->bind('errorPage');

        $controller->get('/home', [$this, 'homeAction'])
            ->before([$this, 'checkUserRole'])
            ->bind('home');

        $controller->get('/createRawUser', [$this, 'createRawUserAction'])
            ->bind('createUser');

        $controller->get('/logout', [$this, 'logoutAction'])
            ->bind('logout');

        $controller->match('/login', [$this, 'loginAdminAction'])
            ->before([$this, 'checkUserRole'])
            ->bind('loginAdmin');

        $controller->match('/printReportIndoor', [$this, 'printReportIndoorBeforeAction'])
            ->bind('printReportAllBefore');

        $controller->match('/printReportOutdoor',[$this,'printReportOutdoorBeforeAction'])
            ->bind('printReportAllOutdoorBefore');

//        $controller->match('/reviewAll',[$this,'reviewAllAction'])
//            ->bind('reviewAll');

        $controller->match('/reviewPrintIndoor',[$this,'reviewPrintIndoorAction'])
            ->bind('reviewPrintIndoor');

        $controller->get('/reviewPrintOutdoor',[$this,'reviewPrintOutdoorAction'])
            ->bind('reviewPrintOutdoor');

 
 $controller->match('/reviewUploadIndoor',[$this,'reviewUploadIndoorAction'])
            ->bind('reviewUploadIndoor');

        $controller->match('/reviewUploadOutdoor',[$this,'reviewUploadOutdoorAction'])
            ->bind('reviewUploadOutdoor');

        $controller->get('/printReportIndoorAfter',[$this, 'printReportIndoorAction'])
            ->bind('printReportAllAfter');

        $controller->get('/printReportOutdoorAfter',[$this,'printReportOutdoorAction'])
            ->bind('printReportAllOutdoorAfter');

        /**
         * -------------------------
         * Admin or Owner Controller
         * -------------------------
         */
//        $controller->match('/siteSelect', [$this, 'selectSiteAction'])
////            ->before([$this, 'checkUserEngineer'])
//                ->bind('siteSelect');

        $controller->match('/newUser', [$this, 'newUserAction'])
            ->before([$this, 'checkUserException'])
            ->bind('newInputUser');

        $controller->get('/listUser', [$this, 'showAllUser'])
            ->bind('listUser');

        $controller->get('/listRemark',[$this,'showAllRemark'])
            ->bind('listRemark');

        $controller->get('/deleteRemark/{id}',[$this,'deleteRemarkAction'])
            ->bind('deleteRemark');

        $controller->get('/deleteUser/{id}', [$this, 'deleteUserAction'])
            ->bind('deleteUser');

        $controller->get('/deleteSite/{id}', [$this, 'deleteSiteAction'])
            ->bind('deleteSite');

        $controller->get('/editUser{id}',[$this,'editUserAction'])
            ->bind('editUser');

        $controller->match('/newSite', [$this, 'newSiteAction'])
            ->bind('newInputSite');

        $controller->get('/listSite', [$this, 'showAllSite'])
            ->bind('listSite');

        $controller->match('/updateUser', [$this, 'updateUserAction'])
            ->bind('updateUser');
        
        $controller->match('/updateSite',[$this,'updateSiteAction'])
            ->bind('updateSite');


        /**
         * -------------------------
         * Engineer Controller
         * -------------------------
         */
        $controller->get('/formOutdoor', [$this, 'outdoorInstallationAction'])
            ->bind('outdoorInstallation');

        $controller->get('/formInstallation', [$this, 'installationChecklistAction'])
            ->bind('installationChecklist');

        $controller->get('/formEnvironment',[$this,'externalChecklistAction'])
            ->bind('externalChecklist');

        $controller->post('/formEnvironment', [$this, 'environmentMonitoringAction'])
            ->bind('environmentMonitoring');

        $controller->match('/selectSiteAfterLogin', [$this, 'selectSiteAfterLoginAction'])
            ->bind('selectSiteAfterLogin');

        $controller->post('/formInstallation', [$this, 'installationProccessAction'])
            ->bind('formInstalationProccess');
        
        $controller->match('/uploadImageIndoor', [$this, 'uploadImageAction'])
//            ->before([$this,'uploadImageBeforeAction'])
            ->bind('uploadImageIndoor');

        $controller->match('/uploadImageIndoorBefore', [$this, 'uploadImageIndoorBeforeAction'])
            ->bind('uploadImageBefore');

        $controller->match('/uploadImageOutdoorBefore',[$this,'uploadImageOutdoorBeforeAction'])
            ->bind('uploadImageOutdoorBefore');

        $controller->match('/uploadImageOutdoor', [$this, 'uploadImageNextAction'])
//            ->before([$this,'uploadImageBeforeAction'])
            ->bind('uploadImageOutdoor');


        /**
         * -------------------------
         * Documentation Controller
         * -------------------------
         */

        $controller->match('/listForm', [$this, 'listFormDocumentationBeforeAction'])
            ->bind('listFormDocumentationBefore');

 $controller->match('/listFormOutdoor',[$this,'listUploadBeforeAction'])
            ->bind('listUploadBefore');

        $controller->get('/listFormOutdoorAfter',[$this,'listUploadAction'])
            ->bind('listUploadAfter');

        $controller->get('/listFormAfter', [$this, 'listFormDocumentationAction'])
            ->bind('listFormDocumentation');

        $controller->get('/changeValStatus/{id}', [$this, 'changeValStatusAction'])
            ->bind('changeValStatus');

   $controller->get('/changeValStatusOutdoor/{id}',[$this,'changeValStatusOutdoorAction'])
            ->bind('changeValStatusOutdoor');

        $controller->get('/reviewFirstDocument', [$this, 'reviewFirstDocAction'])
            ->bind('reviewFirstDocument');

        $controller->get('/reviewSecondDocument',[$this,'reviewSecondDocAction'])
            ->bind('reviewSecondDocument');

        $controller->match('/siteDocumentation', [$this, 'siteDocumentationBeforeAction'])
            ->bind('siteDocumentationBefore');
        
         $controller->match('/siteDocumentationOutdoor',[$this,'siteDocumentationOutdoorBeforeAction'])
            ->bind('siteDocumentationOutdoorBefore');


        //$controller->get('/siteDocumentationAfter', [$this, 'siteDocumentationAction'])
          //  ->bind('siteDocumentation');

        $controller->post('/siteDocumentationAfter', [$this, 'siteDocumentationSubmitAction'])
            ->bind('siteDocumentationSubmit');

       $controller->match('/siteDocumentationOutdoorAfter',[$this,'siteDocumentationOutdoorSubmitAction'])
            ->bind('siteDocumentationOutdoorSubmit');

        /**
         * -------------------------
         * Vendor Controller
         * -------------------------
         */
        $controller->get('/btsForm', [$this, 'btsFormAction'])
            ->bind('btsForm');

        $controller->match('/newRemark',[$this,'newRemarkAction'])
            ->bind('newRemark');

        $controller->get('/btsCommissioningForm', [$this, 'btsCommissioningAction'])
            ->bind('btsCommissioning');

        $controller->get('/basicServiceForm', [$this, 'basicServiceAction'])
            ->bind('btsService');

        $controller->get('/integrationTestForm', [$this, 'integrationTestAction'])
            ->bind('integrationTest');

        $controller->get('/handoverTestInside', [$this, 'handoverTestInsideAction'])
            ->bind('handoverTestInside');

        $controller->get('/handoverTestBetween', [$this, 'handoverTestBetweenAction'])
            ->bind('handoverTestBetween');

        $controller->match('/listFormDocIndoor', [$this, 'listFormDocIndoorBeforeAction'])
            ->bind('listFormDocIndoorBefore');

        $controller->match('/listFormDocOutdoor',[$this,'listFormDocOutdoorBeforeAction'])
            ->bind('listFormDocOutdoorBefore');

        $controller->get('/listFormDocIndoorAfter', [$this, 'listFormDocIndoorAction'])
            ->bind('listFormDocIndoorAfter');

        $controller->get('/listFormDocOutdoorAfter',[$this,'listFormDocOutdoorAction'])
            ->bind('listFormDocOutdoorAfter');

        $controller->get('/reviewDocFile', [$this, 'reviewDocDocumentAction'])
            ->bind('reviewDocDocument');

        $controller->match('/inputNewRemark', [$this, 'inputNewRemarkAction'])
            ->bind('inputNewRemark');



        $controller->get('/punchListForm', [$this, 'punchListAction'])
            ->bind('punchListSummary');

        $controller->get('/showJson', [$this, 'showJsonAction'])
            ->bind('showJsonSite');
//
//        $controller->match('/upload', [$this, 'photoAction'])
//            ->bind('uploadFile');

        $controller->get('/map', [$this, 'gmapAction'])
            ->bind('gmap');

        return $controller;
    }

     public function inputNewRemarkAction(Request $request)
    {
        $formId = $request->get('formId');
        $siteRepo = $this->app['documentation.repository']->findByFormId($formId);
        $siteName = $siteRepo->getSiteName();
        if($request->getMethod() == 'GET') {
            return $this->app['twig']->render('Vd/inputRemark.twig');
        }

        if($request->getMethod() == 'POST') {
            $comment = $request->get('remarkNew');
            $remark = Remark::create($comment, $siteName, $formId);

            $this->app['orm.em']->persist($remark);
            $this->app['orm.em']->flush();

            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }
    }

    public function reviewDocDocumentAction()
    {
        $docData = $this->app['documentation.repository']->findByFormId($this->app['request']->get('id'));
        $docFormState = unserialize($docData->formState);
        return $this->app['twig']->render('Vd/reviewDoc.twig', ['infoForm' => $docData,'revDoc'=>$docFormState]);

    }

    public function listFormDocIndoorBeforeAction(Request $request)
    {
        if ($request->getMethod() === 'POST') {
            $this->app['session']->set('siteVendorSelect', ['value' => $request->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('listFormDocIndoorAfter'));
        }
        $siteList = $this->app['documentation.repository']->findBySiteStatus(0);
        return $this->app['twig']->render('Vd/siteSelect.twig', ['listSite' => $siteList]);
    }

    public function listFormDocOutdoorBeforeAction(Request $request)
    {
        if ($request->getMethod()==='POST')
        {
            $this->app['session']->set('siteVendorSelect',['value'=>$request->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('listFormDocOutdoorAfter'));
        }

        $siteList = $this->app['documentation.repository']->findBySiteStatus(1);
      return $this->app['twig']->render('Vd/siteSelect.twig',['listSite'=>$siteList]);
    }

    public function listFormDocIndoorAction()
    {
        $docFormList = $this->app['documentation.repository']->findBySiteNameAndStatus($this->app['session']->get('siteVendorSelect')['value'], 0);

        return $this->app['twig']->render('Vd/listDocIndoorForm.twig', ['listDoc' => $docFormList]);
//        return $this->app['twig']->render('Vd/listDocForm.twig');
//        return 'ok';
    }

    public function listFormDocOutdoorAction()
    {
        $docFormList = $this->app['documentation.repository']->findBySiteNameAndStatus($this->app['session']->get('siteVendorSelect')['value'], 1);

        return $this->app['twig']->render('Vd/listDocOutdoorForm.twig',['listDoc'=>$docFormList]);
    }

    public function changeValStatusAction()
    {
        $validationStat = $this->app['engineer.repository']->findById($this->app['request']->get('id'));
        EngineerServices::changeStatus($validationStat);

        $this->app['orm.em']->persist($validationStat);
        $this->app['orm.em']->flush();
        $this->app['session']->getFlashBag()->add(
            'message_success',
            'Command completed successfully'
        );

        return $this->app->redirect($this->app['url_generator']->generate('listFormDocumentation'));
    }

 public function changeValStatusOutdoorAction()
    {
        $validationStat = $this->app['engineer.repository']->findById($this->app['request']->get('id'));
        EngineerServices::changeStatus($validationStat);

        $this->app['orm.em']->persist($validationStat);
        $this->app['orm.em']->flush();
        $this->app['session']->getFlashBag()->add(
            'message_success',
            'Command Complete Successfully'
        );

        return $this->app->redirect($this->app['url_generator']->generate('listUploadAfter'));
    }


    public function reviewFirstDocAction()
    {
        $documentId = $this->app['engineer.repository']->findByFormId($this->app['request']->get('id'));
        $docFormState = unserialize($documentId->formState);
        return $this->app['twig']->render('Documentation/reviewFirstDocument.twig', ['formState' => $docFormState, 'fileDoc' => $documentId]);
    }

    public function reviewSecondDocAction()
    {
        $documentId = $this->app['engineerdua.repository']->findByFormId($this->app['request']->get('id'));
        $docFormState = unserialize($documentId->formState);
        return $this->app['twig']->render('Documentation/reviewSecondDocument.twig', ['formState' => $docFormState, 'fileDoc' => $documentId]);

    }

    public function selectSiteAfterLoginAction(Request $request)
    {
        $sites = $this->app['site.repository']->findAll();

        if ($request->getMethod() == 'POST') {
            $this->app['session']->set('site', ['value' => $request->get('site_id')]);

            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }

//        var_dump($sites);

        $siteName = [];
        $jsonSiteName = [];
        foreach ($sites as $key => $val) {
            $siteName[$val->id] = $val;
            $jsonSiteName[$val->id] = (array) $val;
        }

        $newSiteForm = new selectSiteAfterLoginForm();
        $newSiteForm->setSiteName($siteName);

        $formBuilder = $this->app['form.factory']->create(selectSiteAfterLoginForm::class, $newSiteForm, []);

        return $this->app['twig']->render('Engineer/siteSelect.twig', [
            'form' => $formBuilder->createView(),
            'siteName' => $siteName,
            'jsonSites' => $jsonSiteName,
        ]);
    }

    public function checkUserEngineer(Request $request)
    {
        if ($request->getPathInfo() === '/siteSelect' && $this->app['session']->has('uname')) {
            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }

        if (!($this->app['session']->get('role') == 3) && !($request->getPathInfo() === '/siteSelect')) {
            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }
    }

    public function checkUserRole(Request $request)
    {
        if ($request->getPathInfo() === '/login' && $this->app['session']->has('uname')) {
            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }

        if (!$this->app['session']->has('uname') && !($request->getPathInfo() === '/login')) {
            $this->app['session']->getFlashBag()->add(
                'message_error', 'Please Login First'
            );
            return $this->app->redirect($this->app['url_generator']->generate('loginAdmin'));
        }
    }

    public function homeAction()
    {
        return $this->app['twig']->render('home.twig');
    }

    public function createRawUserAction()
    {
        // $informasi = User::create('yanna', 'yanna', 'faster', 3);

        // $this->app['orm.em']->persist($informasi);
        // $this->app['orm.em']->flush($informasi);
        $formId = substr(strtoupper(($this->app['session']->get('uname')['value'])),0,3) . date("Ymdhis");

        // return $this->app->redirect($this->app['url_generator']->generate('home'));
        // 


        return $formId;
    }

    public function loginAdminAction(Request $request)
    {
        $loginForm = new LoginForm();

        $formBuilder = $this->app['form.factory']->create($loginForm, $loginForm);
//        var_dump($formBuilder);

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('login.twig', ['form' => $formBuilder->createView()]);
        }

        $formBuilder->handleRequest($request);

        if (!$formBuilder->isValid()) {
            return $this->app['twig']->render('login.twig', ['form' => $formBuilder->createView()]);
        }

        $user = $this->app['user.repository']->findByUsername($loginForm->getUsername());

        if ($user === null) {
            $this->app['session']->getFlashBag()->add(
                'message_error', 'Username Incorrect'
            );
            return $this->app['twig']->render('login.twig', ['form' => $formBuilder->createView()]);
        }

        if (!(new UserPasswordMatcher($loginForm->getPassword(), $user))->match()) {
            $this->app['session']->getFlashBag()->add(
                'message_error', 'Incorrect Username or Password given'
            );

            return $this->app['twig']->render('login.twig', ['form' => $formBuilder->createView()]);
        }
        $role = $request->get('role');

        if (!($user->getRole() == $role)) {
            $this->app['session']->getFlashBag()->add(
                'message_error', 'Role Salah'
            );
            return $this->app['twig']->render('login.twig', ['form' => $formBuilder->createView()]);
        }



        $this->app['session']->set('role', ['value' => $user->getRole()]);
        $this->app['session']->set('uname', ['value' => $user->getUsername()]);
        $this->app['session']->set('name', ['value' => $user->getName()]);
        $this->app['session']->set('uid', ['value' => $user->getId()]);
        $this->app['session']->set('created', ['value' => $user->getCreatedAt()]);

        if ($user->getRole() == 3) {
            return $this->app->redirect('/selectSiteAfterLogin');
        }

        return $this->app->redirect($this->app['url_generator']->generate('home'));
    }

    public function logoutAction()
    {
        $this->app['session']->clear();

        return $this->app->redirect($this->app['url_generator']->generate('loginAdmin'));
    }

    public function checkUserException()
    {
        $infoRules = $this->app['session']->get('role');

        if ($infoRules['value'] !== 0) {
            return $this->app->redirect($this->app['url_generator']->generate('errorPage'));
        }
    }

    public function checkRemarkException()
    {
        $infoRules = $this->app['session']->get('role');
        if($infoRules['value'] !== 1){
            return $this->app->redirect($this->app['url_generator']->generate('errorPage'));
        }
    }

    public function errorPageAction()
    {
        return $this->app['twig']->render('error404.twig');
    }

    public function newUserAction(Request $request)
    {
        $newUserForm = new UserForm();
        $formBuilder = $this->app['form.factory']->create($newUserForm, $newUserForm);

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('newUser.twig', ['form' => $formBuilder->createView()]);
        }

        $formBuilder->handleRequest($request);

        if (!$formBuilder->isValid()) {
            return $this->app['twig']->render('newUser.twig', ['form' => $formBuilder->createView()]);
        }

        $dataUser = User::create($newUserForm->getName(), $newUserForm->getUsername(), $newUserForm->getPassword(), $newUserForm->getRole());

        $this->app['orm.em']->persist($dataUser);
        $this->app['orm.em']->flush();

        $this->app['session']->getFlashBag()->add(
            'message_success', 'Account Created Successfully'
        );
        return $this->app->redirect($this->app['url_generator']->generate('listUser'));
    }

    public function updateUserAction(Request $request)
    {
        $userInfo = $this->app['user.repository']->findById($request->get('id'));

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('updateUser.twig', ['infoUser' => $userInfo]);
        }

        if ($request->getMethod() === 'POST') {
            $em = $this->app['orm.em'];

            $userSomething = $em->getRepository('Yanna\bts\Domain\Entity\User')->findById($request->get('id'));

            $userSomething->setId($request->get('id'));
            $userSomething->setName($request->get('full-name'));
            $userSomething->setRole($request->get('role'));
            $userSomething->setPassword($request->get('password'));
            $userSomething->setUpdatedAt(new \DateTime());

            $em->flush();

            return $this->app->redirect($this->app['url_generator']->generate('listUser'));
        }


    }

    public function showAllUser()
    {
        $user = $this->app['user.repository']->findAll();

        return $this->app['twig']->render('listUser.twig', ['userList' => $user]);
    }

    public function deleteUserAction()
    {
        $user = $this->app['user.repository']->findById($this->app['request']->get('id'));

        $this->app['orm.em']->remove($user);
        $this->app['orm.em']->flush();

        return $this->app->redirect($this->app['url_generator']->generate('listUser'));
    }

    public function deleteRemarkAction()
    {
        $remark = $this->app['remark.repository']->findById($this->app['request']->get('id'));

        $this->app['orm.em']->remove($remark);
        $this->app['orm.em']->flush();

     return $this->app->redirect($this->app['url_generator']->generate('listRemark'));
    }

    public function newRemarkAction(Request $request)
    {
        $newRemarkForm = new RemarkForm();

        $formBuilder = $this->app['form.factory']->create($newRemarkForm, $newRemarkForm);

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('newRemark.twig', ['form' => $formBuilder->createView()]);
        }

        $formBuilder->handleRequest($request);

        if (!$formBuilder->isValid()) {
            return $this->app['twig']->render('newRemark.twig', ['form' => $formBuilder->createView()]);
        }

        $dataRemark = Remark::create($newRemarkForm->getKomentar());

        $this->app['orm.em']->persist($dataRemark);
        $this->app['orm.em']->flush();

        $this->app['session']->getFlashBag()->add(
            'message_success', 'Remark Created Successfully'
        );
        return $this->app->redirect($this->app['url_generator']->generate('listRemark'));
    }

    public function showAllRemark(Request $request){
        $remark = $this->app['remark.repository']->findByFormId($request->get('formId'));

       return $this->app['twig']->render('listRemark.twig',['remarkList'=>$remark]);
    }


    public function newSiteAction(Request $request)
    {
        $newSiteForm = new siteForm();
        $formBuilder = $this->app['form.factory']->create($newSiteForm, $newSiteForm);

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('newSite.twig', ['form' => $formBuilder->createView()]);
        }

        $formBuilder->handleRequest($request);

        if (!$formBuilder->isValid()) {
            return $this->app['twig']->render('newSite.twig', ['form' => $formBuilder->createView()]);
        }

        $dataSite = Site::create($newSiteForm->getRegional(), $newSiteForm->getPoc(), $newSiteForm->getProdef(), $newSiteForm->getSiteId(), $newSiteForm->getSiteName(), $newSiteForm->getTowerId(), $newSiteForm->getAddress(), $newSiteForm->getFop(), $newSiteForm->getLongitude(), $newSiteForm->getLatitude(), $newSiteForm->getExistingSystem(), $newSiteForm->getRemark(), $newSiteForm->getStats());

        $this->app['orm.em']->persist($dataSite);
        $this->app['orm.em']->flush();

        $this->app['session']->getFlashBag()->add(
            'message_success', 'Site Created Successfully'
        );
        return $this->app->redirect($this->app['url_generator']->generate('listSite'));
    }

    public function deleteSiteAction()
    {
        $site = $this->app['site.repository']->findById($this->app['request']->get('id'));

        $this->app['orm.em']->remove($site);
        $this->app['orm.em']->flush();

        return $this->app->redirect($this->app['url_generator']->generate('listSite'));
    }

     public function updateSiteAction(Request $request)
    {
        $siteInfo = $this->app['site.repository']->findById($request->get('id'));

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('updateSite.twig', ['infoSite' => $siteInfo]);
        }

        if ($request->getMethod() === 'POST') {
            $em = $this->app['orm.em'];

            $siteSomething = $em->getRepository('Yanna\bts\Domain\Entity\Site')->findById($request->get('id'));

            $siteSomething->setId($request->get('id'));
            $siteSomething->setRegional($request->get('regional'));
            $siteSomething->setPoc($request->get('poc'));
            $siteSomething->setProdef($request->get('prodef'));
            $siteSomething->setSiteId($request->get('site_id'));
            $siteSomething->setSiteName($request->get('site_name'));
            $siteSomething->setTowerId($request->get('tower_id'));
            $siteSomething->setAddress($request->get('address'));
            $siteSomething->setFop($request->get('fop'));
            $siteSomething->setLongitude($request->get('longitude'));
            $siteSomething->setLatitude($request->get('latitude'));
            $siteSomething->setExistingSystem($request->get('existing_system'));
            $siteSomething->setRemark($request->get('remark'));
            $siteSomething->setStats($request->get('stats'));
            

            $em->flush();

            return $this->app->redirect($this->app['url_generator']->generate('listSite'));
        }


    }

    public function showAllSite()
    {
        $site = $this->app['site.repository']->findAll();
        $infoUser = $this->app['session']->get('role');

        return $this->app['twig']->render('listSite.twig', ['siteList' => $site, 'infoUser' => $infoUser]);
    }

    public function showJsonAction(Request $request)
    {

        $site = $this->app['site.repository']->findAll();

        if ($request->getMethod() === 'GET') {
            return $this->app->json($site);
        }

        if($request->getMethod() === 'POST'){
            return $this->app->json($site);
        }
//        return var_dump($site);
    }

     public function uploadImageIndoorBeforeAction(Request $request)
    {
        $fID = $this->app['session']->get('imageSelectSite')['value'];
        $siteInfo = $this->app['engineerdua.repository']->findBySiteStatus(0);
        if (($fID)==null){
            if ($request->getMethod() === 'POST') {
                $this->app['session']->set('imageSelectSite', ['value' => $request->get('site_name')]);


                return $this->app->redirect($this->app['url_generator']->generate('uploadImageIndoor'));

            }

            return $this->app['twig']->render('Engineer/uploadImageIndoorBefore.twig',
                [
                    'infoSite' => $siteInfo
                ]
            );
        }else{
            return $this->app->redirect($this->app['url_generator']->generate('uploadImageIndoor'));
        }

    }

    public function uploadImageOutdoorBeforeAction(Request $request)
    {
        $fID = $this->app['session']->get('imageSelectSite')['value'];
        $siteInfo = $this->app['engineerdua.repository']->findBySiteStatus(1);
        if(($fID)==null)
        {
            if($request->getMethod()==='POST')
            {
                $this->app['session']->set('imageSelectSite',['value'=>$request->get('site_name')]);

                return $this->app->redirect($this->app['url_generator']->generate('uploadImageOutdoor'));
            }

            return $this->app['twig']->render('Engineer/uploadImageOutdoorBefore.twig',['infoSite'=>$siteInfo]);
        }else{
            return $this->app->redirect($this->app['url_generator']->generate('uploadImageOutdoor'));
        }

    }

    public function uploadImageAction(Request $request)
    {
        $sess = $this->app['session'];
        $idForm = $sess->get('imageSelectSite')['value'];
        $imageForm = new inputImage();
        $formBuilder = $this->app['form.factory']->create($imageForm, $imageForm);

        $formBuilder->handleRequest($request);

        if ($request->getMethod() == 'POST') {


            $files = new ArrayCollection();
            $em = $this->app['orm.em'];

            $siteSomething = $em->getRepository('Yanna\bts\Domain\Entity\EngineerDua')->findByFormId($sess->get('imageSelectSite')['value']);

            $siteNama = $siteSomething->getSiteName();

            $doc = DocList::create($sess->get('imageSelectSite')['value'],$siteNama, $siteSomething->getSiteStatus(),$sess->get('uname')['value'],$files);

            $files->add(Document::create(
                'Site Location',
                $imageForm->getSiteLocation(),
                $idForm
            ));

            $files->add(Document::create(
                'GPS Coordinate I',
                $imageForm->getGpsCoordinateSatu(),
                $idForm
            ));

            $files->add(Document::create(
                'GPS Coordinate II',
                $imageForm->getGpsCoordinateDua(),
                $idForm
            ));

            $files->add(Document::create(
                'Shelter View I',
                $imageForm->getShelterViewSatu(),
                $idForm
            ));

            $files->add(Document::create(
                'Shelter View II',
                $imageForm->getShelterViewDua(),
                $idForm
            ));

            $files->add(Document::create(
                'Overview Inside I',
                $imageForm->getOverviewInsideSatu(),
                $idForm
            ));

            $files->add(Document::create(
                'Overview Inside II',
                $imageForm->getOverviewInsideDua(),
                $idForm
            ));

            $files->add(Document::create(
                'Fep Indoor',
                $imageForm->getFepIndoor(),
                $idForm
            ));

            $files->add(Document::create(
                'Fep Outdoor',
                $imageForm->getFepOutdoor(),
                $idForm
            ));

            $files->add(Document::create(
                'Feeder Indoor',
                $imageForm->getFeederIndoor(),
                $idForm
            ));

            $files->add(Document::create(
                'Feeder Bending',
                $imageForm->getFeederBending(),
                $idForm
            ));

            $files->add(Document::create(
                'Internal Grounding',
                $imageForm->getInternalGrounding(),
                $idForm
            ));

            $files->add(Document::create(
                'External Gb',
                $imageForm->getExternalGb(),
                $idForm
            ));

            $files->add(Document::create(
                'Alarm Box',
                $imageForm->getAlarmBox(),
                $idForm
            ));

            $files->add(Document::create(
                'ACPDB Internal I',
                $imageForm->getAcpdbInternalSatu(),
                $idForm
            ));

            $files->add(Document::create(
                'ACPDB Internal II',
                $imageForm->getAcpdbInternalDua(),
                $idForm
            ));

            $files->add(Document::create(
                'MCB at DCPDB',
                $imageForm->getMcbAtDcpdb(),
                $idForm
            ));

            $files->add(Document::create(
                'Recitifer Cabinet',
                $imageForm->getRectifierCabinet(),
                $idForm
            ));

            $files->add(Document::create(
                'MCB at Rectifier Cabinet',
                $imageForm->getMcbAtRectifierCabinet(),
                $idForm
            ));

            $files->add(Document::create(
                'Rack 19',
                $imageForm->getRack(),
                $idForm
            ));

            $dirName = $this->app['photo.path'] . '/' . $sess->get('imageSelectSite')['value'];

            mkdir($dirName, 0755);

            foreach ($files as $dok) {

                /**
                 * @var Document $dok
                 */
                $dok->getFile()->move($dirName, $dok->getFileName());
            }

            $this->app['orm.em']->persist($doc);
            $this->app['orm.em']->flush();

//            return var_dump($files);

            return $this->app->redirect($this->app['url_generator']->generate('home'));

        }
        return $this->app['twig']->render('Engineer/uploadImageTest.twig', ['form' => $formBuilder->createView()]);
    }

      public function uploadImageNextAction(Request $request)
    {
        $sess = $this->app['session'];
        $idForm = $sess->get('imageSelectSite')['value'];
        $imageForm = new inputImageOutdoor();
        $formBuilder = $this->app['form.factory']->create($imageForm, $imageForm);

        $formBuilder->handleRequest($request);



        if ($request->getMethod() == 'POST') {
            $em = $this->app['orm.em'];

            $siteSomething = $em->getRepository('Yanna\bts\Domain\Entity\EngineerDua')->findByFormId($sess->get('imageSelectSite')['value']);

            $siteNama = $siteSomething->getSiteName();

            $files = new ArrayCollection();
            $doc = DocList::create($sess->get('imageSelectSite')['value'],$siteNama, $siteSomething->getSiteStatus(),$sess->get('uname')['value'],$files);

            $files->add(Document::create(
                'Site Location',
                $imageForm->getSiteLocation(),
                $idForm
            ));

            $files->add(Document::create(
                'GPS Coordinate',
                $imageForm->getGpsCoordinate(),
                $idForm
            ));

            $files->add(Document::create(
                'Cabinet And Tower',
                $imageForm->getCabinetTower(),
                $idForm
            ));

            $files->add(Document::create(
                'BTS Cabinet I',
                $imageForm->getBtsCabinetOne(),
                $idForm
            ));

            $files->add(Document::create(
                'BTS Cabinet II',
                $imageForm->getBtsCabinetTwo(),
                $idForm
            ));

            $files->add(Document::create(
                'Overview Inside I',
                $imageForm->getOverviewInsideSatu(),
                $idForm
            ));

            $files->add(Document::create(
                'Overview Inside II',
                $imageForm->getOverviewInsideDua(),
                $idForm
            ));

            $files->add(Document::create(
                'Fep from Outside Cabinet',
                $imageForm->getFepOutside(),
                $idForm
            ));

            $files->add(Document::create(
                'Jumper Installation Outdoor Cabinet',
                $imageForm->getJumperInstallation(),
                $idForm
            ));

            $files->add(Document::create(
                'Feeder Bending',
                $imageForm->getFeederBending(),
                $idForm
            ));

            $files->add(Document::create(
                'EGB at Horizontal Tray',
                $imageForm->getEgbHorizontal(),
                $idForm
            ));

            $files->add(Document::create(
                'ACPDB Internal View',
                $imageForm->getAcpdbInternalSatu(),
                $idForm
            ));

            $files->add(Document::create(
                'MCB at ACPDB',
                $imageForm->getMcbAtAcpdb(),
                $idForm
            ));

            $files->add(Document::create(
                'Rectifier I',
                $imageForm->getRectifierOne(),
                $idForm
            ));

            $files->add(Document::create(
                'Rectifier II',
                $imageForm->getRectifierTwo(),
                $idForm
            ));

            $files->add(Document::create(
                'MCB at Rectifier Cabinet',
                $imageForm->getMcbAtRectifierCabinet(),
                $idForm
            ));


            $dirName = $this->app['photo.path'] . '/' . $sess->get('imageSelectSite')['value'];

            foreach ($files as $dok) {

                /**
                 * @var Document $dok
                 */
                $dok->getFile()->move($dirName, $dok->getFileName());
            }

            $this->app['orm.em']->persist($doc);
            $this->app['orm.em']->flush();

           

            return $this->app->redirect($this->app['url_generator']->generate('home'));

        }

        return $this->app['twig']->render('Engineer/uploadImageNext.twig', ['form' => $formBuilder->createView()]);
    }


//
    public function jsonJawabanAction(Request $request)
    {

        $jawaban = $this->app['jawaban.repository']->findAll();

        if ($request->getMethod() === 'GET') {
            return $this->app->json($jawaban);
        }
    }

    /**
     * Engineer Installation Form 2.1.1 (Indoor)
     * @return mixed
     */
    public function installationChecklistAction(Request $request)
    {
        $siteId = $this->app['session']->get('site')['value'];
        if ($this->app['session']->get('site')['value'] == null) {
            return $this->app->redirect($this->app['url_generator']->generate('selectSiteAfterLogin'));
        } else {
            $siteInformation = $this->app['site.repository']->findById($siteId);
            $form = [];
            return $this->app['twig']->render('Engineer/installationChecklistForm.twig', [
                'form' => $form,
                'siteInfo' => $siteInformation
            ]);
        }

    }

    public function externalChecklistAction(Request $request)
    {
        $siteId = $this->app['session']->get('site')['value'];
        if($this->app['session']->get('site')['value'] == null){
            return $this->app->redirect($this->app['url_generator']->generate('selectSiteAfterLogin'));
        }else{
            if ($this->app['session']->get('tempFormId')['value'] == null) {
                return $this->app->redirect($this->app['url_generator']->generate('installationChecklist'));
            } else {
                $siteInformation = $this->app['site.repository']->findById($siteId);
                $form=[];
                return $this->app['twig']->render('Engineer/environmentMonitoringForm.twig',[
                    'form' => $form,
                    'siteInfo'=>$siteInformation
                ]);
            }
        }
    }



    /**
     * Engineer Installation Form 2.1.2 (Outdoor)
     * @return mixed
     */
    public function outdoorInstallationAction()
    {
        return $this->app['twig']->render('Engineer/outdoorInstallationForm.twig');
    }

    /**
     * Engineer Environment Monitoring Form 2.2.1
     * @return mixed
     */
    public function environmentMonitoringAction(Request $request)
    {
        $engineerFlush = new EngineerDua();
//        $formId = substr(strtoupper(($this->app['session']->get('uname')['value'])),0,3) . date("Ymdhis") . 'EN';
        $uname = $this->app['session']->get('uname')['value'];
        $formState = $request->get('c');
        $siteName = $this->app['site.repository']->findById($this->app['session']->get('site')['value']);

        $engineerFlush->setSiteName($siteName->siteName);
        $engineerFlush->setSiteStatus($siteName->stats);
        $engineerFlush->setFormState(serialize($formState));
        $engineerFlush->setFormId($this->app['session']->get('tempFormId')['value']);
        $engineerFlush->setUsername($uname);
        $engineerFlush->setValidateState(0);
        $engineerFlush->setCreatedAt(new \DateTime());


        $this->app['orm.em']->persist($engineerFlush);
        $this->app['orm.em']->flush();

        return $this->app->redirect($this->app['url_generator']->generate('home'));
        // return json_encode($formState);
    }

    public function printReportIndoorBeforeAction()
    {

        $siteInfo = $this->app['documentation.repository']->findBySiteStatus(0);

        if ($this->app['request']->getMethod() === 'POST') {
            $this->app['session']->set('siteSelect', ['value' => $this->app['request']->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('printReportAllAfter'));
        }

        return $this->app['twig']->render('printReportIndoorBefore.twig', ['infoSite' => $siteInfo]);
    }

    public function printReportOutdoorBeforeAction()
    {
        $siteInfo = $this->app['documentation.repository']->findBySiteStatus(1);

        if ($this->app['request']->getMethod() === 'POST') {
            $this->app['session']->set('siteSelect', ['value' => $this->app['request']->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('printReportAllOutdoorAfter'));
        }

        return $this->app['twig']->render('printReportOutdoorBefore.twig', ['infoSite' => $siteInfo]);
    }

//  


    public function reviewPrintIndoorAction(Request $request)
    {
        if ($this->app['session']->get('siteVendorSelect')['value'] == null) {
            return $this->app->redirect($this->app['url_generator']->generate('listFormDocIndoorAfter'));
        }

        $engineerInfo = $this->app['engineer.repository']->findByFormId($request->get('formId'));

        $engineerDuaInfo = $this->app['engineerdua.repository']->findByFormId($request->get('formId'));

        $docInfo = $this->app['documentation.repository']->findByFormId($request->get('formId'));

        $siteInfo = $this->app['site.repository']->findBySiteName($engineerInfo->getSiteName());

        $uploadInfo = $this->app['document.repository']->findByFormId($request->get('formId'));

        return $this->app['twig']->render('printReport.twig',
            [
                'formState' => unserialize($engineerInfo->getFormState()),
                'infoEngineerDua' => unserialize($engineerDuaInfo->getFormState()),
                'revDoc' => unserialize($docInfo->getFormState()),
                'infoSite' => $siteInfo,
                'info' => $uploadInfo
            ]
        );

    }

    public function reviewPrintOutdoorAction(Request $request)
    {


        $engineerInfo = $this->app['engineer.repository']->findByFormId($request->get('formId'));

        $engineerDuaInfo = $this->app['engineerdua.repository']->findByFormId($request->get('formId'));

        $docInfo = $this->app['documentation.repository']->findByFormId($request->get('formId'));

        $uploadInfo = $this->app['document.repository']->findByFormId($request->get('formId'));

        $siteInfo = $this->app['site.repository']->findBySiteName($engineerInfo->getSiteName());

        return $this->app['twig']->render('printReportOutdoor.twig',
            [
                'formState' => unserialize($engineerInfo->getFormState()),
                'infoEngineerDua' => unserialize($engineerDuaInfo->getFormState()),
                'revDoc' => unserialize($docInfo->getFormState()),
                'infoSite' => $siteInfo,
                'info' => $uploadInfo
            ]
        );

    }

  public function reviewUploadIndoorAction(Request $request)
    {
        if($this->app['session']->get('siteSelect')['value']==null)
        {
            return $this->app->redirect($this->app['url_generator']->generate('listFormDocumentation'));
        }

        $uploadInfo = $this->app['document.repository']->findByFormId($request->get('formId'));

        return $this->app['twig']->render('Documentation/reviewUploadImage.twig',['info'=>$uploadInfo]);
    }

    public function reviewUploadOutdoorAction(Request $request)
    {
        if($this->app['session']->get('uploadSelect')['value']==null)
        {
            return $this->app->redirect($this->app['url_generator']->generate('listUploadAfter'));
        }

        $uploadInfo = $this->app['document.repository']->findByFormId($request->get('formId'));

       return $this->app['twig']->render('Documentation/reviewUploadOutdoorImage.twig',['info'=>$uploadInfo]);
    }


 

    public function printReportIndoorAction()
    {
        if ($this->app['session']->get('siteSelect')['value'] == null) {
            return $this->app->redirect($this->app['url_generator']->generate('printReportAllBefore'));
        }

        $engineerInfo = $this->app['engineer.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $engineerDuaInfo = $this->app['engineerdua.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $docInfo = $this->app['documentation.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $uploadInfo = $this->app['document.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $siteInfo = $this->app['site.repository']->findBySiteName($engineerInfo->getSiteName());

        return $this->app['twig']->render('printReport.twig',
            [
                'formState' => unserialize($engineerInfo->getFormState()),
                'infoEngineerDua' => unserialize($engineerDuaInfo->getFormState()),
                'revDoc' => unserialize($docInfo->getFormState()),
                'infoSite' => $siteInfo,
                'info' => $uploadInfo
            ]
        );
    }

    public function printReportOutdoorAction()
    {
        if ($this->app['session']->get('siteSelect')['value'] == null) {
            return $this->app->redirect($this->app['url_generator']->generate('printReportAllBefore'));
        }

        $engineerInfo = $this->app['engineer.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $engineerDuaInfo = $this->app['engineerdua.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $docInfo = $this->app['documentation.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $uploadInfo = $this->app['document.repository']->findByFormId($this->app['session']->get('siteSelect')['value']);

        $siteInfo = $this->app['site.repository']->findBySiteName($engineerInfo->getSiteName());

        return $this->app['twig']->render('printReportOutdoor.twig',
            [
                'formState' => unserialize($engineerInfo->getFormState()),
                'infoEngineerDua' => unserialize($engineerDuaInfo->getFormState()),
                'revDoc' => unserialize($docInfo->getFormState()),
                'infoSite' => $siteInfo,
                'info' => $uploadInfo
            ]
        );
    }

    public function installationProccessAction(Request $request)
    {
        $engineerFlush = new Engineer();
        $formId = substr(strtoupper(($this->app['session']->get('uname')['value'])),0,3) . date("Ymdhis") . 'EN';
        $uname = $this->app['session']->get('uname')['value'];
        $formState = $request->get('c');
//        $statusSite =
        $siteName = $this->app['site.repository']->findById($this->app['session']->get('site')['value']);

        $this->app['session']->set('tempFormId', ['value' => $formId]);
        $engineerFlush->setSiteName($siteName->siteName);
        $engineerFlush->setSiteStatus($siteName->stats);
        $engineerFlush->setFormId($formId);
        $engineerFlush->setFormState(serialize($formState));
        $engineerFlush->setUsername($uname);
        $engineerFlush->setValidateState(0);
        $engineerFlush->setCreatedAt(new \DateTime());
        $this->app['orm.em']->persist($engineerFlush);
        $this->app['orm.em']->flush();

        return $this->app->redirect($this->app['url_generator']->generate('home'));
    }


    public function listFormDocumentationBeforeAction(Request $request)
    {
        $siteInfo = $this->app['engineerdua.repository']->findBySiteStatus(0);

        if ($request->getMethod() === 'POST') {
            $this->app['session']->set('siteSelect', ['value' => $request->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('listFormDocumentation'));
        }

        return $this->app['twig']->render('Documentation/listFormBefore.twig', ['infoSite' => $siteInfo]);
    }

    public function listUploadBeforeAction(Request $request)
    {
        $siteInfo = $this->app['engineerdua.repository']->findBySiteStatus(1);

        if($request->getMethod()==='POST')
        {
            $this->app['session']->set('uploadSelect',['value'=>$request->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('listUploadAfter'));
        }

        return $this->app['twig']->render('Documentation/listUploadBefore.twig',['infoSite'=>$siteInfo]);
    }

    public function siteDocumentationBeforeAction()
    {
          $siteList = $this->app['doclist.repository']->findBySiteStatus(0);
        if ($this->app['request']->getMethod() === 'POST') {
            $this->app['session']->set('siteDocumentationSelect', ['value' => $this->app['request']->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('siteDocumentationSubmit'));
        }


        return $this->app['twig']->render('Documentation/siteSelect.twig', ['infoSite' => $siteList]);
    }

     public function siteDocumentationOutdoorBeforeAction()
    {
        $siteList = $this->app['doclist.repository']->findBySiteStatus(1);
        if($this->app['request']->getMethod()=== 'POST')
        {
            $this->app['session']->set('siteDocumentationSelect',['value'=>$this->app['request']->get('site_name')]);

            return $this->app->redirect($this->app['url_generator']->generate('siteDocumentationOutdoorSubmit'));
        }

        return $this->app['twig']->render('Documentation/siteSelect.twig',['infoSite'=>$siteList]);
    }

    public function listFormDocumentationAction()
    {
        $infoListEngineer = $this->app['engineer.repository']->findBySiteName($this->app['session']->get('siteSelect')['value']);

        return $this->app['twig']->render('Documentation/listForm.twig', ['listInfo' => $infoListEngineer]);
        // return var_dump($infoListEngineer);
    }

    public function listUploadAction()
    {
        $infoListEngineer = $this->app['engineer.repository']->findBySiteName($this->app['session']->get('uploadSelect')['value']);

        return $this->app['twig']->render('Documentation/listFormUpload.twig',['listInfo'=>$infoListEngineer]);
    }


    public function siteDocumentationAction(Request $request)
    {
        $siteInfo = $this->app['engineer.repository']->findByFormId($this->app['session']->get('siteDocumentationSelect')['value']);

        return $this->app['twig']->render('Documentation/siteDocumentation.twig', ['infoSite' => $siteInfo]);
    }

    public function siteDocumentationSubmitAction(Request $request)
    {
         $siteInfo = $this->app['engineer.repository']->findByFormId($this->app['session']->get('siteDocumentationSelect')['value']);
        if($this->app['session']->get('siteDocumentationSelect')['value']==null)
        {
            return $this->app->redirect($this->app['url_generator']->generate('siteDocumentationBefore'));
        }

        if($request->getMethod()=='GET')
        {
            return $this->app['twig']->render('Documentation/siteDocumentation.twig',['infoSite'=>$siteInfo]);
        }

        if($request->getMethod()=='POST')
        {
            $docFlush = new Documentation();
            $formState = $request->get('c');

            $docFlush->setSiteName($this->app['engineerdua.repository']->findByFormId($this->app['session']->get('siteDocumentationSelect')['value'])->getSiteName());
            $docFlush->setFormState(serialize($formState));
            $docFlush->setSiteStatus($this->app['engineerdua.repository']->findByFormId($this->app['session']->get('siteDocumentationSelect')['value'])->getSiteStatus());
            $docFlush->setFormId($this->app['session']->get('siteDocumentationSelect')['value']);
            $docFlush->setUsername($this->app['session']->get('uname')['value']);
            $docFlush->setCreatedAt(new \DateTime());
            $docFlush->setUpdatedAt(new \DateTime());

            $this->app['orm.em']->persist($docFlush);
            $this->app['orm.em']->flush();
            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }

    }

    public function siteDocumentationOutdoorSubmitAction(Request $request)
    {
        $siteInfo = $this->app['engineer.repository']->findByFormId($this->app['session']->get('siteDocumentationSelect')['value']);
        if($this->app['session']->get('siteDocumentationSelect')['value']==null)
        {
            return $this->app->redirect($this->app['url_generator']->generate('siteDocumentationOutdoorBefore'));
        }

        if($request->getMethod()=='GET')
        {
            return $this->app['twig']->render('Documentation/siteDocumentationOutdoor.twig',['infoSite'=>$siteInfo]);
        }

        if($request->getMethod()=='POST')
        {
            $docFlush = new Documentation();
            $formState = $request->get('c');

            $docFlush->setSiteName($this->app['engineerdua.repository']->findByFormId($this->app['session']->get('siteDocumentationSelect')['value'])->getSiteName());
            $docFlush->setFormState(serialize($formState));
            $docFlush->setSiteStatus($this->app['engineerdua.repository']->findByFormId($this->app['session']->get('siteDocumentationSelect')['value'])->getSiteStatus());
            $docFlush->setFormId($this->app['session']->get('siteDocumentationSelect')['value']);
            $docFlush->setUsername($this->app['session']->get('uname')['value']);
            $docFlush->setCreatedAt(new \DateTime());
            $docFlush->setUpdatedAt(new \DateTime());

            $this->app['orm.em']->persist($docFlush);
            $this->app['orm.em']->flush();
            return $this->app->redirect($this->app['url_generator']->generate('home'));
        }

    }


    public function gmapAction(Request $request)
    {
        $gmapForm = new gmapForm();

        $formBuilder = $this->app['form.factory']->create($gmapForm, $gmapForm);

        if ($request->getMethod() === 'GET') {
            return $this->app['twig']->render('gmap.twig', ['form' => $formBuilder->createView()]);
        }

        $formBuilder->handleRequest($request);

        if (!$formBuilder->isValid()) {
            return $this->app['twig']->render('gmap.twig', ['form' => $formBuilder->createView()]);
        }

        $dataGmap = Site::create($gmapForm->getLatitude(), $gmapForm->getLongitude());

        $this->app['orm.em']->persist($dataGmap);
        $this->app['orm.em']->flush();

        $this->app['session']->getFlashBag()->add(
            'message_success', 'input benar'
        );
        return $this->app->redirect($this->app['url_generator']->generate('formInstallation'));
    }

}