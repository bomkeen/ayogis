<?php

use kartik\grid\GridView;

$this->title = 'สรุปจำนวนประชากรทั้งหมด/ประชากรที่ไม่ได้ระบุพิกัด';
$this->params['breadcrumbs'][] = ['label' => 'ระบบรายงาน', 'url' => ['/report']];
$this->params['breadcrumbs'][] = $this->title;
?>
<html>
    <body>
        <div class="page-header">
            <h3><?php echo $this->title; ?></h3>
        </div>
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <h3>ข้อมูลของ อำเภอ <?php echo $d_name ; ?></h3>
            </div>
            <div class="col-md-4  col-lg-4 ">
                <form class="form-inline"id="form1" name="form1" method="post" >
                    <select class="form-control" name="dist" id="dist">
                        <option value="" <?php if ($dist=='') echo 'selected'; ?>>เลือกทั้งหมด</option>
                        <?php foreach ($d_list as $p) { ?>
                            <option value="<?= $p['dist'] ?>"  <?php if ($p['dist'] == $dist) echo 'selected'; ?> ><?= $p['dist_name'] ?></option>
<?php } ?>
                    </select>
                    <input type="hidden" name="form1" id="form1" value="true" />
                    <input class="btn btn-success" type="submit" name="Submit" value="แสดงข้อมูล" />
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'showPageSummary' => true,
                    'responsiveWrap' => false,
                    'panel' => [
                    //  'before' => '',
                    // 'before' => 'ข้อมูลหระหว่างวันที่   '.thaidate($date1) .'    ถึง    '.thaidate($date2),
                    ],
                    ///////////////////////
                    'beforeHeader' => [
                        [
                            'options' => ['class' => 'skip-export'] // remove this row from export
                        ]
                    ],
                    ///////////////////
                    'columns' => [

//              [
//           'label'=>'',
//           'format' => 'raw',
//                      'pageSummary' => 'รวม',
//       'value'=>function ($data) 
//                      //use ($y,$dch1,$dch2,$m1,$m2) 
//                      {
//            return Html::a($data['amppart'],['report2/tmb'
//                ,'amppart'=>$data['ampart']]);
//        },
//    ],
//  
                        [
                            'attribute' => 'hosname',
                            'label' => 'สถานบริการ',
                            'pageSummary' => 'รวม',
                        ],
                        [
                            'attribute' => 'n',
                            'label' => 'ประชากรทั้งหมด',
                            'pageSummary' => true,
                            'format' => ['decimal', 0],
                            'hAlign' => 'right'
                        ],
                        [
                            'attribute' => 't',
                            'label' => 'ประชากรที่ไม่ได้ระบุพิกัด',
                            'pageSummary' => true,
                            'format' => ['decimal', 0],
                            'hAlign' => 'right'
                        ],
                    ],
                ]);
                ?>
            </div>
        </div>

    </body>
</html>