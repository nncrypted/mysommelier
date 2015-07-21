<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\BaseJson;
use yii\log\Logger;
use linslin\yii2\curl;

/**
 * This is the model class for table "regions".
 *
 * @property integer $id
 * @property string $region_name
 * @property string $country
 *
 * @property Appellations[] $appellations
 */
class UpcDBApi extends Model
{
    /**
	 * Look up item using UPC code and return
	 * 
	 * @return array of item properties
     */
    public function getItemByUPC($upcCode)
    {
		// search upcdatabase and pre-populate fields
		// if not found, only populate barcode field value
		$upcDBUrl = Yii::$app->params['apiUrl'] . '/json/' . Yii::$app->params['apiKey'] . '/' . $upcCode;
		$curl = new curl\Curl();
        $upcResponse = $curl->get($upcDBUrl);

		if ($curl->responseCode)
		{
			$upcWine = BaseJson::decode($upcResponse, TRUE);

			if($upcWine['valid'] == 'true')
			{
				return $upcWine;
			}
		}
		else
		{
			\Yii::info('Error accessing upcdatabase.log: ' . $curl->responseCode, Logger::LEVEL_ERROR);
		}
		
		return NULL;
    }

	/**
	 * Create an item in teh UPCDatabase.org
	 * 
	 * @return array ('success' => true/false, 'errorText' => 'string')
     */
    public function createItem($itemDetails)
    {
		$ch = new curl\Curl();

		$response = $ch->setOption(
                CURLOPT_POSTFIELDS, 
                http_build_query(
					[
						'upc' => $itemDetails['upc'],
						'mrsp' => $itemDetails['msrp'],
						'apikey' => Yii::$app->params['apiKey'],
						'title' => $itemDetails['title'],
						'alias' => $itemDetails['alias'],
						'description' => $itemDetails['description'],
						'unit' => 'each'
					]
                )
            )
            ->post(Yii::$app->params['apiUrl'] . '/submit/curl.php');
		
		if( $response['something'] == 'OK' ) 
		{
			$result = ['success' => true, 'errorText' => ''];
		} 
		else 
		{
			$result = ['success' => false, 'errorText' => $response['something']];
		}
		
		return $result;
    }
}
