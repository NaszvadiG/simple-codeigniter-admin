<script type="text/javascript">
$(document).ready(function(){
	$("#register").validate();
	$("#login_form").validate();
	$("#forget_password_form").validate();
});
</script>

<table width="100%" border="0" cellspacing="10" cellpadding="0">
<?php if(isset($status)){?> 
    <tr>
        <td colspan="2" valign="top"><div class="<?php echo $status['result'];?>"><?php echo $status['message'];?></div></td>
    </tr>
<?php } ?>
  <tr>
    <td width="71%" valign="top" class="bord tdvalign textdivpad"><form action="<?php echo ROOT_FOLDER?>login/register" id="register" method="post">
        <table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td colspan="6"><a class="linker">Be the first to know the updates. <span style="text-decoration:blink; color:red;">Please Register</span></a></td>
          </tr>
          <tr>
            <td class="p">&nbsp;</td>
            <td class="p">First Name</td>
            <td class="p"><input type="text" name="usr_fname" id="usr_fname" class="required" title=" " tabindex="1" ></td>
            <td class="p">Last Name</td>
            <td class="p"><input type="text" name="usr_lname" id="usr_lname" class="required" title=" " tabindex="2" ></td>
            <td width="14%" rowspan="3" class="p"><input type="submit" value="Register" name="register"  tabindex="7" ></td>
          </tr>
          <tr>
            <td width="9%" class="p">&nbsp;</td>
            <td width="12%" class="p"><p>Email</p></td>
            <td width="26%" class="p"><p>
                <input type="text" name="usr_email" id="usr_email" class="required" title=" " email="true" tabindex="3"  >
              </p></td>
            <td width="16%" class="p">Confirm Email</td>
            <td width="23%" class="p"><input type="text" name="usr_confi_email" class="required" equalTo="#usr_email" title=" "  id="usr_confi_email" email="true" tabindex="4" ></td>
          </tr>
          <tr>
            <td class="p">&nbsp;</td>
            <td class="p">Password</td>
            <td class="p"><input type="password" name="usr_password" id="usr_password" class="required" title=" " tabindex="5" ></td>
            <td class="p">Confirm Password</td>
            <td class="p"><input type="password" name="usr_confi_password" id="usr_confi_password" equalTo="#usr_password" title=" " tabindex="6" class="required" ></td>
          </tr>
          <tr>
            <td class="p">&nbsp;</td>
            <td class="p">&nbsp;</td>
            <td class="p">&nbsp;</td>
            <td class="p">&nbsp;</td>
            <td class="p">&nbsp;</td>
            <td class="p">&nbsp;</td>
          </tr>
        </table>
      </form></td>
    <td width="28%" valign="top" class="bord"><table width="100%" border="0" cellspacing="10" cellpadding="0">
    <?php if(isset($resetpassword)){?>
        <tr>
          <td>
          <form action="<?php echo ROOT_FOLDER;?>login/resetpassword" method="post" id="resetpassword_form">
              <table width="100%" border="0" cellspacing="5" cellpadding="0" id="resetpassword_table">
                <tr>
                  <td colspan="2"><a class="linker">Reset Password</a></td>
                </tr>
                <tr>
                  <td width="50%" class="p">Enter new Password</td>
                  <td width="50%" class="p"><p>
                      <input type="password" name="new_password" id="new_password" class="required" email="true" title=" " >
                    </p></td>
                </tr>
                <tr>
                  <td class="p">Please re enter same password</td>
                  <td class="p"><input type="password" name="confi_new_password" id="confi_new_password" equalTo="#new_password" class="required" title=" " ></td>
                </tr>
                <tr>
                  <td></td>
                  <td class="p"><input type="submit" value="Reset & Login" name="submit" ></td>
                </tr>
                <tr>
                  <td class="p">&nbsp;</td>
                  <td class="p">&nbsp;</td>
                </tr>
              </table>
          </form></td>
        </tr>
        <?php }else { ?>
        <tr>
          <td>
          <form action="<?php echo ROOT_FOLDER;?>login/validatelogin" method="post" id="login_form">
              <table width="100%" border="0" cellspacing="5" cellpadding="0" id="login_table">
                <tr>
                  <td colspan="2"><a class="linker">Login Here</a></td>
                </tr>
                <tr>
                  <td width="50%" class="p">Email Id</td>
                  <td width="50%" class="p"><p>
                      <input type="text" name="username" id="username" class="required" email="true" title=" " tabindex="8" >
                    </p></td>
                </tr>
                <tr>
                  <td class="p">Pass word</td>
                  <td class="p"><input type="password" name="password" id="password" class="required" title=" "  tabindex="9" ></td>
                </tr>
                <tr>
                  <td></td>
                  <td class="p"><input type="submit" value="Login" name="submit" tabindex="10" ></td>
                </tr>
                <tr>
                  <td class="p">&nbsp;</td>
                  <td class="p"><a class="yellow-text-underline" onclick="$('#login_table').hide(); $('#forget_password_table').show();">Forget Password</a></td>
                </tr>
              </table>
          </form></td>
        </tr>
        <tr>
          <td><form action="<?php echo ROOT_FOLDER;?>login/forgetpassword" method="post" id="forget_password_form">
              <table width="100%" border="0" cellspacing="5" cellpadding="0" id="forget_password_table" style="display:none;">
                <tr>
                  <td colspan="2"><a class="linker">Forget Password</a></td>
                </tr>
                <tr>
                  <td width="50%" class="p">Email Id</td>
                  <td width="50%" class="p"><p>
                      <input type="text" name="forget_password_email" id="forget_password_email" class="required" email="true" title=" " tabindex="11" >
                    </p></td>
                </tr>
                <tr>
                  <td></td>
                  <td class="p"><input type="submit" value="Send Reset Link" name="submit" tabindex="12" ></td>
                </tr>
                <tr>
                  <td class="p">&nbsp;</td>
                  <td class="p"><a class="yellow-text-underline" onclick="$('#forget_password_table').hide(); $('#login_table').show();">Show Login</a></td>
                </tr>
              </table>
          </form></td>
        </tr>
        <?php } ?>
      </table></td>
  </tr>
  <tr>
    <td valign="top" class="bord" style="vertical-align:top; text-align:left;padding:10px;"><p><a class="linker">New Items</a></p>
    <ul type="square">
    	<li><a href="<?php echo DOWNLOADS;?>">Anna University old question papers</a><img src="<?php echo IMAGES_FOLDER.'new.gif'?>" alt="New" ></li>
    </ul></td>
    <td	valign="top" class="bord"><?php echo $ads['middleleftbig'];?></td>
  </tr>
</table>
