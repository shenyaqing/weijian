<?php

/**
 * This is the model class for table "tbl_questions".
 *
 * The followings are the available columns in table 'tbl_questions':
 * @property integer $id
 * @property integer $kid
 * @property string $nickname
 * @property string $email
 * @property string $add_time
 * @property string $content
 * @property integer $status
 * @property integer $is_show
 * @property integer $same_ask
 */
class Questions extends CActiveRecord
{
	public $num;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Questions the static model class
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
		return 'tbl_questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kid, status, is_show, same_ask', 'numerical', 'integerOnly'=>true),
			array('nickname', 'length', 'max'=>50),
			array('email', 'length', 'max'=>30),
			array('add_time, content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kid, nickname, email, add_time, content, status, is_show, same_ask, num', 'safe', 'on'=>'search'),
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
			'answer'=>array(self::HAS_MANY,'Answer','qid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kid' => 'Kid',
			'nickname' => 'Nickname',
			'email' => 'Email',
			'add_time' => 'Add Time',
			'content' => 'Content',
			'status' => 'Status',
			'is_show' => 'Is Show',
			'same_ask' => 'Same Ask',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($limit)
	{
		$criteria=new CDbCriteria;
		$criteria->select = "t.*,(select count(*) from tbl_answer where qid=t.id) as num";
		$criteria->compare('t.kid',$this->kid,false);
		$criteria->compare('t.is_show',1,false);
		$criteria->compare('t.status',1);
		$criteria->order = 'num desc';
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>$limit,
		    ),
		));
	}
	
	public function getwait($limit){
		$criteria=new CDbCriteria;
		$criteria->compare('kid',$this->kid,false);
		$criteria->compare('is_show',1);
		$criteria->order = 'add_time asc';
		$criteria->addInCondition('status', array(NULL));
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
		        'pageSize'=>$limit,
		    ),
		));
	}
}