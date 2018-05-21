<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title><?= APPNAME; ?></title>
   </head>
   <!-- background-image:url(bg-color600.png);-->
   <body style="background-color:#e1e1e1;">
      <div class="container" style="max-width:767px; width:100%; margin:0 auto;">
      <table align="center" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px; box-shadow: -1px 2px 7px 1px #999;">
         <tr bgcolor="" style="padding:0 15px;">
            <td align="center" bgcolor="#fff" style="padding:0;  background-color:#fff; background-repeat:no-repeat; background-size:cover;" cellpadding="0" cellspacing="0">
               <table style="font-family: sans-serif;  " width="100%">
                  <tr>
                     <td style=""><img src="<?= base_url('/assets/images/logo.png'); ?>" alt="" style="display: block;margin: 8px auto;width: 180px; padding:10px 0 140px;">
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr bgcolor="#1f497d" style="padding:0 15px;">
            <td align="center" bgcolor="#1f497d" style="padding:0;" cellpadding="0" cellspacing="0">
               <table style="font-family: sans-serif; max-width:500px; margin:-120px 40px 20px; background-color: #fff; box-shadow:1px 3px 9px 4px rgba(0,0,0,0.3);" width="100%" cellpadding="0" cellspacing="0">
                  <tr>
                     <td>
                        <table style="font-family: sans-serif;margin-bottom: 0;" cellpadding="0" cellspacing="0">
                           <tr bgcolor="#fff" style="">
                              <td style="padding:30px  40px 30px;">
                                 <table style="font-family: sans-serif;" width="100%">
                                    <tr>
                                       <td width="100%">
                                          <p style="font-size:16px;margin:4px 0;margin: 0 0;">Hello, <strong style="font-size:20px;color:#1f497d;"><?= $user_name; ?></strong></p>
                                          </h4>
                                          <div style="padding-top:20px;">
                                             <div style="font-size:14px;">
                                                <p>Your account has been created with Mula.</p>
                                                <p><strong>Username : </strong><?= $username; ?></p>
                                                <p><strong>Password : </strong><?= $password; ?></p>
                                                <p> Click <a href="<?= base_url(); ?>">Here</a> for login.</p>
                                             </div>
                                          </div>
                                       </td>
                                    </tr>
                                 </table>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td>
                        <table bgcolor="#fff" style="font-family: sans-serif; background-color:#fff;" width="100%;" cellpadding="0" cellspacing="0">
                           <tr bgcolor="">
                              <td style="text-align:left; background-color:#fff; padding:0 40px;">
                                 <div style="padding-bottom:10px;">
                                    <div style="margin:10px  0 0;">
                                       <p style="margin:0;">Thank you</p>
                                       <h5 style="margin:0;color:#505050;font-size:16px; font-weight:normal;">
                                          <a href="#" style="color:#1f497d; font-weight: bold;">mula.com</a>
                                       </h5>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <tr bgcolor="#fff">
                              <td>
                           <tr>
                              <td style="color:#333; background-color:#fff; border-top:1px solid #ddd;">
                                 <p style="margin:0;font-size:12px;padding:11px 40px;text-align:center;">&copy; Copyright <?= date("Y"); ?> MULA Pvt. Ltd. | All Rights Reserved.</p>
                              </td>
                           </tr>
                           </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr bgcolor="#1f497d" style="padding:0 15px;">
            <td align="center" bgcolor="#1f497d" style="padding:0;" cellpadding="0" cellspacing="0">
               <br>
             
            </td>
         </tr>
      </table>
   </body>
</html>