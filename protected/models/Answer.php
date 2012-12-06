<?php

/**
 * This is the model class for table "tbl_answer".
 *
 * The followings are the available columns in table 'tbl_answer':
 * @property integer $id
 * @property integer $qid
 * @property string $nickname
 * @property string $email
 * @property string $add_time
 * @property string $content
 * @property integer $is_show
 * @property integer $agree
 * @property integer $disagree
 */
class Answer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Answer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qid, is_show, agree, disagree', 'numerical', 'integerOnly'=>true),
			array('nickname', 'length', 'max'=>50),
			array('email', 'length', 'max'=>30),
			array('add_time, content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, qid, nickname, email, add_time, content, is_show, agree, disagree', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'qid' => 'Qid',
			'nickname' => 'Nickname',
			'email' => 'Email',
			'add_time' => 'Add Time',
			'content' => 'Content',
			'is_show' => 'Is Show',
			'agree' => 'Agree',
			'disagree' => 'Disagree',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('qid',$this->qid);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('agree',$this->agree);
		$criteria->compare('disagree',$this->disagree);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}