<!--edit by lcn 20220829 for accessbility --!>
<!--h2 style="display:none;">Login</h2--!>
<fieldset class="pad10">
    <legend class="bold"><h2><{$lang_login}></h2></legend>
	
	<!--edit by lcn 20220906 show login err msg and focus--!>
    <{if $x_login_err}>	
	<span id='login-err-msg' style="color:red;font-weight:bold;" tabindex="0"><{$x_login_err}></span>
	<script>
	document.getElementById("login-err-msg").focus(); 
	</script>
    <{/if}>
	
	<form  id="login_form" action="user.php" method="post" onclick="return false">
        <label for="uname"><{$lang_username}></label> <input  type="text" id="uname" title="uname" name="uname" placeholder="<{$smarty.const.THEME_LOGIN}>-此欄位必填" size="15" maxlength="15" value=""/><br><br>
        <label for="pass"><{$lang_password}></label>  <input  type="password" id="pass" title="pass" name="pass" placeholder="<{$smarty.const.THEME_PASS}>-此欄位必填" size="15" maxlength="15"/><br><br>
        <{if isset($lang_rememberme)}>
            <input type="checkbox" id="rememberme" title="rememberme" name="rememberme" value="On" checked/>
            <label for="rememberme"><{$lang_rememberme}></label>
            <br>
            <br>
        <{/if}>

        <input type="hidden" name="op" value="login"/>
        <input type="hidden" name="xoops_redirect" value="<{$redirect_page}>"/>
        <input type="submit" id="login_button" title="<{$lang_login}>" value="<{$lang_login}>"/>
    </form>
    <br>
    <a name="lost">&nbsp;</a>

    <!--div><{$lang_notregister}><br></div--!>
</fieldset>

<br>

<!--fieldset class="pad10">
    <legend class="bold"><{$lang_lostpassword}></legend>
    <div><br><{$lang_noproblem}></div>
    <form action="lostpass.php" method="post">
        <label for="email"><{$lang_youremail}></label> <input type="text" id="email" title="email" name="email" size="26" maxlength="60"/>&nbsp;&nbsp;<input type="hidden" name="op" value="mailpasswd"/><input type="hidden" name="t" value="<{$mailpasswd_token}>"/><input type="submit" title="sendpassword" value="<{$lang_sendpassword}>"/>
    </form>
</fieldset--!>


<script>
 $(document).ready(function(){
    $("#login_button").click(function(){
        if($("#uname").val()==""){
            alert("您尚未輸入帳號，請輸入帳號");
            document.getElementById("uname").focus();
        }else if($("#pass").val()==""){
            alert("您尚未輸入密碼，請輸入密碼");
            document.getElementById("pass").focus();            
        }else{
            document.getElementById("login_form").submit();
        }
    })
 })
</script>
