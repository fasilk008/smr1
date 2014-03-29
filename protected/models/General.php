<?php

/**
 * This is the model class for table "general".
 *
 * The followings are the available columns in table 'general':
 * @property integer $property_id
 * @property integer $total_rooms
 * @property string $description
 * @property string $address
 * @property string $landphone
 * @property string $landphone2
 * @property string $mobilenumber
 * @property string $mobilenumber2
 * @property string $owner_email
 * @property integer $owner_number
 * @property integer $owner_notify
 * @property string $email
 * @property integer $place_id
 * @property integer $type_id
 * @property integer $subtype_id
 */
class General extends CActiveRecord
{
    public $total_rooms;
  public $property_description;
  public $property_address;
  public $landphone1;
  public $landphone2;
  public $mobile1;
  public $mobile2;
  public $owner_email;
  public $owner_no;
  public $email_notify;
  public $mob_notify;
  public $email;
  public $place;
  public $subtype;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'general';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('property_id, total_rooms, description, address, landphone, landphone2, mobilenumber, mobilenumber2, owner_email, owner_number, owner_notify, email, place_id, type_id, subtype_id', 'required'),
			array('property_id, total_rooms, owner_number, owner_notify, place_id, type_id, subtype_id', 'numerical', 'integerOnly'=>true),
			array('description, address', 'length', 'max'=>200),
			array('landphone, landphone2, mobilenumber, mobilenumber2', 'length', 'max'=>15),
			array('owner_email', 'length', 'max'=>50),
			array('email', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('property_id, total_rooms, description, address, landphone, landphone2, mobilenumber, mobilenumber2, owner_email, owner_number, owner_notify, email, place_id, type_id, subtype_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'property_id' => 'Property',
			'total_rooms' => 'Total Rooms',
			'description' => 'Description',
			'address' => 'Address',
			'landphone' => 'Landphone',
			'landphone2' => 'Landphone2',
			'mobilenumber' => 'Mobilenumber',
			'mobilenumber2' => 'Mobilenumber2',
			'owner_email' => 'Owner Email',
			'owner_number' => 'Owner Number',
			'owner_notify' => 'Owner Notify',
			'email' => 'Email',
			'place_id' => 'Place',
			'type_id' => 'Type',
			'subtype_id' => 'Subtype',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('property_id',$this->property_id);
		$criteria->compare('total_rooms',$this->total_rooms);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('landphone',$this->landphone,true);
		$criteria->compare('landphone2',$this->landphone2,true);
		$criteria->compare('mobilenumber',$this->mobilenumber,true);
		$criteria->compare('mobilenumber2',$this->mobilenumber2,true);
		$criteria->compare('owner_email',$this->owner_email,true);
		$criteria->compare('owner_number',$this->owner_number);
		$criteria->compare('owner_notify',$this->owner_notify);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('place_id',$this->place_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('subtype_id',$this->subtype_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return General the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
