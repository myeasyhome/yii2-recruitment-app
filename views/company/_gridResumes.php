<?php
	use yii\grid\GridView;
	use yii\widgets\Pjax;
?>
<?php
Pjax::begin([
    // PJax options
]);
echo GridView::widget([
	'dataProvider' => $dataProvider,
	//'filterModel' => $searchModel,
	'tableOptions' => [
        'class' => 'table table-responsive',
        'id' => 'sortable-table',
    ],
    'id' =>'gridResumes',
    'columns' =>[
		[
			'class' => 'yii\grid\SerialColumn',
		],
		[
			'header'=>Yii::t('app','State'),
			'value'=> function($data) { return $this->context->spanState($data->statusResumesIdStatusResume->state); },
			'attribute' => 'statusResumes_idStatusResume',
			'format' => 'raw',
		],
		[
            'attribute' => 'dateApplication',
            'format' => ['date', 'php:d/m/Y h:m']
        ],
		[
			'header'=>Yii::t('app','Applicant'),
			'value'=>function($data) { return $data->suffix." ".$data->firstName." ".$data->middleName." ".$data->lastName; },
			'attribute' => 'firstName',
		],
		[
			'header'=>Yii::t('app','Options'),
            'format'=>'raw',
            'value'=>array($this->context,'optionsColumn')
        ],
	]
]);
Pjax::end();
?>