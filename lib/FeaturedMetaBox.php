<?php 
	
	class FeaturedMetaBox extends AbstractMetaBox
	{

		public function createForm()
		{
			global $post;
			$subtitle = get_post_meta($post->ID, 'subtitle', true);
			$description = get_post_meta($post->ID, 'description', true);

			$result = '<label for="subtitle">Subtitle</label>';
			$result .= '<input type="text" name="subtitle" id="subtitle" placeholder="Type subtitle here" size="30" spellcheck="true" autocomplete="off" style="line-height: 100%;height: 1.7em;width: 100%; margin: 0 0 3px;background-color: #fff;" value="'.$subtitle.'">';

			$result .= '<label for="description">Description</label>';
			$result .= '<input type="text" name="description" id="description" placeholder="Type description here" size="30" spellcheck="true" autocomplete="off" style="line-height: 100%;height: 1.7em;width: 100%; margin: 0 0 3px;background-color: #fff;" value="'.$description.'">';

			echo $result;
		}

		public function createFormSocialMedia()
		{
			global $post;
			$facebook = get_post_meta($post->ID, 'facebook', true);

			$result = '<label for="subtitle">Facebook</label>';
			$result .= '<input type="text" name="facebook" id="facebook" placeholder="Type link here" size="30" spellcheck="true" autocomplete="off" style="line-height: 100%;height: 1.7em;width: 100%; margin: 0 0 3px;background-color: #fff;" value="'.$facebook.'">';

			$angellist .= get_post_meta($post->ID, 'angellist', true);

			$result .= '<label for="subtitle">Angellist</label>';
			$result .= '<input type="text" name="angellist" id="angellist" placeholder="Type link here" size="30" spellcheck="true" autocomplete="off" style="line-height: 100%;height: 1.7em;width: 100%; margin: 0 0 3px;background-color: #fff;" value="'.$angellist.'">';

			$instagram .= get_post_meta($post->ID, 'instagram', true);

			$result .= '<label for="subtitle">Instagram</label>';
			$result .= '<input type="text" name="instagram" id="instagram" placeholder="Type link here" size="30" spellcheck="true" autocomplete="off" style="line-height: 100%;height: 1.7em;width: 100%; margin: 0 0 3px;background-color: #fff;" value="'.$instagram.'">';

			$twitter .= get_post_meta($post->ID, 'twitter', true);

			$result .= '<label for="subtitle">Twitter</label>';
			$result .= '<input type="text" name="twitter" id="twitter" placeholder="Type link here" size="30" spellcheck="true" autocomplete="off" style="line-height: 100%;height: 1.7em;width: 100%; margin: 0 0 3px;background-color: #fff;" value="'.$twitter.'">';

			$linkedin .= get_post_meta($post->ID, 'linkedin', true);

			$result .= '<label for="subtitle">LinkedIn</label>';
			$result .= '<input type="text" name="linkedin" id="linkedin" placeholder="Type link here" size="30" spellcheck="true" autocomplete="off" style="line-height: 100%;height: 1.7em;width: 100%; margin: 0 0 3px;background-color: #fff;" value="'.$linkedin.'">';
			
			echo $result;
		}

		public function createFormProjects()
		{
			global $post;
			$link = get_post_meta($post->ID, 'link', true);

			$result = '<label for="subtitle">Link</label>';
			$result .= '<input type="text" name="link" id="link" placeholder="Type link here" size="30" spellcheck="true" autocomplete="off" style="line-height: 100%;height: 1.7em;width: 100%; margin: 0 0 3px;background-color: #fff;" value="'.$link.'">';
			
			echo $result;
		}

		public function addMetaBox()
		{
			add_meta_box('custom_fields', 'Additional Fields', array($this,  'createForm'), 'articles');
			add_meta_box('custom_fields', 'Additional Fields', array($this,  'createForm'), 'case-studies');
			add_meta_box('custom_fields', 'Additional Fields', array($this,  'createFormProjects'), 'side-projects');
			add_meta_box('custom_fields', 'Social Media Links', array($this,  'createFormSocialMedia'), 'social-media');
		}

		public function saveFields($post_id)
		{
			if(isset($_POST['subtitle'])){
				$subtitle = sanitize_text_field($_POST['subtitle']);
				update_post_meta($post_id, 'subtitle', $subtitle);
			}
			if(isset($_POST['description'])){
				$description = sanitize_text_field($_POST['description']);
				update_post_meta($post_id, 'description', $description);
			}
			if(isset($_POST['link'])){
				$link = sanitize_text_field($_POST['link']);
				update_post_meta($post_id, 'link', $link);
			}
			if(isset($_POST['facebook'])){
				$facebook = sanitize_text_field($_POST['facebook']);
				update_post_meta($post_id, 'facebook', $facebook);
			}
			if(isset($_POST['instagram'])){
				$instagram = sanitize_text_field($_POST['instagram']);
				update_post_meta($post_id, 'instagram', $instagram);
			}
			if(isset($_POST['twitter'])){
				$twitter = sanitize_text_field($_POST['twitter']);
				update_post_meta($post_id, 'twitter', $twitter);
			}
			if(isset($_POST['linkedin'])){
				$linkedin = sanitize_text_field($_POST['linkedin']);
				update_post_meta($post_id, 'linkedin', $linkedin);
			}
			if(isset($_POST['angellist'])){
				$angellist = sanitize_text_field($_POST['angellist']);
				update_post_meta($post_id, 'angellist', $angellist);
			}
		}
	}

?>