<?php

class GalleryImage extends DataObject {
	public static $db = array(
		'Title' => 'VarChar',
		'Description' => 'Varchar(255)',
		'Sort' => 'Int'
	);
	public static $has_one = array(
		'Image' => 'Image',
		'Page' => 'Page'
	);
	public static $default_sort = 'Sort ASC';
	public static $summary_fields = array(
		'Title' => 'Title',
		'Description'=>'Description',
		'Thumbnail' => 'Thumbnail'
	);
	public static $singular_name = 'Image';
	public static $plural_name = 'Images';
	public function getCMSFields() {
		$fields = new FieldList(
			new TextField('Title'),
			new TextField('Description'),
			UploadField::create('Image')->setFolderName('GalleryImages')->setConfig('canAttachExisting', false)
		);
		$this->extend('updateCMSFields', $fields);
		return $fields;
	}
	public function Thumbnail() {
		$image = $this->Image();
		return ($image && $image->exists()) ? $image->CMSThumbnail() : 'No image added yet';
	}
	
	public function onBeforeDelete() {
		parent::onBeforeDelete();
		$img = $this->Image();
		if($img->exists()) {
			$img->deleteFormattedImages();
			$img->delete();
		}
	}
}
