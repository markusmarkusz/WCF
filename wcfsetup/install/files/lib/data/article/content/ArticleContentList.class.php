<?php
namespace wcf\data\article\content;
use wcf\data\DatabaseObjectList;

/**
 * Represents a list of article content.
 * 
 * @author	Marcel Werk
 * @copyright	2001-2016 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf
 * @subpackage	data.article.content
 * @category	Community Framework
 * @since	2.2
 *
 * @method	ArticleContent		current()
 * @method	ArticleContent[]	getObjects()
 * @method	ArticleContent|null	search($objectID)
 * @property	ArticleContent[]	$objects
 */
class ArticleContentList extends DatabaseObjectList {
	/**
	 * @inheritDoc
	 */
	public $className = ArticleContent::class;
}