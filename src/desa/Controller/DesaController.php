<?php
// module/desa/src/desa/Controller/DesaController.php:
namespace desa\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DesaController extends AbstractActionController {
    public function indexAction() {
       if(!empty($_SESSION['username'])){
           echo "Hoşgeldiniz ".$_SESSION['username']."<br>";
           echo "Yapabileceğiniz İşlemler;<br>";
           ?>
           <a href="../Form/addAutoForm.php">Araç Ekle</a>
           <a href="../Form/findAutoForm.php">Araç Ara</a>
           <?php
       }else{
           header("Location:../Form/registerForm.php");
       }
    }

    public function addAction(){
        
    }
}
?>