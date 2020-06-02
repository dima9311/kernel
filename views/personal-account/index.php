<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Collapse;  //  Collapse (hide/show)

 use app\assets\UserMainPageOnlyAppAsset;   // use your custom asset
 UserMainPageOnlyAppAsset::register($this); 


$this->title = 'Мій кабінет';
$this->params['breadcrumbs'][] = $this->title;



$urlZ = Yii::$app->request->baseUrl;// . "/admin/admin-x/count-register-requests"; //  Yii::$app->request->baseUrl; // . "/bot/ajax-reply"; 
use yii\helpers\Json; 
		 $this->registerJs(
            "var url = '" . $urlZ . "';",  
             yii\web\View::POS_HEAD, 
            'user1-events-script'
     );
?>



<div id="all" class="site-about animate-bottom personal-account">
    <h1><?= Html::encode($this->title) ?></h1>
	
	<! -- Delete in production -->
	<!--!--<p class="text-danger small">Pretty URL + fix url for ajax in admin (display number of reg requestd)</p>-->
    <! -- Delete in production -->
	
    <p><i class="fa fa-drivers-license-o" style="font-size:14px"></i> Welcome, <?=Yii::$app->user->identity->username;?> </p>
	<hr>
	
	<p> На Вашому балансі : 
	
	    <?php
		   //display user's balance  
	       echo \app\componentsX\views\user\PersonalAccount::showUserBalance($balance);
		?>
	</p>

    <?php
	//Collapse widget with user's info    
	echo \app\componentsX\views\user\PersonalAccount::showCollapsedUserInfo();
    ?>
  
  
   <!-- Personal account menu items -->
   <div class="row"> 
       <center>
	   
	       <div class="col-sm-2 col-xs-6  mobile-padding">
                <?php		
                $image = '<i class="fa fa-truck fa-5x"></i>';	
                echo "<div class='subfolder border shadowX'>" .
			        Html::a( $image ."<p>Вiдвантажити</p><br>", ["/invoice-load-out/load-out" ] , $options = ["title" => "Load out",]) . 
		            "</div>"; 
				?>
           </div>
	   
	       <div class="col-sm-2 col-xs-6 mobile-padding">
                <?php		
                $image = '<i class="fa fa-balance-scale fa-5x"></i>';	
                echo "<div class='subfolder border shadowX lavender'>" .
			        Html::a( $image ."<p>Переоформити</p><br>" , ["/transfer-rights/transfer-right" ], $options = ["title" => "transfer rights",]) . 
		            "</div>";
                 ?>
            </div>
			
			<div class="col-sm-2 col-xs-6  mobile-padding badge1 bb" data-badge="">
                <?php		
                $image = '<i class="fa fa-envelope-o fa-5x"></i>';	
                echo "<div class='subfolder border shadowX'>" .
			        Html::a( $image ."<p>Повiдомлення</p><br>" , ["/messages/show-messages" ], $options = ["title" => "messages",]) . 
		            "</div>";
                 ?>
            </div>
	   
	        
			 <div class="col-sm-2 col-xs-6 mobile-padding">
                <?php		
                $image = '<i class="fa fa-area-chart fa-5x"></i>';	
                echo "<div class='subfolder border shadowX'>" .
			        Html::a( $image ."<p>Історія</p><br>" , ["/transactions/mytransations"], $options = ["title" => "History",]) . 
		            "</div>";
                 ?>
            </div>
			
			<div class="col-sm-2 col-xs-6 mobile-padding">
                <?php		
                $image = '<i class="fa fa-comments-o fa-5x"></i>';	
                echo "<div class='subfolder border shadowX'>" .
			        Html::a( $image ."<p>Довідка</p><br>" , ["#"] , $options = ["title" => "more  info",]) . 
		            "</div>";
                 ?>
            </div>
			
   </div><!-- class='row' -->
   <!-- End Personal account menu items -->
   
   
</div> <!-- class='personal-account' -->
