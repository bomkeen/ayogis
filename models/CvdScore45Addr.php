<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cvd_score45_addr".
 *
 * @property string $CID
 * @property string $NAME
 * @property string $LNAME
 * @property string $SEX
 * @property string $BIRTH
 * @property string $AGE_Y
 * @property string $NATION
 * @property string $TYPEAREA
 * @property string $DISCHARGE
 * @property string $source_tb
 * @property string $hosp_dx
 * @property string $mix_dx
 * @property string $t_mix_dx
 * @property string $date_dx
 * @property string $type_dx
 * @property string $L_SMOKING
 * @property string $L_SMOKE_DATE
 * @property string $L_SMOKE_HOSPCODE
 * @property string $L_SMOKE_SOURCE
 * @property integer $L_SBP
 * @property string $L_SBP_DATE
 * @property string $L_SBP_HOSPCODE
 * @property string $L_SBP_SOURCE
 * @property double $L_CHOL
 * @property string $L_CHOL_DATE
 * @property string $L_CHOL_HOSPCODE
 * @property integer $L_WAIST_CM
 * @property string $L_WAIST_DATE
 * @property string $L_WAIST_HOSPCODE
 * @property string $L_WAIST_SOURCE
 * @property string $L_HEIGHT_DATE
 * @property string $L_HEIGHT_HOSPCODE
 * @property string $L_HEIGHT_SOURCE
 * @property string $L_RISK_SCORE
 * @property integer $SCORE_LEVEL
 * @property string $home_hospcode
 * @property string $home_addr
 * @property string $home_ccaattmm
 * @property string $addr1_hospcode
 * @property string $addr1_addr
 * @property string $addr1_ccaattmm
 * @property string $addr2_hospcode
 * @property string $addr2_addr
 * @property string $addr2_ccaattmm
 * @property string $owner_hospcode
 * @property string $LATITUDE
 * @property string $LONGITUDE
 */
class CvdScore45Addr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cvd_score45_addr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CID'], 'required'],
            [['BIRTH', 'L_SMOKE_DATE', 'L_SBP_DATE', 'L_CHOL_DATE', 'L_WAIST_DATE', 'L_HEIGHT_DATE'], 'safe'],
            [['L_SBP', 'L_WAIST_CM', 'SCORE_LEVEL'], 'integer'],
            [['L_CHOL', 'L_RISK_SCORE', 'LATITUDE', 'LONGITUDE'], 'number'],
            [['CID'], 'string', 'max' => 13],
            [['NAME', 'LNAME'], 'string', 'max' => 50],
            [['SEX', 'TYPEAREA', 'DISCHARGE', 'L_SMOKING'], 'string', 'max' => 1],
            [['AGE_Y', 'NATION'], 'string', 'max' => 3],
            [['source_tb', 'hosp_dx', 'mix_dx', 't_mix_dx', 'date_dx'], 'string', 'max' => 255],
            [['type_dx'], 'string', 'max' => 2],
            [['L_SMOKE_HOSPCODE', 'L_SBP_HOSPCODE', 'L_CHOL_HOSPCODE', 'L_WAIST_HOSPCODE', 'L_HEIGHT_HOSPCODE', 'home_hospcode', 'addr1_hospcode', 'addr2_hospcode', 'owner_hospcode'], 'string', 'max' => 5],
            [['L_SMOKE_SOURCE', 'L_SBP_SOURCE', 'L_WAIST_SOURCE', 'L_HEIGHT_SOURCE'], 'string', 'max' => 20],
            [['home_addr', 'addr1_addr', 'addr2_addr'], 'string', 'max' => 75],
            [['home_ccaattmm', 'addr1_ccaattmm', 'addr2_ccaattmm'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CID' => 'Cid',
            'NAME' => 'Name',
            'LNAME' => 'Lname',
            'SEX' => 'Sex',
            'BIRTH' => 'Birth',
            'AGE_Y' => 'Age  Y',
            'NATION' => 'Nation',
            'TYPEAREA' => 'Typearea',
            'DISCHARGE' => 'Discharge',
            'source_tb' => 'Source Tb',
            'hosp_dx' => 'Hosp Dx',
            'mix_dx' => 'Mix Dx',
            't_mix_dx' => 'T Mix Dx',
            'date_dx' => 'Date Dx',
            'type_dx' => 'Type Dx',
            'L_SMOKING' => 'L  Smoking',
            'L_SMOKE_DATE' => 'L  Smoke  Date',
            'L_SMOKE_HOSPCODE' => 'L  Smoke  Hospcode',
            'L_SMOKE_SOURCE' => 'L  Smoke  Source',
            'L_SBP' => 'L  Sbp',
            'L_SBP_DATE' => 'L  Sbp  Date',
            'L_SBP_HOSPCODE' => 'L  Sbp  Hospcode',
            'L_SBP_SOURCE' => 'L  Sbp  Source',
            'L_CHOL' => 'L  Chol',
            'L_CHOL_DATE' => 'L  Chol  Date',
            'L_CHOL_HOSPCODE' => 'L  Chol  Hospcode',
            'L_WAIST_CM' => 'L  Waist  Cm',
            'L_WAIST_DATE' => 'L  Waist  Date',
            'L_WAIST_HOSPCODE' => 'L  Waist  Hospcode',
            'L_WAIST_SOURCE' => 'L  Waist  Source',
            'L_HEIGHT_DATE' => 'L  Height  Date',
            'L_HEIGHT_HOSPCODE' => 'L  Height  Hospcode',
            'L_HEIGHT_SOURCE' => 'L  Height  Source',
            'L_RISK_SCORE' => 'L  Risk  Score',
            'SCORE_LEVEL' => 'Score  Level',
            'home_hospcode' => 'Home Hospcode',
            'home_addr' => 'Home Addr',
            'home_ccaattmm' => 'Home Ccaattmm',
            'addr1_hospcode' => 'Addr1 Hospcode',
            'addr1_addr' => 'Addr1 Addr',
            'addr1_ccaattmm' => 'Addr1 Ccaattmm',
            'addr2_hospcode' => 'Addr2 Hospcode',
            'addr2_addr' => 'Addr2 Addr',
            'addr2_ccaattmm' => 'Addr2 Ccaattmm',
            'owner_hospcode' => 'Owner Hospcode',
            'LATITUDE' => 'Latitude',
            'LONGITUDE' => 'Longitude',
        ];
    }
}
