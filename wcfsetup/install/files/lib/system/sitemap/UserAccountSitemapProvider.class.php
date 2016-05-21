<?php
namespace wcf\system\sitemap;
use wcf\system\WCF;

/**
 * Provides a sitemap for user account.
 * 
 * @author	Alexander Ebert
 * @copyright	2001-2016 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf
 * @subpackage	system.sitemap
 * @category	Community Framework
 */
class UserAccountSitemapProvider implements ISitemapProvider {
	/**
	 * @inheritDoc
	 */
	public function getTemplate() {
		return WCF::getTPL()->fetch('sitemapUserAccount');
	}
}
