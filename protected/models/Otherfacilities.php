<?php

/**
 * This is the model class for table "otherfacilities".
 *
 * The followings are the available columns in table 'otherfacilities':
 * @property integer $facility_id
 * @property string $other_facilities
 * @property integer $property_id
 */
class Otherfacilities extends CActiveRecord
{
    public $other_facilities=array();
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'otherfacilities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('other_facilities, property_id', 'required'),
			array('property_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('facility_id, other_facilities, property_id', 'safe', 'on'=>'search'),
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
			'facility_id' => 'Facility',
			'other_facilities' => 'Other Facilities',
			'property_id' => 'Property',
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

		$criteria->compare('facility_id',$this->facility_id);
		$criteria->compare('other_facilities',$this->other_facilities,true);
		$criteria->compare('property_id',$this->property_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Otherfacilities the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
