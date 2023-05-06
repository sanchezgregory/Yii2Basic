<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property string $dept_no
 * @property string $dept_name
 *
 * @property DeptEmp[] $deptEmps
 * @property DeptManager[] $deptManagers
 * @property Employee[] $empNos
 * @property Employee[] $empNos0
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dept_no', 'dept_name'], 'required'],
            [['dept_no'], 'string', 'max' => 4],
            [['dept_name'], 'string', 'max' => 40],
            [['dept_name'], 'unique'],
            [['dept_no'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dept_no' => 'Dept No',
            'dept_name' => 'Dept Name',
        ];
    }

    /**
     * Gets query for [[DeptEmps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeptEmps()
    {
        return $this->hasMany(DeptEmp::class, ['dept_no' => 'dept_no']);
    }

    /**
     * Gets query for [[DeptManagers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeptManagers()
    {
        return $this->hasMany(DeptManager::class, ['dept_no' => 'dept_no']);
    }

    /**
     * Gets query for [[EmpNos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpNos()
    {
        return $this->hasMany(Employee::class, ['emp_no' => 'emp_no'])->viaTable('dept_emp', ['dept_no' => 'dept_no']);
    }

    /**
     * Gets query for [[EmpNos0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpNos0()
    {
        return $this->hasMany(Employee::class, ['emp_no' => 'emp_no'])->viaTable('dept_manager', ['dept_no' => 'dept_no']);
    }
}
