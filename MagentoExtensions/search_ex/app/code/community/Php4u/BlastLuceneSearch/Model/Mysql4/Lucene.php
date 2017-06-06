<?php
/**
 * @category   Php4u
 * @package    Php4u_BlastLuceneSearch
 * @author     Marcin Szterling <marcin@php4u.co.uk>
 * @copyright  Php4u Marcin Szterling (c) 2011
 * @license http://php4u.co.uk/licence/
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * Any form of ditribution, sell, transfer forbidden, reverse engineering forbidden - see licence above
 *
 * Code was obfusacted due to previous licence violations
 */
class Php4u_BlastLuceneSearch_Model_Mysql4_Lucene extends Mage_CatalogSearch_Model_Mysql4_Fulltext { protected $_fixed = false; public function prepareResult($_8670b8113b3af50d41fc4bc5dc47cab4, $_7127a46a607186ef97de0cb266599aca, $_ab2690756490f72ffe3ed224d764b49c) { if (!Mage::getStoreConfigFlag('php4u/php4u_group/php4u_lucene_enabled',Mage::app()->getStore())) { return parent::prepareResult($_8670b8113b3af50d41fc4bc5dc47cab4, $_7127a46a607186ef97de0cb266599aca, $_ab2690756490f72ffe3ed224d764b49c); } if (!Mage::getModel('blastlucenesearch/blastlucenesearch')->isLicValid()) { return parent::prepareResult($_8670b8113b3af50d41fc4bc5dc47cab4, $_7127a46a607186ef97de0cb266599aca, $_ab2690756490f72ffe3ed224d764b49c); } try { if (!$_ab2690756490f72ffe3ed224d764b49c->getIsProcessed()) { $_8dddf2d029c02735586b3434aef5c13e = array(); $_ea8216f8a91dfba3a3bbe02fd7e2a316 = Mage::getModel('blastlucenesearch/blastlucenesearch'); $_ea8216f8a91dfba3a3bbe02fd7e2a316->setStoreId(Mage::app()->getStore()->getStoreId()); $_354df2b1eeab7f194ab750d7dd2d09c9 = $_ea8216f8a91dfba3a3bbe02fd7e2a316->getResultsWithScore($_7127a46a607186ef97de0cb266599aca); if (!empty($_354df2b1eeab7f194ab750d7dd2d09c9)) { $_67d5acce1ba0c6432363d64cf81bfb21 = sprintf("DELETE FROM `{$this->getTable('catalogsearch/result')}` WHERE query_id = %d", $_ab2690756490f72ffe3ed224d764b49c->getId()); $this->_getWriteAdapter()->query($_67d5acce1ba0c6432363d64cf81bfb21); foreach ($_354df2b1eeab7f194ab750d7dd2d09c9 as $_cb67daacaaa8147b1dc09e5fdd241162 => $_005424bae5b41ce9529778990205050a) { $_8dddf2d029c02735586b3434aef5c13e[] = "({$_ab2690756490f72ffe3ed224d764b49c->getId()}, {$_cb67daacaaa8147b1dc09e5fdd241162}, {$_005424bae5b41ce9529778990205050a})"; } $_8dddf2d029c02735586b3434aef5c13e = implode(',', $_8dddf2d029c02735586b3434aef5c13e); $_67d5acce1ba0c6432363d64cf81bfb21 = "REPLACE INTO `{$this->getTable('catalogsearch/result')}` VALUES {$_8dddf2d029c02735586b3434aef5c13e}"; $this->_getWriteAdapter()->query($_67d5acce1ba0c6432363d64cf81bfb21); } if (Mage::getStoreConfigFlag('php4u/php4u_group/php4u_allow_mag_search_cache', Mage::app()->getStore()->getStoreId())) { $_ab2690756490f72ffe3ed224d764b49c->setIsProcessed(1); Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[SEARCHRESULTS] Mark as cached"); } else { Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[SEARCHRESULTS] Leaving as uncached"); } } else { Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[SEARCHRESULTS] Results returned from magento search cache - query '{$_7127a46a607186ef97de0cb266599aca}'"); Mage::getModel('blastlucenesearch/event')->throwSearchDone(Php4u_BlastLuceneSearch_Model_Event::SEARCH_MODE_CACHE); } } catch (Exception $_511e5ea00710a589453ce1422151405b) { if ($this->_fixed === false) { if (is_object($_ea8216f8a91dfba3a3bbe02fd7e2a316) && is_object($_ab2690756490f72ffe3ed224d764b49c)) { if ($_ea8216f8a91dfba3a3bbe02fd7e2a316->fixIndexForQuery($_ab2690756490f72ffe3ed224d764b49c, $_354df2b1eeab7f194ab750d7dd2d09c9) === TRUE) { $this->_fixed = true; $this->prepareResult($_8670b8113b3af50d41fc4bc5dc47cab4, $_7127a46a607186ef97de0cb266599aca, $_ab2690756490f72ffe3ed224d764b49c); } } } else { Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[SEARCHRESULTS] Problem with SQL query to save results. Did you removed some products recently? Will try to fix that. Error:".$_511e5ea00710a589453ce1422151405b->getMessage(), Zend_Log::ERR); } } return $this; } protected function _addTags($_f61aef45a20fbd738fc86ef33567b186, $_a9f53c2ab70de1ada74a03ffc943a91b) { $_2c79565e2ef56d50dfbfb79d0116defc = array(); $_8395aabc9c6bb29a9f53a7b69e94724a = Mage::getModel('tag/tag'); if (is_object($_8395aabc9c6bb29a9f53a7b69e94724a) && $_f61aef45a20fbd738fc86ef33567b186 > 0 && Mage::getStoreConfigFlag('php4u/php4u_group/php4u_add_tags', $_a9f53c2ab70de1ada74a03ffc943a91b) == TRUE) { $_aff73dca5b051a9490791dcf3f4a78bc = $_8395aabc9c6bb29a9f53a7b69e94724a->getResourceCollection() ->addPopularity() ->addStatusFilter($_8395aabc9c6bb29a9f53a7b69e94724a->getApprovedStatus()) ->addProductFilter($_f61aef45a20fbd738fc86ef33567b186) ->setFlag('relation', true) ->addStoreFilter($_a9f53c2ab70de1ada74a03ffc943a91b) ->setActiveFilter() ->load(); foreach ($_aff73dca5b051a9490791dcf3f4a78bc->getItems() as $_d45acb45e08eb3b79d1ac0c2715b713f) { $_2c79565e2ef56d50dfbfb79d0116defc[] = strip_tags($_d45acb45e08eb3b79d1ac0c2715b713f->getName()); } } return ' ' . implode(' ', $_2c79565e2ef56d50dfbfb79d0116defc) . ' '; } protected function _rebuildStoreIndex($_a9f53c2ab70de1ada74a03ffc943a91b, $_73c5fb3ad48ce85bfc243af62227f891 = null) { if (!Mage::getModel('blastlucenesearch/blastlucenesearch')->isLicValid()) { throw new Exception(Mage::getModel('blastlucenesearch/blastlucenesearch')->getLicResultText()); } $_82be42ee6d55ddd256b0de85b8505fb1 = microtime(true); if (!$_73c5fb3ad48ce85bfc243af62227f891) { Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[REBUILD] **** START - Rebuilding index for Store Id $_a9f53c2ab70de1ada74a03ffc943a91b ****"); } else { Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[REBUILD] **** START - Rebuilding index for Store Id $_a9f53c2ab70de1ada74a03ffc943a91b (products specified) ****"); } if (!empty($_73c5fb3ad48ce85bfc243af62227f891)) { if (is_array($_73c5fb3ad48ce85bfc243af62227f891)) { foreach ($_73c5fb3ad48ce85bfc243af62227f891 as $_2a2c84245b756c832fbaf6b07cf228a3) { Mage::getModel('blastlucenesearch/blastlucenesearch')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b)->removeProductFromIndex($_2a2c84245b756c832fbaf6b07cf228a3, true); } } elseif(!empty($_73c5fb3ad48ce85bfc243af62227f891)) { Mage::getModel('blastlucenesearch/blastlucenesearch')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b)->removeProductFromIndex($_73c5fb3ad48ce85bfc243af62227f891, true); } } $_386d9d0214c6b169bf346ccb2d6f31ba = array(); foreach ($this->_getSearchableAttributes('static') as $_6942c6b0073f63228942697f5273b27f) { $_386d9d0214c6b169bf346ccb2d6f31ba[] = $_6942c6b0073f63228942697f5273b27f->getAttributeCode(); } $_2a772b93a02678f031ae52b244eab00f = array( 'int' => array_keys($this->_getSearchableAttributes('int')), 'varchar' => array_keys($this->_getSearchableAttributes('varchar')), 'text' => array_keys($this->_getSearchableAttributes('text')), ); $_f597a13143eabfd55154ca03615f37b6 = $this->_getSearchableAttribute('visibility'); $_347ac5f495f81b7bd398b65b3b312ddd = $this->_getSearchableAttribute('status'); $_4d11f9c1e5e870a472dd95c0cdfc19fe = Mage::getSingleton('catalog/product_visibility')->getVisibleInSearchIds(); $_1789936e38860e19d4bd9de9c653fef4 = Mage::getSingleton('catalog/product_status')->getVisibleStatusIds(); $_2a1bff294f96e0a98848fdc7bd37d41f = 0; $_ab550d05f43906b48b78cd1d6e016fcf = 0; while (true) { $_dbd2a99094650d96a7aac52ab7e5cc1d = intval(Mage::getStoreConfig('php4u/php4u_group/batch_size')); if ($_dbd2a99094650d96a7aac52ab7e5cc1d < 1 || $_dbd2a99094650d96a7aac52ab7e5cc1d > 1000) { $_dbd2a99094650d96a7aac52ab7e5cc1d = 100; } $_48a83c9b942475f1a828a651d9fe4b57 = $this->_getSearchableProducts($_a9f53c2ab70de1ada74a03ffc943a91b, $_386d9d0214c6b169bf346ccb2d6f31ba, $_73c5fb3ad48ce85bfc243af62227f891, $_2a1bff294f96e0a98848fdc7bd37d41f, $_dbd2a99094650d96a7aac52ab7e5cc1d); $_ab550d05f43906b48b78cd1d6e016fcf += count($_48a83c9b942475f1a828a651d9fe4b57); if (!$_48a83c9b942475f1a828a651d9fe4b57) { break; } Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[REBUILD] Getting another batch of ".count($_48a83c9b942475f1a828a651d9fe4b57)." products [in this run $_ab550d05f43906b48b78cd1d6e016fcf processed]"); $_af6376db5b98d59545a1e5883c7135bd = array(); $_d438df35ea341d57145a8a4e0317bd23 = array(); foreach ($_48a83c9b942475f1a828a651d9fe4b57 as $_a2a9e0bf2d96f0eeaad37668b9fc17a8) { $_2a1bff294f96e0a98848fdc7bd37d41f = $_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id']; $_af6376db5b98d59545a1e5883c7135bd[$_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id']] = $_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id']; $_81c91aa078cea37012b7905ee5d0eb9a = $this->_getProductChildIds($_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id'], $_a2a9e0bf2d96f0eeaad37668b9fc17a8['type_id']); $_d438df35ea341d57145a8a4e0317bd23[$_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id']] = $_81c91aa078cea37012b7905ee5d0eb9a; if ($_81c91aa078cea37012b7905ee5d0eb9a) { foreach ($_81c91aa078cea37012b7905ee5d0eb9a as $_9ec565887ef9ae3a3da0b1a0cc776c85) { $_af6376db5b98d59545a1e5883c7135bd[$_9ec565887ef9ae3a3da0b1a0cc776c85] = $_9ec565887ef9ae3a3da0b1a0cc776c85; } } } $_c2ec220e67e570614dd80aa5b04a15fb = array(); $_af6376db5b98d59545a1e5883c7135bd = $this->_getProductAttributes($_a9f53c2ab70de1ada74a03ffc943a91b, $_af6376db5b98d59545a1e5883c7135bd, $_2a772b93a02678f031ae52b244eab00f); foreach ($_48a83c9b942475f1a828a651d9fe4b57 as $_a2a9e0bf2d96f0eeaad37668b9fc17a8) { if (!isset($_af6376db5b98d59545a1e5883c7135bd[$_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id']])) { continue; } $_17846cefda97a7cba14f825a35530afd = $_af6376db5b98d59545a1e5883c7135bd[$_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id']]; if (!isset($_17846cefda97a7cba14f825a35530afd[$_f597a13143eabfd55154ca03615f37b6->getId()]) || !in_array($_17846cefda97a7cba14f825a35530afd[$_f597a13143eabfd55154ca03615f37b6->getId()], $_4d11f9c1e5e870a472dd95c0cdfc19fe)) { Mage::getModel('blastlucenesearch/blastlucenesearch')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b)->removeProductFromIndex($_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id']); continue; } if (!isset($_17846cefda97a7cba14f825a35530afd[$_347ac5f495f81b7bd398b65b3b312ddd->getId()]) || !in_array($_17846cefda97a7cba14f825a35530afd[$_347ac5f495f81b7bd398b65b3b312ddd->getId()], $_1789936e38860e19d4bd9de9c653fef4)) { Mage::getModel('blastlucenesearch/blastlucenesearch')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b)->removeProductFromIndex($_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id']); continue; } $_d30e8eec6983c6e09bfbbd31e10b8fa4 = array( $_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id'] => $_17846cefda97a7cba14f825a35530afd ); if ($_81c91aa078cea37012b7905ee5d0eb9a = $_d438df35ea341d57145a8a4e0317bd23[$_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id']]) { foreach ($_81c91aa078cea37012b7905ee5d0eb9a as $_9ec565887ef9ae3a3da0b1a0cc776c85) { if (isset($_af6376db5b98d59545a1e5883c7135bd[$_9ec565887ef9ae3a3da0b1a0cc776c85])) { $_d30e8eec6983c6e09bfbbd31e10b8fa4[$_9ec565887ef9ae3a3da0b1a0cc776c85] = $_af6376db5b98d59545a1e5883c7135bd[$_9ec565887ef9ae3a3da0b1a0cc776c85]; } } } $_086a32ee4e40e10ad48f9d6a7fda7a0d = $this->_prepareProductIndex($_d30e8eec6983c6e09bfbbd31e10b8fa4, $_a2a9e0bf2d96f0eeaad37668b9fc17a8, $_a9f53c2ab70de1ada74a03ffc943a91b); $_c2ec220e67e570614dd80aa5b04a15fb[$_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id']] = $_086a32ee4e40e10ad48f9d6a7fda7a0d; $this->_saveProductIndex($_a2a9e0bf2d96f0eeaad37668b9fc17a8['entity_id'], $_a9f53c2ab70de1ada74a03ffc943a91b, $_086a32ee4e40e10ad48f9d6a7fda7a0d, $this->_prepareProductDataLucene($_17846cefda97a7cba14f825a35530afd, $_a2a9e0bf2d96f0eeaad37668b9fc17a8)); } } $this->commitIndex($_a9f53c2ab70de1ada74a03ffc943a91b); if (is_null($_73c5fb3ad48ce85bfc243af62227f891)) { Mage::getModel('blastlucenesearch/blastlucenesearch')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b)->optimizeIndex(); } $this->resetSearchResults(); $_7368c1b79f84e151fa05ab5fc72cd8ad = round(microtime(true)-$_82be42ee6d55ddd256b0de85b8505fb1); if ($_7368c1b79f84e151fa05ab5fc72cd8ad==0) { $_7368c1b79f84e151fa05ab5fc72cd8ad = 1; } Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[REBUILD] **** Done in {$_7368c1b79f84e151fa05ab5fc72cd8ad} seconds, average ".round($_ab550d05f43906b48b78cd1d6e016fcf/$_7368c1b79f84e151fa05ab5fc72cd8ad). " products per second."); if (!$_73c5fb3ad48ce85bfc243af62227f891) { Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[REBUILD] Rebuilding 'Do you mean?' index... (this can be veery long for the first time), refer to separate log file for details"); $_92505ea8565cc18a633fed54fdb792d1 = Mage::getModel('blastlucenesearch/dym')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b); $_92505ea8565cc18a633fed54fdb792d1->indexDym(); } Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[REBUILD] **** 'Do you mean?' index - Done ****"); return $this; } private function _prepareProductDataLucene(array $_17846cefda97a7cba14f825a35530afd, array $_a2a9e0bf2d96f0eeaad37668b9fc17a8) { $_c8ed15d673ff89eba159aaa0776750eb = array('name','description','short_description','lucene_product_position'); $_69094964779c4bee5ffde0881842f3c1 = array(); foreach ($_c8ed15d673ff89eba159aaa0776750eb as $_1d85cbb0a18d35c43b2eb574c7f89338) { $_7f776c23415a0db9ae42de5ad9b3c37d = $this->_getSearchableAttribute($_1d85cbb0a18d35c43b2eb574c7f89338); if (is_object($_7f776c23415a0db9ae42de5ad9b3c37d)) { if (isset($_17846cefda97a7cba14f825a35530afd[$_7f776c23415a0db9ae42de5ad9b3c37d->getId()])) { $_69094964779c4bee5ffde0881842f3c1['product_'.$_1d85cbb0a18d35c43b2eb574c7f89338] = $_17846cefda97a7cba14f825a35530afd[$_7f776c23415a0db9ae42de5ad9b3c37d->getId()]; } } } if (isset($_a2a9e0bf2d96f0eeaad37668b9fc17a8['sku'])) { $_69094964779c4bee5ffde0881842f3c1['product_sku'] = $_a2a9e0bf2d96f0eeaad37668b9fc17a8['sku']; } return $_69094964779c4bee5ffde0881842f3c1; } protected function _getSearchableProducts($_a9f53c2ab70de1ada74a03ffc943a91b, array $_386d9d0214c6b169bf346ccb2d6f31ba, $_73c5fb3ad48ce85bfc243af62227f891 = null, $_2a1bff294f96e0a98848fdc7bd37d41f = 0, $_49a0e20894da78fdf48748b425ba9a9d = 100) { if (Mage::getSingleton('blastlucenesearch/blastlucenesearch')->isMagentoVerLess14() == TRUE) { $_c94876fd08288d5d746a27bebcf2b873 = $this->getEavConfig()->getEntityType('catalog_product'); $_19e880562f758fc29dff511245c5ca11 = Mage::app()->getStore($_a9f53c2ab70de1ada74a03ffc943a91b); $_a1dc44237e766c015ba7f41a308692c3 = $this->_getReadAdapter()->select() ->from( array('e' => $this->getTable('catalog/product')), array_merge(array('entity_id', 'type_id'), $_386d9d0214c6b169bf346ccb2d6f31ba)) ->joinInner( array('website' => $this->getTable('catalog/product_website')), $this->_getReadAdapter()->quoteInto('website.product_id=e.entity_id AND website.website_id=?', $_19e880562f758fc29dff511245c5ca11->getWebsiteId()), array() ); if (!is_null($_73c5fb3ad48ce85bfc243af62227f891)) { $_a1dc44237e766c015ba7f41a308692c3->where('e.entity_id IN(?)', $_73c5fb3ad48ce85bfc243af62227f891); } if (Mage::getStoreConfigFlag('php4u/php4u_group/php4u_lucene_onlynew',Mage::app()->getStore())) { $_50199f2ef9bddc16e38f7be2f63281af = Mage::getResourceModel('eav/entity_attribute')->getIdByCode('catalog_product','lucene_indexed'); $_a1dc44237e766c015ba7f41a308692c3 ->joinLeft( array('lucene_status' => Mage::getSingleton('core/resource')->getTableName('catalog_product_entity_int')), '(lucene_status.entity_id=e.entity_id AND lucene_status.store_id='.$_19e880562f758fc29dff511245c5ca11->getId().' AND lucene_status.attribute_id = '.$_50199f2ef9bddc16e38f7be2f63281af . ')', array('lucene_indexed' => 'value') ); $_a1dc44237e766c015ba7f41a308692c3->where('(lucene_status.value = ? OR lucene_status.value IS NULL)', 0); } $_a1dc44237e766c015ba7f41a308692c3->where('e.entity_id>?', $_2a1bff294f96e0a98848fdc7bd37d41f) ->limit($_49a0e20894da78fdf48748b425ba9a9d) ->order('e.entity_id'); return $this->_getReadAdapter()->fetchAll($_a1dc44237e766c015ba7f41a308692c3); } $_19e880562f758fc29dff511245c5ca11 = Mage::app()->getStore($_a9f53c2ab70de1ada74a03ffc943a91b); $_a1dc44237e766c015ba7f41a308692c3 = $this->_getWriteAdapter()->select() ->useStraightJoin(true) ->from( array('e' => $this->getTable('catalog/product')), array_merge(array('entity_id', 'type_id'), $_386d9d0214c6b169bf346ccb2d6f31ba)) ->join( array('website' => $this->getTable('catalog/product_website')), $this->_getWriteAdapter()->quoteInto('website.product_id=e.entity_id AND website.website_id=?', $_19e880562f758fc29dff511245c5ca11->getWebsiteId()), array() ) ->join( array('stock_status' => $this->getTable('cataloginventory/stock_status')), $this->_getWriteAdapter()->quoteInto('stock_status.product_id=e.entity_id AND stock_status.website_id=?', $_19e880562f758fc29dff511245c5ca11->getWebsiteId()), array('in_stock' => 'stock_status') ); if (!is_null($_73c5fb3ad48ce85bfc243af62227f891)) { $_a1dc44237e766c015ba7f41a308692c3->where('e.entity_id IN(?)', $_73c5fb3ad48ce85bfc243af62227f891); } $_a1dc44237e766c015ba7f41a308692c3->where('e.entity_id>?', $_2a1bff294f96e0a98848fdc7bd37d41f) ->limit($_49a0e20894da78fdf48748b425ba9a9d) ->order('e.entity_id'); if (Mage::getStoreConfigFlag('php4u/php4u_group/php4u_lucene_onlynew',Mage::app()->getStore())) { $_50199f2ef9bddc16e38f7be2f63281af = Mage::getResourceModel('eav/entity_attribute')->getIdByCode('catalog_product','lucene_indexed'); $_a1dc44237e766c015ba7f41a308692c3 ->joinLeft( array('lucene_status' =>Mage::getSingleton('core/resource')->getTableName('catalog_product_entity_int')), '(lucene_status.entity_id=e.entity_id AND lucene_status.store_id='.$_19e880562f758fc29dff511245c5ca11->getId().' AND lucene_status.attribute_id = '.$_50199f2ef9bddc16e38f7be2f63281af . ')', array('lucene_indexed' => 'value') ); $_a1dc44237e766c015ba7f41a308692c3->where('(lucene_status.value = ? OR lucene_status.value IS NULL)', 0); } $_cd6a9b4d5da4cce905e797fb532bc53f = $this->_getWriteAdapter()->fetchAll($_a1dc44237e766c015ba7f41a308692c3); if ($this->_engine && $this->_engine->allowAdvancedIndex() && count($_cd6a9b4d5da4cce905e797fb532bc53f) > 0) { return $this->_engine->addAdvancedIndex($_cd6a9b4d5da4cce905e797fb532bc53f, $_a9f53c2ab70de1ada74a03ffc943a91b, $_73c5fb3ad48ce85bfc243af62227f891); } else { return $_cd6a9b4d5da4cce905e797fb532bc53f; } } protected function _saveProductIndex($_f61aef45a20fbd738fc86ef33567b186, $_a9f53c2ab70de1ada74a03ffc943a91b, $_086a32ee4e40e10ad48f9d6a7fda7a0d, array $_9683a0297847f42da908a85257e2021d = array()) { $_086a32ee4e40e10ad48f9d6a7fda7a0d = $_086a32ee4e40e10ad48f9d6a7fda7a0d . $this->_addTags($_f61aef45a20fbd738fc86ef33567b186, $_a9f53c2ab70de1ada74a03ffc943a91b); $_086a32ee4e40e10ad48f9d6a7fda7a0d = $_086a32ee4e40e10ad48f9d6a7fda7a0d . $this->_getProductCategoryNames($_f61aef45a20fbd738fc86ef33567b186, $_a9f53c2ab70de1ada74a03ffc943a91b); $_9683a0297847f42da908a85257e2021d['data'] = $_086a32ee4e40e10ad48f9d6a7fda7a0d; Mage::getModel('blastlucenesearch/blastlucenesearch')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b)->addProductToIndex($_f61aef45a20fbd738fc86ef33567b186, $_9683a0297847f42da908a85257e2021d, true, false); if(function_exists('gc_collect_cycles')) { gc_collect_cycles(); } return $this; } protected function _getProductCategoryNames($_f61aef45a20fbd738fc86ef33567b186, $_a9f53c2ab70de1ada74a03ffc943a91b) { if ($_f61aef45a20fbd738fc86ef33567b186 < 1) { return ; } $_dde611bf76615801c5bc35efa7831e91 = ''; if (Mage::getStoreConfigFlag('php4u/php4u_group/php4u_add_category_names', $_a9f53c2ab70de1ada74a03ffc943a91b) === TRUE) { $_01a2830e282fcf8f50b68e60f7e70dd8 = Mage::app()->getStore()->getId(); Mage::app()->setCurrentStore($_a9f53c2ab70de1ada74a03ffc943a91b); $_product = Mage::getModel('catalog/product')->load($_f61aef45a20fbd738fc86ef33567b186); $_2a3b80f84f5381bfd88eb46bf2246f38 = $_product->getCategoryIds(); foreach($_2a3b80f84f5381bfd88eb46bf2246f38 as $_430eacafeb640c5522eb5a5e41bb164c) { $_22a6061ed28bc08c07fc6cff0cc7e60b = Mage::getModel('catalog/category')->load($_430eacafeb640c5522eb5a5e41bb164c); $_dde611bf76615801c5bc35efa7831e91 .= ' '.$_22a6061ed28bc08c07fc6cff0cc7e60b->getName(); } Mage::app()->setCurrentStore($_01a2830e282fcf8f50b68e60f7e70dd8); } else { } return $_dde611bf76615801c5bc35efa7831e91; } protected function _saveProductIndexes($_a9f53c2ab70de1ada74a03ffc943a91b, $_c2ec220e67e570614dd80aa5b04a15fb) { foreach ($_c2ec220e67e570614dd80aa5b04a15fb as $_f61aef45a20fbd738fc86ef33567b186 => &$_086a32ee4e40e10ad48f9d6a7fda7a0d) { $this->_saveProductIndex($_f61aef45a20fbd738fc86ef33567b186, $_a9f53c2ab70de1ada74a03ffc943a91b, $_086a32ee4e40e10ad48f9d6a7fda7a0d); } Mage::getSingleton('blastlucenesearch/blastlucenesearch')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b)->optimizeIndex(); return $this; } public function cleanIndex($_a9f53c2ab70de1ada74a03ffc943a91b = null, $_f61aef45a20fbd738fc86ef33567b186 = null) { Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[REBUILD] Cleaning index for StoreId $_a9f53c2ab70de1ada74a03ffc943a91b"); if (!is_null($_f61aef45a20fbd738fc86ef33567b186)) { if (is_null($_a9f53c2ab70de1ada74a03ffc943a91b)) { foreach (Mage::app()->getStores(false) as $_19e880562f758fc29dff511245c5ca11) { Mage::getSingleton('blastlucenesearch/blastlucenesearch')->setStoreId($_19e880562f758fc29dff511245c5ca11->getId())->removeProductFromIndex($_f61aef45a20fbd738fc86ef33567b186); } } else { Mage::getSingleton('blastlucenesearch/blastlucenesearch')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b)->removeProductFromIndex($_f61aef45a20fbd738fc86ef33567b186); } } else { if (is_null($_a9f53c2ab70de1ada74a03ffc943a91b)) { foreach (Mage::app()->getStores(false) as $_19e880562f758fc29dff511245c5ca11) { Mage::getSingleton('blastlucenesearch/blastlucenesearch')->setStoreId($_19e880562f758fc29dff511245c5ca11->getId())->removeAll(); } } else { Mage::getSingleton('blastlucenesearch/blastlucenesearch')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b)->removeAll(); } } return $this; } public function commitIndex($_a9f53c2ab70de1ada74a03ffc943a91b) { Mage::getSingleton('blastlucenesearch/blastlucenesearch')->setStoreId($_a9f53c2ab70de1ada74a03ffc943a91b)->getIndex()->commit(); } public function resetSearchResults() { if (Mage::getModel('blastlucenesearch/blastlucenesearch')->isMagentoVer16orMore()) { return $this->resetSearchResultsNew(); } $this->beginTransaction(); try { $this->_getWriteAdapter()->update($this->getTable('catalogsearch/search_query'), array('is_processed' => 0)); if (Mage::getStoreConfigFlag('php4u/php4u_group/php4u_allow_mag_clear_results')) { $this->_getWriteAdapter()->query('TRUNCATE TABLE ' . $this->getTable('catalogsearch/result')); Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[CLEANER] Search results truncated as per config"); } else { Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[CLEANER] Search results not truncated as per config"); } $this->commit(); } catch (Exception $_511e5ea00710a589453ce1422151405b) { $this->rollBack(); throw $_511e5ea00710a589453ce1422151405b; } Mage::dispatchEvent('catalogsearch_reset_search_result'); return $this; } public function resetSearchResultsNew() { $_f6470b78e57e10004de0af1f7e4f567f = $this->_getWriteAdapter(); $_f6470b78e57e10004de0af1f7e4f567f->update($this->getTable('catalogsearch/search_query'), array('is_processed' => 0)); if (Mage::getStoreConfigFlag('php4u/php4u_group/php4u_allow_mag_clear_results')) { $_f6470b78e57e10004de0af1f7e4f567f->delete($this->getTable('catalogsearch/result')); Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[CLEANER] Search results truncated as per config"); } else { Mage::getModel('blastlucenesearch/blastlucenesearch')->log("[CLEANER] Search results not truncated as per config"); } Mage::dispatchEvent('catalogsearch_reset_search_result'); return $this; } }
?>