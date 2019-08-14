<?php

/**
 * Dropfin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade 
 * this extension to newer versions in the future. 
 *
 * @category    Dropfin
 * @package     Newsletter Popup
 * @copyright   Copyright (c) Dropfin (http://www.dropfin.com)
 */

class Dropfin_Newsletterpopup_Helper_Data extends Mage_Core_Helper_Abstract {

    const XML_PATH_ENABLED = 'dropfin_newsletterpopup/configurations/enabled';
    const XML_PATH_COOKIES_NAME = 'dropfin_newsletterpopup/configurations/cookies_name';
    const XML_PATH_COOKIES_TIME_OUT = 'dropfin_newsletterpopup/configurations/cookies_timeout';
    const XML_PATH_AUTO_HIDE = 'dropfin_newsletterpopup/configurations/auto_hide';
    const XML_PATH_HIDE_TIMEOUT = 'dropfin_newsletterpopup/configurations/hide_timeout';

    const XML_PATH_POPUP_TITLE = 'dropfin_newsletterpopup/popup_content/title';
    const XML_PATH_POPUP_SUB_TITLE = 'dropfin_newsletterpopup/popup_content/sub_title';
    const XML_PATH_POPUP_DESCRIPTION = 'dropfin_newsletterpopup/popup_content/description';

    const XML_PATH_SHOW_SOCIAL_LINKS = 'dropfin_newsletterpopup/popup_content/show_social_links';
    const XML_PATH_SHOW_SOCIAL_LINKS_TITLE = 'dropfin_newsletterpopup/popup_content/show_social_links_title';
    const XML_PATH_SOCIAL_LINKS_TITLE = 'dropfin_newsletterpopup/popup_content/social_links_title';
    const XML_PATH_SOCIAL_LINKS_FB = 'dropfin_newsletterpopup/popup_content/fb_link';
    const XML_PATH_SOCIAL_LINKS_TWL = 'dropfin_newsletterpopup/popup_content/twitter_link';
    const XML_PATH_SOCIAL_LINKS_GPL = 'dropfin_newsletterpopup/popup_content/gplus_link';
    const XML_PATH_SOCIAL_LINKS_YTL = 'dropfin_newsletterpopup/popup_content/youtube_link';
    const XML_PATH_SOCIAL_LINKS_PINL = 'dropfin_newsletterpopup/popup_content/pinterest_link';
    const XML_PATH_SOCIAL_LINKS_LINL = 'dropfin_newsletterpopup/popup_content/linkedin_link';
    const XML_PATH_SOCIAL_LINKS_FLL = 'dropfin_newsletterpopup/popup_content/flickr_link';
    const XML_PATH_SOCIAL_LINKS_VIML = 'dropfin_newsletterpopup/popup_content/vimeo_link';
    const XML_PATH_SOCIAL_LINKS_INSL = 'dropfin_newsletterpopup/popup_content/instagram_link';
    const XML_PATH_SOCIAL_LINKS_FSL = 'dropfin_newsletterpopup/popup_content/foursquare_link';
    const XML_PATH_SOCIAL_LINKS_TML = 'dropfin_newsletterpopup/popup_content/tumblr_link';

    const XML_PATH_POPUP_HEADER_BG = 'dropfin_newsletterpopup/popup_design/header_bg';
    const XML_PATH_POPUP_HEADER_COLOR = 'dropfin_newsletterpopup/popup_design/header_color';
    const XML_PATH_POPUP_BORDER = 'dropfin_newsletterpopup/popup_design/popup_border';
    const XML_PATH_POPUP_TEXT_COLOR = 'dropfin_newsletterpopup/popup_design/popup_text_color';
    const XML_PATH_POPUP_BUTTON_COLOR = 'dropfin_newsletterpopup/popup_design/submit_btn_color';
    const XML_PATH_POPUP_BUTTON_TEXT_COLOR = 'dropfin_newsletterpopup/popup_design/submit_btn_text_color';
    const XML_PATH_POPUP_ICON_SIZE = 'dropfin_newsletterpopup/popup_design/icon_size';
    const XML_PATH_SOCIAL_ICON_FB = 'dropfin_newsletterpopup/popup_design/fb_icon';
    const XML_PATH_SOCIAL_ICON_TWL = 'dropfin_newsletterpopup/popup_design/twitter_icon';
    const XML_PATH_SOCIAL_ICON_GPL = 'dropfin_newsletterpopup/popup_design/gplus_icon';
    const XML_PATH_SOCIAL_ICON_YTL = 'dropfin_newsletterpopup/popup_design/youtube_icon';
    const XML_PATH_SOCIAL_ICON_PINL = 'dropfin_newsletterpopup/popup_design/pinterest_icon';
    const XML_PATH_SOCIAL_ICON_LINL = 'dropfin_newsletterpopup/popup_design/linkedin_icon';
    const XML_PATH_SOCIAL_ICON_FLL = 'dropfin_newsletterpopup/popup_design/flickr_icon';
    const XML_PATH_SOCIAL_ICON_VIML = 'dropfin_newsletterpopup/popup_design/vimeo_icon';
    const XML_PATH_SOCIAL_ICON_INSL = 'dropfin_newsletterpopup/popup_design/instagram_icon';
    const XML_PATH_SOCIAL_ICON_FSL = 'dropfin_newsletterpopup/popup_design/foursquare_icon';
    const XML_PATH_SOCIAL_ICON_TML = 'dropfin_newsletterpopup/popup_design/tumblr_icon';
    
