<?php 
	
	abstract class AbstractMetaBox
	{
		public function __construct()
		{
			add_action('add_meta_boxes', array($this, 'addMetaBox'));
			add_action('save_post', array($this, 'saveFields'));
		} 

		abstract public function createForm();
		abstract public function createFormProjects();
		abstract public function createFormSocialMedia();
		abstract public function addMetaBox();
		abstract public function saveFields($post_id);
	}

?>