<?php
namespace wcf\data\clipboard\action;
use wcf\data\AbstractDatabaseObjectAction;

/**
 * Executes clipboard action-related actions.
 * 
 * @author	Alexander Ebert
 * @copyright	2001-2016 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf
 * @subpackage	data.clipboard.action
 * @category	Community Framework
 */
class ClipboardActionAction extends AbstractDatabaseObjectAction {
	/**
	 * @inheritDoc
	 */
	protected $className = 'wcf\data\clipboard\action\ClipboardActionEditor';
}
