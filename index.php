<?session_start();
// Захват UTM-меток напрямую
if(!isset($_SESSION['utms'])) {
    $_SESSION['utms'] = array();
    $_SESSION['server'] = array();
    $_SESSION['utms']['utm_source'] = '';
    $_SESSION['utms']['utm_medium'] = '';
    $_SESSION['utms']['utm_term'] = '';
    $_SESSION['utms']['utm_content'] = '';
    $_SESSION['utms']['utm_campaign'] = '';
}
$_SESSION['utms']['utm_source'] = $_GET['utm_source'];
$_SESSION['utms']['utm_medium'] = $_GET['utm_medium'];
$_SESSION['utms']['utm_term'] = $_GET['utm_term'];
$_SESSION['utms']['utm_content'] = $_GET['utm_content'];
$_SESSION['utms']['utm_campaign'] = $_GET['utm_campaign'];
$_SESSION['server']['referer'] = $_SERVER['HTTP_REFERER'];
require_once ('config.php');require_once (CLASS_PATH.'/favicon.class.php'); 
 if ($_GET['id']!="") include("product.php"); else include('vitrina.php');
?>