<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "titles".
 *
 * @property int $emp_no
 * @property string $title
 * @property string $from_date
 * @property string|null $to_date
 *
 * @property Employee $empNo
 */
class Title extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'titles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_no', 'title', 'from_date'], 'required'],
            [['emp_no'], 'integer'],
            [['from_date', 'to_date'], 'safe'],
            [['title'], 'string', 'max' => 50],
            [['emp_no', 'title', 'from_date'], 'unique', 'targetAttribute' => ['emp_no', 'title', 'from_date']],
            [['emp_no'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['emp_no' => 'emp_no']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emp_no' => 'Emp No',
            'title' => 'Title',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
        ];
    }

    /**
     * Gets query for [[EmpNo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpNo()
    {
        return $this->hasOne(Employee::class, ['emp_no' => 'emp_no']);
    }
}
