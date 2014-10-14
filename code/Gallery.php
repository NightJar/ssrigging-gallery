<?php

class Gallery extends DataExtension {
	public static $has_many = array(
		'Images' => 'GalleryImage'
	);
	public function updateCMSFields(FieldList $fields) {
		$imagegfconf = GridFieldConfig_RelationEditor::create()->removeComponentsByType('GridFieldDeleteAction')->addComponent(new GridFieldDeleteAction(true));
		if(class_exists('GridFieldSortableRows')) $imagegfconf->addComponent(new GridFieldSortableRows('Sort'));
		if(class_exists('GridFieldBulkEditingTools') && class_exists('GridFieldBulkImageUpload')) {
			$imagegfconf->addComponents(
				new GridFieldBulkEditingTools(),
				$gfbiu = new GridFieldBulkImageUpload()
			);
			$gfbiu->setConfig('folderName', 'GalleryImages');
		}
		$fields->addFieldToTab('Root.Images', new GridField('Images', 'Images', $this->owner->Images(), $imagegfconf));
		return $fields;
	}
}
