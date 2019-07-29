    <?php defined('BASEPATH') OR exit('No direct script access allowed');
class Searchlist extends CI_Controller{
	
    public function __construct() {
        parent::__construct();
		$this->load->database();
    }
	
public function index() {
	if(!empty($_POST["keyword"])) {
		$search = $_POST['keyword'];
		
		$query = $this->db->query("SELECT * FROM product WHERE name like'%".$search."%' ORDER BY name");
		$result = $query->result_array();
		
		if(sizeof($result)>0) {
?>
	<ul id="product-list">
		<?php foreach($result as $product) { ?>
		<li onclick="productlist('<?php echo $product["product_name"]; ?>');">
		<?php echo $product["product_name"]; ?></li>
		<?php } ?>
	</ul>
<?php } } } }?>
