<?php
namespace wcf\acp\page;
use wcf\data\application\ApplicationList;
use wcf\page\SortablePage;
use wcf\system\WCF;
use wcf\util\StringUtil;

/**
 * Shows a list of pages.
 * 
 * @author	Marcel Werk
 * @copyright	2001-2015 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf
 * @subpackage	acp.page
 * @category	Community Framework
 * @since	2.2
 */
class PageListPage extends SortablePage {
	/**
	 * @inheritdoc
	 */
	public $activeMenuItem = 'wcf.acp.menu.link.cms.page.list';
	
	/**
	 * @inheritdoc
	 */
	public $objectListClassName = 'wcf\data\page\PageList';
	
	/**
	 * @inheritdoc
	 */
	public $neededPermissions = array('admin.content.cms.canManagePage');
	
	/**
	 * @inheritdoc
	 */
	public $defaultSortField = 'name';
	
	/**
	 * @inheritdoc
	 */
	public $validSortFields = array('pageID', 'name', 'lastUpdateTime');
	
	/**
	 * name
	 * @var	string
	 */
	public $name = '';
	
	/**
	 * title
	 * @var	string
	 */
	public $title = '';
	
	/**
	 * content
	 * @var	string
	 */
	public $content = '';
	
	/**
	 * package id of the page
	 * @var integer
	 */
	public $packageID = 0;
	
	/**
	 * page type
	 * @var string
	 */
	public $pageType = 'static';
	
	/**
	 * list of available applications
	 * @var \wcf\data\application\Application[]
	 */
	public $availableApplications = [];
	
	/**
	 * @inheritdoc
	 */
	public function readParameters() {
		parent::readParameters();
		
		if (!empty($_REQUEST['name'])) $this->name = StringUtil::trim($_REQUEST['name']);
		if (!empty($_REQUEST['title'])) $this->title = StringUtil::trim($_REQUEST['title']);
		if (!empty($_REQUEST['content'])) $this->content = StringUtil::trim($_REQUEST['content']);
		if (isset($_REQUEST['packageID'])) $this->packageID = intval($_REQUEST['packageID']);
		if (!empty($_REQUEST['pageType'])) $this->pageType = $_REQUEST['pageType'];
		
		// get available applications
		$applicationList = new ApplicationList();
		$applicationList->readObjects();
		$this->availableApplications = $applicationList->getObjects();
	}
	
	/**
	 * @inheritdoc
	 */
	protected function initObjectList() {
		parent::initObjectList();
		
		if (!empty($this->name)) {
			$this->objectList->getConditionBuilder()->add('page.name LIKE ?', array('%'.$this->name.'%'));
		}
		if (!empty($this->title)) {
			$this->objectList->getConditionBuilder()->add('page.pageID IN (SELECT pageID FROM wcf'.WCF_N.'_page_content WHERE title LIKE ?)', array('%'.$this->title.'%'));
		}
		if (!empty($this->content)) {
			$this->objectList->getConditionBuilder()->add('page.pageID IN (SELECT pageID FROM wcf'.WCF_N.'_page_content WHERE content LIKE ?)', array('%'.$this->content.'%'));
		}
		if (!empty($this->packageID)) {
			$this->objectList->getConditionBuilder()->add('page.packageID = ?', array($this->packageID));
		}
		if ($this->pageType == 'static') {
			$this->objectList->getConditionBuilder()->add('page.pageType IN (?, ?, ?)', array('text', 'html', 'tpl'));
		}
		else if ($this->pageType == 'system') {
			$this->objectList->getConditionBuilder()->add('page.pageType IN (?)', array('system'));
		}
	}
	
	/**
	 * @inheritdoc
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign(array(
			'name' => $this->name,
			'title' => $this->title,
			'content' => $this->content,
			'packageID' => $this->packageID,
			'pageType' => $this->pageType,
			'availableApplications' => $this->availableApplications
		));
	}
}