<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dept_emp".
 *
 * @property int $emp_no
 * @property string $dept_no
 * @property string $from_date
 * @property string $to_date
 *
 * @property Department $deptNo
 * @property Employee $empNo
 */
class DeptEmp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dept_emp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_no', 'dept_no', 'from_date', 'to_date'], 'required'],
            [['emp_no'], 'integer'],
            [['from_date', 'to_date'], 'safe'],
            [['dept_no'], 'string', 'max' => 4],
            [['emp_no', 'dept_no'], 'unique', 'targetAttribute' => ['emp_no', 'dept_no']],
            [['emp_no'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['emp_no' => 'emp_no']],
            [['dept_no'], 'exist', 'skipOnError' => true, 'targetClass' => Department::class, 'targetAttribute' => ['dept_no' => 'dept_no']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emp_no' => 'Emp No',
            'dept_no' => 'Dept No',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
        ];
    }

    /**
     * Gets query for [[DeptNo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeptNo()
    {
        return $this->hasOne(Department::class, ['dept_no' => 'dept_no']);
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
