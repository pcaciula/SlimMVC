<?php
  namespace MyApp\Config;
  
  class PhpConfig
  {
      protected static $ini_keys = array(
          'display_startup_errors', 'display_errors',
          'html_errors', 'log_errors','ignore_repeated_errors', 
          'ignore_repeated_source','report_memleaks','track_errors',
          'docref_root', 'docref_ext'=>'0','error_reporting','log_errors_max_len',
		      'upload_max_filesize','post_max_size','memory_limit'
      );
      
      protected static $dev_vals = array('on','on','on','on','off','off','on','on','0','0','-1','0','300M','300M','300M');
      protected static $prd_vals = array('off','off','off','on','off','off','on','on','0','0','-1','0','300M','300M','300M');
  
      protected static $log_path =  '/errors.txt';
  
	    static function setTimeZone(){date_default_timezone_set ('America/New_York');}
      static function setInis($mode = 'dev')
      {
          ini_set('auto_detect_line_endings', TRUE);
          $vals = (substr(strtolower($mode),0,3) == 'dev') ? self::$dev_vals : self::$prd_vals;
          $settings = array_combine(self::$ini_keys,$vals); 
          foreach($settings as $ini_key => $val){
               ini_set($ini_key,$val);
          }
      }
      
      static function setErrLog($path = null)
      {
        $log_path = ($path != null) ? $path : LOGS_PATH .  self::$log_path;
        ini_set('error_log',$path);
      }
  }
          
