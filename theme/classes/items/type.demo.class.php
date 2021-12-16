<?php
/**
* @package janitor.itemtypes
* This file contains itemtype functionality
*/

class TypeDemo extends Itemtype {

	/**
	* Init, set varnames, validation rules
	*/
	function __construct() {

		// construct ItemType before adding to model
		parent::__construct(get_class());


		// itemtype database
		$this->db = SITE_DB.".item_demo";


		$this->addToModel("name", array(
			"type" => "string",
			"label" => "String",
			"required" => true,
			"hint_message" => "Type string",
			"error_message" => "String must be string"
		));

		$this->addToModel("v_text", array(
			"type" => "text",
			"label" => "Text",
			"required" => true,
			"hint_message" => "Type text",
			"error_message" => "Text must be text"
		));

		$this->addToModel("v_html", array(
			"type" => "html",
			"label" => "HTML",
			"allowed_tags" => "p,h1,h2,h3,h4,h5,h6,code,ul,ol,download,png,jpg,vimeo,youtube", //",mp4",
			"required" => true,
			"hint_message" => "Type html",
			"error_message" => "HTML must be HTML"
		));

	}

}

?>