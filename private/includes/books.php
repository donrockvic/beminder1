  <?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'sql.php');
 
class books extends Database {
	
protected static $table_name="books";
protected static $db_fields = array('id','title','author','publisher','dess','image','amount','price','rent','sprice','erent','discount','ISBN1','ISBN2','type','subtype','lasttype','dates','uploader','skeys');
 	
public  static $types = array('e'=>'Engineering','em'=>'Econimics & Management','m'=>'Medical',
							 'gh'=>'General interest/Self help','lt'=>'Literature','cm'=>'Competative Exam');
							 
public static $e = array( 'civil'=>'Civil Engineering','cse'=>'Computer Science & Engineering',
						   'ece'=>'Electronics & Communication Engineering','ee'=>'Electrical Engineering',
						   'eee'=>'Electonics and Electrical Engineering','me'=>'Mechanical Engineering',
						   'it'=>'Information Technology','pt'=>'Petroluem Engineering',
						   'mm'=>'Mining Engineering','lt'=>'Leather Engineering',
						   'cm'=>'Chemical Engineering','oth'=>'Other');
public static $em = array('mng'=>'Management','mkt'=>'Marketing','hr'=>'Human Resource',
							 'fr'=>'Finance','com'=>'Communication','cm'=>'Commerce',
							 'em'=>'Economics','hs'=>'Home Science','os'=>'Other');
public static $m = array('bot'=>'Botany','zoo'=>'Zoology','phy'=>'Physichology');
public static $gh = array('bio'=>'Biographics','hm'=>'Humour','sp'=>'Spiritual',
							'pt'=>'Parenting','rp'=>'Religion & philosophy','hs'=>'Historical',
							'ps'=>'Political','gg'=>'Geographical','gr'=>'General',
							'mst'=>'Music sports & travel',	'md'=>'Media');
public static $lt = array('fr'=>'Friction','nfr'=>'Nn-friction','nv'=>'Novel',
							'es'=>'Essay','sy'=>'Shayari','py'=>'Poetry',
							'play'=>'Play','str'=>'Stories','cb'=>'Childrens book');
public static $cm = array('gate'=>'GATE','psus'=>'PSUs','es'=>'ESE','bank'=>'Banking',
							'general'=>'General','medical'=>'Medical','cat'=>'CAT',
							'upsc'=>'UPSC',	'mains'=>'IIT(MAINS)','advance'=>'IIT(ADVANCE)');

public static $subtypes = array('civil'=>'Civil Engineering','cse'=>'Computer Science & Engineering',
						   'ece'=>'Electronics & Communication Engineering','ee'=>'Electrical Engineering',
						   'eee'=>'Electonics and Electrical Engineering','me'=>'Mechanical Engineering',
						   'it'=>'Information Technology','pt'=>'Petroluem Engineering',
						   'mm'=>'Mining Engineering','lt'=>'Leather Engineering',
						   'cm'=>'Chemical Engineering','oth'=>'Other',
						   'mng'=>'Management','mkt'=>'Marketing','hr'=>'Human Resource',
							 'fr'=>'Finance','com'=>'Communication','cm'=>'Commerce',
							 'em'=>'Economics','hs'=>'Home Science','os'=>'Other',
							 'bot'=>'Botany','zoo'=>'Zoology','phy'=>'Physichology',
							'bio'=>'Biographics','hm'=>'Humour','sp'=>'Spiritual',
							'pt'=>'Parenting','rp'=>'Religion & philosophy','hs'=>'Historical',
							'ps'=>'Political','gg'=>'Geographical','gr'=>'General',
							'mst'=>'Music sports & travel',	'md'=>'Media',
							'fr'=>'Friction','nfr'=>'Nn-friction','nv'=>'Novel',
							'es'=>'Essay','sy'=>'Shayari','py'=>'Poetry','play'=>'Play','str'=>'Stories',
							'cb'=>'Childrens book','gate'=>'GATE','psus'=>'PSUs','es'=>'ESE','bank'=>'Banking',
							'general'=>'General','medical'=>'Medical','cat'=>'CAT',
							'upsc'=>'UPSC',	'mains'=>'IIT(MAINS)','advance'=>'IIT(ADVANCE)');
								
 
	public $id;
	public $title="";
	public $author="";
	public $publisher="";
	public $dess="";
	public $image=""; 
	public $amount="";
	public $price="";
	public $rent="";
	public $sprice="";
	public $erent="";
	public $discount="";
	public $ISBN1="";
	public $ISBN2="";
	public $type="";
	public $subtype="";
	public $lasttype="";
	public $dates="";	
	public $con="";
	public $uploader="";
	public $skeys="";
	
	 public static function find_by_uploader($uploader="") {
         return static::find_by_sql("SELECT * FROM books WHERE uploader='{$uploader}'");
	 }
	 public static function find_by_author($author="") {
         return static::find_by_sql("SELECT * FROM books WHERE author='{$author}'");
	 }
	 
	 public static function search($queryies="") {
		 $terms = explode(" ",$queryies);
		 $query="SELECT * FROM books WHERE ";
		 $i=1;
		 foreach ($terms as $each){
			if($i == 1){
				$query .= "skeys LIKE '%$each%' ";	
			}else{
				$query .= "OR skeys LIKE '%$each%' ";	
			}
			$i++;
		}
		 
         return static::find_by_sql($query);
	 }
	 
}
$books = new books();
?>
