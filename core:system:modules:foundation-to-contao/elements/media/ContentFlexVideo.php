<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   Foundation To Contao
 * @author    Monique Hahnefeld
 * @license   LGPL
 * @copyright 2014 Monique Hahnefeld
 */
 
namespace MHAHNEFELD\FTC;


class ContentFlexVideo extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_flex_video';


	/**
	 * Extend the parent method
	 * @return string
	 */
	public function generate()
	{
		if (!$this->use_youtube&&!$this->vimeo&&!$this->own_src)
		{
			return '';
		}

		if (TL_MODE == 'BE')
		{
			if ($this->use_youtube||$this->vimeo) {
				return ($this->vimeo)?'<p>vimeo '. $this->youtube_vimeo_id . '</p>' :'<p> youtube '. $this->youtube_vimeo_id  . '</p>';
			}else {
				return '<p> eigene videos </p>';
			}
			
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		$this->Template->size = '';

		// Set the size
		if ($this->playerSize != '')
		{
			$size = deserialize($this->playerSize);

			if (is_array($size))
			{
				$this->Template->size = ' width="' . $size[0] . '" height="' . $size[1] . '"';
			}
		}

		$this->Template->poster = false;

		if ($this->use_youtube) {
			$this->Template->use_iframe=true;
			$this->Template->embed_path = 'http://www.youtube.com/embed/' . $this->youtube_vimeo_id;
		}
		if ($this->vimeo) {
			$this->Template->use_iframe=true;
			$this->Template->embed_path = 'http://player.vimeo.com/video/' . $this->youtube_vimeo_id;
		}
		if ($this->own_src) {
			$this->Template->use_iframe=false;
			
			
			$video_files= unserialize($this->video_src);
			
			$video_Arr =array();
			if (is_Array($video_files)) {
				
			
				foreach ($video_files as $c => $file) {
					$objFile = new \stdClass();
					if (($objFile = \FilesModel::findByUuid($file['src'])) !== null)
					{
					//var_dump($objFile);
					$video_Arr[$c]['mime'] = $file['mime'];
					$video_Arr[$c]['src'] = $objFile->path;
					}
				}
				//array($objFile);
				$this->Template->embed_path =$video_Arr;
			}
			//video <track>
			$track_files= unserialize($this->track_src);
			
			$track_Arr =array();
			if (is_Array($track_files)) {
				foreach ($track_files as $c => $file) {
					$objFile = new \stdClass();
					if (($objFile = \FilesModel::findByUuid($file['src'])) !== null)
					{
					//var_dump($objFile);
					$track_Arr[$c]['kind'] = $file['kind'];
					$track_Arr[$c]['src'] = $objFile->path;
					$track_Arr[$c]['lang'] = $file['lang'];
					}
				}
				//array($objFile);
				$this->Template->track_path =$track_Arr;
			}
			if ($this->flash_player_src!==Null&&$this->flash_video_src!==Null) {
				$objFile = new \stdClass();
				if (($objFile = \FilesModel::findByUuid($this->flash_player_src)) !== null)
				{
				//var_dump($objFile);
				$this->Template->flash_player_src =$objFile->path;
				}
				$objFile = new \stdClass();
				if (($objFile = \FilesModel::findByUuid($this->flash_video_src)) !== null)
				{
				//var_dump($objFile);
				$this->Template->flash_video_src =$objFile->path;
				}
			}
			
			
			
			// Optional poster
			if ($this->posterSRC != '')
			{	$objFile = new \stdClass();
				if (($objFile = \FilesModel::findByUuid($this->posterSRC)) !== null)
				{
					$this->Template->poster = $objFile->path;
				}
			}
		}
		

		$this->Template->isVideo = true;
		
		$this->Template->autoplay = $this->autoplay;
	}
}
