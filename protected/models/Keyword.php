<?php

/**
 * This is the model class for table "tbl_keyword".
 *
 * The followings are the available columns in table 'tbl_keyword':
 * @property integer $id
 * @property string $keyword
 */
class Keyword extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Keyword the static model class
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
		return 'tbl_keyword';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keyword', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, keyword', 'safe', 'on'=>'search'),
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
			'questions'=>array(self::HAS_MANY,'Questions','kid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'keyword' => 'Keyword',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->select = 't.*,count(q.id) as cq,count(a.id) as ca';
		$criteria->join = "left join tbl_questions as q on q.kid=t.id left join tbl_answer as a on a.qid=q.id";
		$criteria->order = "cq desc,ca desc";
		$criteria->group = 'q.kid,a.qid';
		$criteria->limit = 10;
		return $this->findAll($criteria);
	}
}