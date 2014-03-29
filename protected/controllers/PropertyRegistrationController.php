<?php

class PropertyRegistrationController extends Controller
{
  
	public function actionIndex()
	{ 
            $property_id=51;
            $model=new General;
            $model_subtype= new SubtypeProperty;
            $model_place= new Place;
            //$subtype_listId=array();
            $subtype_listName=array();
            //$placeId=array();
            $placeName=array();
            
           $res_st=$model_subtype->findAll(array('select'=>'subtype,subtype_id','condition'=>'type_id=1'));
            $res_pl=$model_place->findAll();
           //CVarDumper::dump($loc,10,true);
          // print_r($loc);
           foreach($res_st as $aPost){
           //$subtype_listId[]= $aPost->attributes['subtype_id'];
           $subtype_listName["$aPost->subtype_id"]= $aPost->subtype;
           }
           
           foreach($res_pl as $aPost){
           $placeName["$aPost->place_id"]= $aPost->place;
           //$placeName[]= $aPost->attributes['place'];
           }
           
     
           if(isset($_POST['General'])){
               //$model->attributes=$_POST['General'];
               
               if($_POST['General']['email_notify']==1 && $_POST['General']['email_notify']==1){
                   $notify=1;
               }
               else if($_POST['General']['email_notify']==1)
                   $notify=2;
               else if($_POST['General']['mob_notify']==1)
                   $notify=3;
               else 
                   $notify=0;
                   
                
         
               $model=new General;
                $model->attributes = array(
                    
                     'property_id' => $property_id ,
                     'total_rooms' => $_POST['General']['total_rooms'],
                     'description'=> $_POST['General']['property_description'],
                    'address'=> $_POST['General']['property_address'],
                    'landphone'=> $_POST['General']['landphone1'],
                    'landphone2'=> $_POST['General']['landphone2'],
                    'mobilenumber'=> $_POST['General']['mobile1'],
                    'mobilenumber2' => $_POST['General']['mobile2'],
                    'owner_email' => $_POST['General']['owner_email'],
                    'owner_notify' => $notify,
                    'owner_number' => $_POST['General']['owner_no'],
                    'email' => $_POST['General']['email'],
                    'place_id' => $_POST['General']['place'],
                    'type_id' => 4,
                    'subtype_id' => $_POST['General']['subtype'],
                    
                    
                    
                    
                    
                    ); 
                //$model->validate();
                //var_dump($model->getErrors());
                $model ->save();
              //  Yii::log("errors saving SomeModel: " . var_export($model->getErrors(), true), CLogger::LEVEL_WARNING, __METHOD__);
               
              /*  $model->cover_image=CUploadedFile::getInstance($model,'cover_image');
               $subpath=date("H-i-s", time()).$model->cover_image;
               
               //echo $model->cover_image=CUploadedFile::tempName($model,'cover_image');
                $model->cover_image->saveAs(Yii::app()->basePath."/\/upload/\/".$subpath);
                //echo Yii::app()->basePath.'/upload'.$model->cover_image;
               // echo $_FILES['General']['cover_image']['name'];*/
             
               
           }   
           
            
		$this->render('index',array('model'=>$model,'listname'=>$subtype_listName,'placeName'=>$placeName));
	       
                
           }
           
           //other details
           
           public function actionFacilities(){
               $property_id=50;
               $model=new Otherfacilities;
               
               if(isset($_POST['Otherfacilities'])){
                   $temp=array();
                $temp= $model->attributes=$_POST['Otherfacilities'];
                  $i=0;
                foreach($temp['other_facilities'] as $temp1){
                      $model=new Otherfacilities;
                      $var = $temp['other_facilities'][$i];
                      $model->attributes = array(
                    
                     'other_facilities' => $var ,
                       'property_id'=> $property_id
                    ); 
                      
                  $model->save();
                   
                   
                 }
               }
               else
               $this->render('facilities',array('model'=>$model));
           }
           
           //gallerypic 
           public function actionPropertyGallery(){
               $property_id=50;
                $model=new Gallerypic;
                // print_r($model->attributes=$_POST['Gallerypic']);
                if(isset($_FILES['Gallerypic'])){
                   $model->attributes=$_FILES['Gallerypic'];
                   
                   $temp=$model->attributes["name"]["gallery_image"];
                  
                   $i=0;
                   foreach( $temp as $value){
                       $model=new Gallerypic;
                       $t="gallery_image[$i]";
                       
                      $model->gallery_image[$i]=CUploadedFile::getInstance($model,$t);
                      $subpath=date("H-i-s", time()).$model->gallery_image[$i];
                   //$model->gallery_image[$i]->saveAs(Yii::app()->basePath."/\/upload/\/".$subpath);
                    $model->attributes = array(
                          
                    'image_id' => '',
                     'name' => $subpath ,
                       'property_id'=> $property_id
                    ); 
                      
                   if($model->save()){
                     //  $model=new Gallerypic;
                      $model->gallery_image[$i]->saveAs(Yii::app()->basePath."/\/upload/\/".$subpath);
                   }
                   $i++;
                   }
                
                }
                $this->render('propertyGallery',array('model'=>$model));
            }
            
