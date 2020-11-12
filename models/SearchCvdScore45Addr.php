<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CvdScore45Addr;

/**
 * SearchCvdScore45Addr represents the model behind the search form about `app\models\CvdScore45Addr`.
 */
class SearchCvdScore45Addr extends CvdScore45Addr
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CID', 'NAME', 'LNAME', 'SEX', 'BIRTH', 'AGE_Y', 'NATION', 'TYPEAREA', 'DISCHARGE', 'source_tb', 'hosp_dx', 'mix_dx', 't_mix_dx', 'date_dx', 'type_dx', 'L_SMOKING', 'L_SMOKE_DATE', 'L_SMOKE_HOSPCODE', 'L_SMOKE_SOURCE', 'L_SBP_DATE', 'L_SBP_HOSPCODE', 'L_SBP_SOURCE', 'L_CHOL_DATE', 'L_CHOL_HOSPCODE', 'L_WAIST_DATE', 'L_WAIST_HOSPCODE', 'L_WAIST_SOURCE', 'L_HEIGHT_DATE', 'L_HEIGHT_HOSPCODE', 'L_HEIGHT_SOURCE', 'home_hospcode', 'home_addr', 'home_ccaattmm', 'addr1_hospcode', 'addr1_addr', 'addr1_ccaattmm', 'addr2_hospcode', 'addr2_addr', 'addr2_ccaattmm', 'owner_hospcode'], 'safe'],
            [['L_SBP', 'L_WAIST_CM', 'SCORE_LEVEL'], 'integer'],
            [['L_CHOL', 'L_RISK_SCORE', 'LATITUDE', 'LONGITUDE'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CvdScore45Addr::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'BIRTH' => $this->BIRTH,
            'L_SMOKE_DATE' => $this->L_SMOKE_DATE,
            'L_SBP' => $this->L_SBP,
            'L_SBP_DATE' => $this->L_SBP_DATE,
            'L_CHOL' => $this->L_CHOL,
            'L_CHOL_DATE' => $this->L_CHOL_DATE,
            'L_WAIST_CM' => $this->L_WAIST_CM,
            'L_WAIST_DATE' => $this->L_WAIST_DATE,
            'L_HEIGHT_DATE' => $this->L_HEIGHT_DATE,
            'L_RISK_SCORE' => $this->L_RISK_SCORE,
            'SCORE_LEVEL' => $this->SCORE_LEVEL,
            'LATITUDE' => $this->LATITUDE,
            'LONGITUDE' => $this->LONGITUDE,
        ]);

        $query->andFilterWhere(['like', 'CID', $this->CID])
            ->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'LNAME', $this->LNAME])
            ->andFilterWhere(['like', 'SEX', $this->SEX])
            ->andFilterWhere(['like', 'AGE_Y', $this->AGE_Y])
            ->andFilterWhere(['like', 'NATION', $this->NATION])
            ->andFilterWhere(['like', 'TYPEAREA', $this->TYPEAREA])
            ->andFilterWhere(['like', 'DISCHARGE', $this->DISCHARGE])
            ->andFilterWhere(['like', 'source_tb', $this->source_tb])
            ->andFilterWhere(['like', 'hosp_dx', $this->hosp_dx])
            ->andFilterWhere(['like', 'mix_dx', $this->mix_dx])
            ->andFilterWhere(['like', 't_mix_dx', $this->t_mix_dx])
            ->andFilterWhere(['like', 'date_dx', $this->date_dx])
            ->andFilterWhere(['like', 'type_dx', $this->type_dx])
            ->andFilterWhere(['like', 'L_SMOKING', $this->L_SMOKING])
            ->andFilterWhere(['like', 'L_SMOKE_HOSPCODE', $this->L_SMOKE_HOSPCODE])
            ->andFilterWhere(['like', 'L_SMOKE_SOURCE', $this->L_SMOKE_SOURCE])
            ->andFilterWhere(['like', 'L_SBP_HOSPCODE', $this->L_SBP_HOSPCODE])
            ->andFilterWhere(['like', 'L_SBP_SOURCE', $this->L_SBP_SOURCE])
            ->andFilterWhere(['like', 'L_CHOL_HOSPCODE', $this->L_CHOL_HOSPCODE])
            ->andFilterWhere(['like', 'L_WAIST_HOSPCODE', $this->L_WAIST_HOSPCODE])
            ->andFilterWhere(['like', 'L_WAIST_SOURCE', $this->L_WAIST_SOURCE])
            ->andFilterWhere(['like', 'L_HEIGHT_HOSPCODE', $this->L_HEIGHT_HOSPCODE])
            ->andFilterWhere(['like', 'L_HEIGHT_SOURCE', $this->L_HEIGHT_SOURCE])
            ->andFilterWhere(['like', 'home_hospcode', $this->home_hospcode])
            ->andFilterWhere(['like', 'home_addr', $this->home_addr])
            ->andFilterWhere(['like', 'home_ccaattmm', $this->home_ccaattmm])
            ->andFilterWhere(['like', 'addr1_hospcode', $this->addr1_hospcode])
            ->andFilterWhere(['like', 'addr1_addr', $this->addr1_addr])
            ->andFilterWhere(['like', 'addr1_ccaattmm', $this->addr1_ccaattmm])
            ->andFilterWhere(['like', 'addr2_hospcode', $this->addr2_hospcode])
            ->andFilterWhere(['like', 'addr2_addr', $this->addr2_addr])
            ->andFilterWhere(['like', 'addr2_ccaattmm', $this->addr2_ccaattmm])
            ->andFilterWhere(['like', 'owner_hospcode', $this->owner_hospcode]);

        return $dataProvider;
    }
}
