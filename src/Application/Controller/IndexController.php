<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Http\Client as HttpClient;
use Zend\Json\Json as Json;
use Zend\Http\Request as Request;
use Zend\Http\Headers;
class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }
     public function addAction() {

     	if($this->getRequest()->isPost()){
     		$jsonData=Json::encode(array(
			'plate'=>$this->params()->fromPost('plate'),
			'departurePoint'=>$this->params()->fromPost('departurePoint'),
			'destinationPoint'=>$this->params()->fromPost('destinationPoint'),
			'carry'=>$this->params()->fromPost('carry')
        	),true);
     	$request = new Request();
    	$request->setHeaders()->addHeaderLine('Content-Type: application/json');
    	$request->setUri('http://localhost:8080/auto/add');
    	$request->setMethod('POST');
    	$request->getPost()->set('data', $jsonData);
        $client = new HttpClient();
        $client->setAdapter('Zend\Http\Client\Adapter\Curl');
        $client->setRequest($request);
       	$response = $client->dispatch($request);
       if ($response->isSuccess()) {
    echo "başarılı";

}
  
    	}
    }
}