            //edit general
            public function actionEditgeneral(){
                $property_id=51;
                $model= new General;
                $model_subtype= new SubtypeProperty;
                $model_place= new Place;
                $subtype_listName=array();
                $placeName=array();
                
                $arr=$model->findByPk(51);
               // print_r($model);
                $arr_temp=array();
                $arr_temp=$arr->attributes;
                $id_type=$arr_temp['type_id'];
                
                //$place_id=$arr_temp['place_id']
                $res_st=$model_subtype->findAll(array('select'=>'subtype,subtype_id','condition'=>'type_id='.$id_type.''));
               // $this->render('editgeneral',array('model'=>$arr1));
                foreach($res_st as $aPost){
                 //$subtype_listId[]= $aPost->attributes['subtype_id'];
                  $subtype_listName["$aPost->subtype_id"]= $aPost->subtype;
                }
                $res_pl=$model_place->findAll();
                foreach($res_pl as $aPost){
                $placeName["$aPost->place_id"]= $aPost->place;
           //$placeName[]= $aPost->attributes['place'];
           }
          if(isset($_POST['General'])){
                if($_POST['General']['email_notify']==1 && $_POST['General']['email_notify']==1){
                   $notify=1;
               }
               else if($_POST['General']['email_notify']==1)
                   $notify=2;
               else if($_POST['General']['mob_notify']==1)
                   $notify=3;
               else 
                   $notify=0;
               $model= new General;
               $model -> updateAll(array(
                    
                     
                     'total_rooms' => $_POST['General']['total_rooms'],
                     'description'=> $_POST['General']['property_description'],
                    'address'=> $_POST['General']['property_address'],
                    'landphone'=> $_POST['General']['landphone1'],
                    'landphone2'=> $_POST['General']['landphone2'],
                    'mobilenumber'=> $_POST['General']['mobile1'],
                    'mobilenumber2' => $_POST['General']['mobile2'],
                    'owner_email' => $_POST['General']['owner_email'],
                    'owner_notify' => 8,
                    'owner_number' => $_POST['General']['owner_no'],
                    'email' => $_POST['General']['email'],
                    'place_id' => $_POST['General']['place'],
                    'type_id' => 4,
                    'subtype_id' => $_POST['General']['subtype'],
                
                    ),'property_id = '.$property_id.'');
           }
           
           $this->render('editgeneral',array('model'=>$model,'values' => $arr_temp,'listname'=>$subtype_listName,'placeName'=>$placeName));
               
            }
       

         public function actionEditOtherfacilities(){
             
               $property_id=51;
               $model=new Otherfacilities;
               $res_fac_temp=array();
               $res_fac=$model->findAll(array('select'=>'facility_id,other_facilities','condition'=>'property_id='.$property_id.''));
               
               if(isset($_POST['Otherfacilities'])){
                  // foreach($res_fac as $aPost){
                     //  echo $aPost -> facility_id;
                       
                  // }
                  // print_r($_POST['Otherfacilities']);
                   $i=0;
                   foreach($res_fac as $fid){
                   
                          // $model=new Otherfacilities;
                           $model -> updateAll(array(
                               
                           'other_facilities' => $_POST['Otherfacilities']['other_facilities'][$i]),
                                   'facility_id = '.$fid -> facility_id.'');
                           $i++;
                     
               }
               }
               $this->render('editOtherFacilities',array('model' => $model,'values' => $res_fac));
               //print_r($res_fac_temp);
         }
         
         //delte images
         public function actionDeleteImages(){
              $model=new Gallerypic;
              if(isset($_POST['Gallerypic'])){
                 // print_r($_POST['Gallerypic']);
                  //echo $_POST['Gallerypic']['check_image'][1];
               //   if(($_POST['Gallerypic']['check_image'] != 0)){
                    // echo "y";
                print_r($_POST);
                $i=0;
                     foreach($_POST['Gallerypic']['check_image'] as $temp){
                         
                         if($temp[$i] !=  0){
                      $model->deleteByPk($temp[$i]);
                         }
                     //    echo "h";
                      
                         
                  }
                  }
                 // $model->deleteByPk($providedIDs);
              //}
              $property_id=51;
              $res_images=$model->findAll(array('select'=>'image_id,name','condition'=>'property_id='.$property_id.''));
              $this->render('deleteImages',array('model' => $model,'values' => $res_images));
             
         }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
 
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}