    public function getStatus() {
    	return (int) Mage::getStoreConfig(self::XML_PATH_ENABLED);
    }

    public function getCookieName() {
        return Mage::getStoreConfig(self::XML_PATH_COOKIES_NAME);
    }

    public function getCookieLifeTime() {
        $lifeTime = (int) Mage::getStoreConfig(self::XML_PATH_COOKIES_TIME_OUT);
        if($lifeTime <= 0) {
            $lifeTime = 1;
        }
        return $lifeTime;
    }

    public function getTimeOut() {
        if((int) Mage::getStoreConfig(self::XML_PATH_AUTO_HIDE)) {
            return (int) Mage::getStoreConfig(self::XML_PATH_HIDE_TIMEOUT);
        }
        return false;
    }

    public function getPopupTitle() {
    	return Mage::getStoreConfig(self::XML_PATH_POPUP_TITLE);
    }

    public function getPopupSubTitle() {
    	return Mage::getStoreConfig(self::XML_PATH_POPUP_SUB_TITLE);
    }

    public function getPopupDescription() {
    	return Mage::getStoreConfig(self::XML_PATH_POPUP_DESCRIPTION);
    }

    public function getShowSocialLinks() {
    	return (int) Mage::getStoreConfig(self::XML_PATH_SHOW_SOCIAL_LINKS);
    }

    public function getShowSocialLinksTitle() {
        return (int) Mage::getStoreConfig(self::XML_PATH_SHOW_SOCIAL_LINKS_TITLE);
    }

    public function getSocialLinksTitle() {
    	return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_TITLE);
    }

    public function getFBLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_FB);
    }

    public function getTwitterLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_TWL);
    }

    public function getGplusLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_GPL);
    }

    public function getYoutubeLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_YTL);
    }

    public function getPinLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_PINL);
    }

    public function getLinkedinLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_LINL);
    }

    public function getFlickrLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_FLL);
    }

    public function getVimeoLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_VIML);
    }

    public function getInstagramLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_INSL);
    }

    public function getFoursquareLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_FSL);
    }

    public function getTumblrLink() {
        return Mage::getStoreConfig(self::XML_PATH_SOCIAL_LINKS_TML);
    }

    public function getHeaderBg() {
        return Mage::getStoreConfig(self::XML_PATH_POPUP_HEADER_BG);
    }

    public function getHeaderColor() {
        return Mage::getStoreConfig(self::XML_PATH_POPUP_HEADER_COLOR);
    }

    public function getBorderColor() {
        return Mage::getStoreConfig(self::XML_PATH_POPUP_BORDER);
    }

    public function getPopupTextColor() {
        return Mage::getStoreConfig(self::XML_PATH_POPUP_TEXT_COLOR);
    }

    public function getButtonColor() {
        return Mage::getStoreConfig(self::XML_PATH_POPUP_BUTTON_COLOR);
    }

    public function getButtonTextColor() {
        return Mage::getStoreConfig(self::XML_PATH_POPUP_BUTTON_TEXT_COLOR);
    }

    public function getIconSize() {
        return Mage::getStoreConfig(self::XML_PATH_POPUP_ICON_SIZE);
    }

    public function getFBIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_FB)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_FB);    
        }
        return 'social_icons/fb.png';
    }

    public function getTwitterIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_TWL)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_TWL);    
        }
        return 'social_icons/twitter.png';
    }

    public function getGplusIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_GPL)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_GPL);    
        }
        return 'social_icons/gplus.png';
    }

    public function getYoutubeIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_YTL)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_YTL);    
        }
        return 'social_icons/youtube.png';
    }

    public function getPinIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_PINL)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_PINL);    
        }
        return 'social_icons/pinterest.png';
    }

    public function getLinkedinIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_LINL)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_LINL);    
        }
        return 'social_icons/linkedin.png';
    }

    public function getFlickrIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_FLL)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_FLL);    
        }
        return 'social_icons/flickr.png';
    }

    public function getVimeoIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_VIML)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_VIML);    
        }
        return 'social_icons/vimeo.png';
    }

    public function getInstagramIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_INSL)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_INSL);    
        }
        return 'social_icons/instagram.png';
    }

    public function getFoursquareIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_FSL)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_FSL);    
        }
        return 'social_icons/foursquare.png';
    }

    public function getTumblrIcon() {
        if(trim(Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_TML)) != '') {
            return Mage::getStoreConfig(self::XML_PATH_SOCIAL_ICON_TML);    
        }
        return 'social_icons/tumblr.png';
    }
}
