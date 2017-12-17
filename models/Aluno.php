<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aluno".
 *
 * @property integer $id_aluno
 * @property string $nome_aluno
 * @property integer $numero_telefone
 *
 * @property Nota[] $notas
 */
class Aluno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['numero_telefone'], 'integer'],
            [['nome_aluno'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_aluno' => 'Matrícula do SENIB',
            'nome_aluno' => 'Nome do Aluno',
            'numero_telefone' => 'Numero do  Telefone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotas()
    {
        return $this->hasMany(Nota::className(), ['id_aluno' => 'id_aluno']);
    }
}
