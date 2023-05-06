<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $emp_no
 * @property string $birth_date
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $hire_date
 *
 * @property DeptEmp[] $deptEmps
 * @property DeptManager[] $deptManagers
 * @property Department[] $deptNos
 * @property Department[] $deptNos0
 * @property Salary[] $salaries
 * @property Title[] $titles
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_no', 'birth_date', 'first_name', 'last_name', 'gender', 'hire_date'], 'required'],
            [['emp_no'], 'integer'],
            [['birth_date', 'hire_date'], 'safe'],
            [['gender'], 'string'],
            [['first_name'], 'string', 'max' => 14],
            [['last_name'], 'string', 'max' => 16],
            [['emp_no'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'emp_no' => 'Emp No',
            'birth_date' => 'Birth Date',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'gender' => 'Gender',
            'hire_date' => 'Hire Date',
        ];
    }

    /**
     * Gets query for [[DeptEmps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeptEmps()
    {
        return $this->hasMany(DeptEmp::class, ['emp_no' => 'emp_no']);
    }

    /**
     * Gets query for [[DeptManagers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeptManagers()
    {
        return $this->hasMany(DeptManager::class, ['emp_no' => 'emp_no']);
    }

    /**
     * Gets query for [[DeptNos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeptNos()
    {
        return $this->hasMany(Department::class, ['dept_no' => 'dept_no'])->viaTable('dept_emp', ['emp_no' => 'emp_no']);
    }

    /**
     * Gets query for [[DeptNos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeptNos0()
    {
        return $this->hasMany(Department::class, ['dept_no' => 'dept_no'])->viaTable('dept_manager', ['emp_no' => 'emp_no']);
    }

    /**
     * Gets query for [[Salaries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(Salary::class, ['emp_no' => 'emp_no']);
    }

    /**
     * Gets query for [[Titles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTitles()
    {
        return $this->hasMany(Title::class, ['emp_no' => 'emp_no']);
    }
}
