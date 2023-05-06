<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salaries".
 *
 * @property int $emp_no
 * @property int $salary
 * @property string $from_date
 * @property string $to_date
 *
 * @property Employee $empNo
 */
class Salary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'salaries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_no', 'salary', 'from_date', 'to_date'], 'required'],
            [['emp_no', 'salary'], 'integer'],
            [['from_date', 'to_date'], 'safe'],
            [['emp_no', 'from_date'], 'unique', 'targetAttribute' => ['emp_no', 'from_date']],
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
            'salary' => 'Salary',
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
