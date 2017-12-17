<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property integer $id_curso
 * @property string $nome_curso
 * @property string $desc_curso
 * @property integer $id_professor
 *
 * @property Nota[] $notas
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome_curso', 'desc_curso', 'id_professor'], 'required'],
            [['id_professor'], 'integer'],
            [['nome_curso', 'desc_curso'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'nome_curso' => 'Nome Curso',
            'desc_curso' => 'Desc Curso',
            'id_professor' => 'Id Professor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(Nota::className(), ['id_curso' => 'id_curso']);
    }
}
