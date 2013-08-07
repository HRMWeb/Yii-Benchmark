 <?php

class Bench extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'bench';
    }

    public function rules()
    {
        return array(
            array('title', 'required'),
            array('title', 'length', 'max'=>100),
            array('id, title', 'safe', 'on'=>'search'),
        );
    }

    public function relations()
    {
        return array(
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'title' => 'Title',
        );
    }

    public function search()
    {
        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('title',$this->title,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
} 