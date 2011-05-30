<?php

/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function bu($url=null)
{
	static $baseUrl;
	if ($baseUrl === null)
		$baseUrl = Yii::app()->getRequest()->getBaseUrl();
	return $url === null ? $baseUrl : $baseUrl . '/' . ltrim($url, '/');
}

function wr() {
	static $webRoot;
	if ($webRoot === null) {
		$webRoot = Yii::getPathOfAlias('webroot');
	}
	return $webRoot;
}
