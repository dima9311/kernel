
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\Collapse;  //  Collapse (hide/show)

 use app\assets\admin\AdminFrontPageAsset;   // use your custom asset
 AdminFrontPageAsset::register($this); 

$this->title = 'Admin Panel';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$urlZ = Yii::$app->request->baseUrl; // . "/admin/admin-x/count-register-requests"; //  Yii::$app->request->baseUrl; // . "/bot/ajax-reply"; 
use yii\helpers\Json; 
		 $this->registerJs(
            "var url = '" . $urlZ . "';",  
             yii\web\View::POS_HEAD, 
            'admin-events-script'
     );
?>

<div id="all" class="admin-default-index animate-bottom">
    <h1><?= Html::encode($this->title) ?></h1>
	<p><i class="fa fa-drivers-license-o" style="font-size:14px"></i> Hello, <?=Yii::$app->user->identity->username;?> </p>
	<?php 
	    if(Yii::$app->user->can('adminX')){ echo "<b>You have admin rights.</b>";}
	 ?>
	
	
   
  
   
   
   <!------ FLASH Message to show if the account not yet activated by the admin ----->
   <?php if( Yii::$app->session->hasFlash('failX') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('failX'); ?>
    </div>
    <?php endif;?>
   <!------ END FLASH  ----->
   

	
	<!-- Image -->
	<center>
	<div class="row">
	   <div class="col-sm-2 col-xs-6">
                <?php		
                $image = '<i class="fa fa-address-card-o" style="font-size:26px"></i>';	
                echo "<div class='subfolder border shadowX'>" .
			        Html::a( $image ."<p>Admin access</p><br>" , ["#"] , $options = ["title" => "more  info",]) . 
		            "</div><br>"; 
				?>
       </div>
	 </div>
	 </center>
	 <!-- Image -->
		   

    
	<!-- Displays all Elevators' balance of all users -->
	<?php echo \app\componentsX\views\admin\AdminPersonalAccount::showAllElevetorStatistics($userCount, $products, $balance); ?>
	
	
	
	 <br>

  <!-- Collapse widget with user info -->
  <?php echo \app\componentsX\views\admin\AdminPersonalAccount::showCollapsedUserInfo();?>


  
  
   <!-- Admin account menu items -->
   <div class="row"> 
       <center>
	   
	       <div class="col-sm-2 col-xs-6 mobile-padding badge1 bb " data-badge=""> <!-- badge -->
                <?php		
                $image = '<i class="fa fa-address-card-o fa-5x"></i>';	
                echo "<div class='subfolder border shadowX'>" .
			        Html::a( $image ."<p>Запит на реєстрацію</p><br>" , ["/admin/admin-x/users-registration-requests"   ], $options = ["title" => "Sign up requests",]) . 
		            "</div>"; 
				?>
           </div>
	   
	         <div class="col-sm-2 col-xs-6 mobile-padding badge1 bb" data-badge="">
                <?php		
                $image = '<i class="fa fa-truck fa-5x"></i>';	   
                echo "<div class='subfolder border shadowX lavender'>" .
			        Html::a( $image ."<p>Запит вiдвантаження</p><br>" , ["/admin/invoice-load-out/index" ] , $options = ["title" => "Freight requests",]) . 
		            "</div>";
                 ?>
            </div>
	   
	     
			
			 <div class="col-sm-2 col-xs-6 mobile-padding">
                <?php		
                $image = '<i class="fa fa-automobile fa-5x"></i>';	
                echo "<div class='subfolder border shadowX'>" .
			        Html::a( $image ."<p> Користувачі (iнфо)  </p><br>" , ["/admin/view-all-users/index"] , $options = ["title" => "View all users",]) . 
		            "</div>";
                 ?>
            </div>
			
			<div class="col-sm-2 col-xs-6 mobile-padding">
                <?php		
                $image = '<i class="fa fa-book fa-5x"></i>';	
                echo "<div class='subfolder border shadowX'>" .
			        Html::a( $image ."<p>Нова накладна</p><br>" , ["/admin/invoice-load-in/create",] , $options = ["title" => "New invoice",]) . 
		            "</div>";
                 ?>
            </div>
			
			<div class="col-sm-2 col-xs-6 mobile-padding">
                <?php		
                $image = '<i class="fa fa-gg fa-5x"></i>';	
                echo "<div class='subfolder border shadowX'>" .
			        Html::a( $image ."<p>Новий товар</p><br>" , ["",] , $options = ["title" => "Add new product",]) . 
		            "</div>";
                 ?>
            </div>
			
			
   </div><!-- class='row' -->
   <!-- End Personal account menu items -->
   
   
   
   
    

</div>
