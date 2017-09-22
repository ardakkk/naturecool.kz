<?php
include_once($_SERVER['DOCUMENT_ROOT']."/api/db/Db.php");

$email = trim($_GET['email']);
$fullname = trim($_GET['fullname']);
$phone_number = trim($_GET['phone_number']);

try {
  $db = Db::getConnection();
  $sql = 'INSERT INTO email_send (fullname, email, phone) VALUES (:fullname, :email, :phone)';

  $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
  $result = $db->prepare($sql);

  $result->bindParam(':fullname', $fullname, PDO::PARAM_STR);
  $result->bindParam(':email', $email, PDO::PARAM_STR);
  $result->bindParam(':phone', $phone_number, PDO::PARAM_STR);

  if($result->execute()) {
      echo "Успешно сохранено<br/>";
      /*Отправка на email*/
      $to      = $email;
      $subject = 'Вы выиграли приз на сайте Bosch NatureCool: получите Ваш приз!';
      $message = "<html>
      <head><title>Письмо BOSH</title>
         <style>
            .im {
               color: #f2e5c7!important;
           }
       </style>
   </head>
   <body style='font-family: Arial; margin: 0; -webkit-text-size-adjust:none;'>
     <table border='0' cellpadding='0' cellspacing='0' width='600px'>
        <tbody><tr>
            <td valign='top' id='m_-3358751476074059544templatePreheader'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnTextBlock' style='min-width:100%'>
                <tbody class='m_-3358751476074059544mcnTextBlockOuter'>
                    <tr>
                        <td valign='top' class='m_-3358751476074059544mcnTextBlockInner' style='padding-top:9px'>

                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:210px' width='100%' class='m_-3358751476074059544mcnTextContentContainer'>
                                <tbody><tr>

                                    <td valign='top' class='m_-3358751476074059544mcnTextContent' style='padding-top:0;padding-left:18px;padding-bottom:9px;padding-right:18px'>


                                    </td>
                                </tr>
                            </tbody></table>



                        </td>
                    </tr>
                </tbody>
            </table></td>
        </tr>
        <tr>
            <td valign='top' id='m_-3358751476074059544templateHeader'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnImageBlock' style='min-width:100%'>
                <tbody class='m_-3358751476074059544mcnImageBlockOuter'>
                    <tr>
                        <td valign='top' style='padding:9px' class='m_-3358751476074059544mcnImageBlockInner'>
                            <table align='left' width='100%' border='0' cellpadding='0' cellspacing='0' class='m_-3358751476074059544mcnImageContentContainer' style='min-width:100%'>
                                <tbody><tr>
                                    <td class='m_-3358751476074059544mcnImageContent' valign='top' style='padding-right:9px;padding-left:9px;padding-top:0;padding-bottom:0;text-align:center'>


                                        <img align='center' alt='' src='https://ci4.googleusercontent.com/proxy/iYcKMCc95EDFj1j9iiypOeT4JQ7NlmUxFKZnHauyckllgHeYb-LDiRwUztqVnGDao66efwJrpIaYZSuYFaBChWnKCjZTbuwidAr-HcKd7Drb8e3LSfrKE2KL0_vxMNcMTJrm84rRSxYReFQwmK-GZX0WQkzZJFufmKbbDmQ=s0-d-e1-ft#https://gallery.mailchimp.com/579bf52ef77c8c3aa857ec211/images/c6b49022-a767-4016-adf1-2f2151335f94.jpg' width='564' style='max-width:1400px;padding-bottom:0;display:inline!important;vertical-align:bottom' class='m_-3358751476074059544mcnImage CToWUd a6T' tabindex='0'><div class='a6S' dir='ltr' style='opacity: 0.01; left: 641.5px; top: 333.984px;'><div id=':7f' class='T-I J-J5-Ji aQv T-I-ax7 L3 a5q' role='button' tabindex='0' aria-label='Скачать файл ' data-tooltip-class='a1V' data-tooltip='Скачать'><div class='aSK J-J5-Ji aYr'></div></div></div>


                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody>
            </table></td>
        </tr>
        <tr>
            <td valign='top' id='m_-3358751476074059544templateBody'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnTextBlock' style='min-width:100%'>
                <tbody class='m_-3358751476074059544mcnTextBlockOuter'>
                    <tr>
                        <td valign='top' class='m_-3358751476074059544mcnTextBlockInner' style='padding-top:9px'>



                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%;min-width:100%' width='100%' class='m_-3358751476074059544mcnTextContentContainer'>
                                <tbody><tr>

                                    <td valign='top' class='m_-3358751476074059544mcnTextContent' style='padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px'>

                                        <h1>Промокод Bosch NatureCool</h1>

                                        <p dir='ltr'>Здравствуйте, $fullname</p>
                                        <p dir='ltr'>Поздравляем с успешным прохождением игры «Следуй за Кроликом»!</p>
                                        <p dir='ltr'>Вы получаете промокод на скидку 5% на покупку холодильника Bosch <strong>Nature</strong>Сool.</p>
                                            <br>
                                                 <p dir='ltr' style='text-align:center;'>Ваш промокод: <strong>NC080917</strong></p>
                                            <br>
                                            <p dir='ltr'>Вы также можете воспользоваться промокодом при заказе холодильника Bosch <strong>Nature</strong>Cool в <a href='https://www.sulpak.kz/Stocks/Action/1811/novaya_linejka_holodilnikov_bosch_naturecool' target='_blank'>интернет-магазине <img src='http://naturecool.kz/assets/images/logo-sulpak_290bc11e2ca49f1bd717c4e618df9f42.png' alt='sulpak' style='width: 70px;vertical-align:top;'></a> и <a target='_blank'href='https://www.technodom.kz/naturecool'><img src='http://naturecool.kz/assets/images/technodom_logo_abf935a9742b37d4aa2b6063b3775519.png' alt='технодом' style='width: 110px;vertical-align:middle;'></a>. Для получения скидки необходимо ввести промокод на этапе оформления заказа. Промокод действителен по 30.09.2017.</p>
                                            <p dir='ltr' style='text-align:center'><span style='font-size:12px'>Оставайтесь с нами и следите за обновлениями&nbsp;на сайте <a href='http://www.naturecool.kz' target='_blank' >www.naturecool.kz</a>.</span></p>
                                        </td>
                                    </tr>
                                </tbody></table>



                            </td>
                        </tr>
                    </tbody>
                </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnButtonBlock' style='min-width:100%'>
                <tbody class='m_-3358751476074059544mcnButtonBlockOuter'>
                    <tr>
                        <td style='padding-top:0;padding-right:18px;padding-bottom:18px;padding-left:18px' valign='top' align='center' class='m_-3358751476074059544mcnButtonBlockInner'>
                            <table border='0' cellpadding='0' cellspacing='0' class='m_-3358751476074059544mcnButtonContentContainer' style='border-collapse:separate!important;border-top-left-radius:5px;border-top-right-radius:5px;border-bottom-right-radius:5px;border-bottom-left-radius:5px;background-color:#7abc31'>
                                <tbody>
                                    <tr>
                                        <td align='center' valign='middle' class='m_-3358751476074059544mcnButtonContent' style='font-family:Arial;font-size:16px;padding:15px'>
                                            <a class='m_-3358751476074059544mcnButton' title='Найти магазин' href='https://naturecool.kz' style='font-weight:bold;letter-spacing:normal;line-height:100%;text-align:center;text-decoration:none;color:#ffffff' target='_blank' >Перейти на сайт</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnTextBlock' style='min-width:100%'>
            <tbody class='m_-3358751476074059544mcnTextBlockOuter'>
                <tr>
                    <td valign='top' class='m_-3358751476074059544mcnTextBlockInner' style='padding-top:9px'>



                        <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%;min-width:100%' width='100%' class='m_-3358751476074059544mcnTextContentContainer'>
                            <tbody><tr>

                                <td valign='top' class='m_-3358751476074059544mcnTextContent' style='padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px'>

                                    <h1><span style='font-family:arial,helvetica neue,helvetica,sans-serif'><span style='font-size:12px'>С уважением, Bosch</span></span></h1>

                                </td>
                            </tr>
                        </tbody></table>



                    </td>
                </tr>
            </tbody>
        </table></td>
    </tr>
    <tr>
        <td valign='top' id='m_-3358751476074059544templateFooter'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnFollowBlock' style='min-width:100%'>
            <tbody class='m_-3358751476074059544mcnFollowBlockOuter'>
                <tr>
                    <td align='center' valign='top' style='padding:9px' class='m_-3358751476074059544mcnFollowBlockInner'>
                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnFollowContentContainer' style='min-width:100%'>
                            <tbody><tr>
                                <td align='center' style='padding-left:9px;padding-right:9px'>
                                    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='min-width:100%' class='m_-3358751476074059544mcnFollowContent'>
                                        <tbody><tr>
                                            <td align='center' valign='top' style='padding-top:9px;padding-right:9px;padding-left:9px'>
                                                <table align='center' border='0' cellpadding='0' cellspacing='0'>
                                                    <tbody><tr>
                                                        <td align='center' valign='top'>





                                                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='display:inline'>
                                                                <tbody><tr>
                                                                    <td valign='top' style='padding-right:10px;padding-bottom:9px' class='m_-3358751476074059544mcnFollowContentItemContainer'>
                                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnFollowContentItem'>
                                                                            <tbody><tr>
                                                                                <td align='left' valign='middle' style='padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px'>
                                                                                    <table align='left' border='0' cellpadding='0' cellspacing='0' width=''>
                                                                                        <tbody><tr>

                                                                                            <td align='center' valign='middle' width='24' class='m_-3358751476074059544mcnFollowIconContent'>
                                                                                                <a href='https://www.facebook.com/BoschHomeKZ' target='_blank'><img src='https://ci5.googleusercontent.com/proxy/THEfQ-zOr2AaMLVp_TKYp66Poy4XIPQHLLPvp3JqaDTShBZ9oZafDmhUm7hfcJbSG9vWeV4d9Esrao80PBgUGiMiifS3Dl-CqVUBIY1Qj6oJicgM-Vrdv4BVqtr98zDVKOE=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png' style='display:block' height='24' width='24' class='CToWUd'></a>
                                                                                            </td>


                                                                                        </tr>
                                                                                    </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                    </td>
                                                                </tr>
                                                            </tbody></table>






                                                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='display:inline'>
                                                                <tbody><tr>
                                                                    <td valign='top' style='padding-right:10px;padding-bottom:9px' class='m_-3358751476074059544mcnFollowContentItemContainer'>
                                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnFollowContentItem'>
                                                                            <tbody><tr>
                                                                                <td align='left' valign='middle' style='padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px'>
                                                                                    <table align='left' border='0' cellpadding='0' cellspacing='0' width=''>
                                                                                        <tbody><tr>

                                                                                            <td align='center' valign='middle' width='24' class='m_-3358751476074059544mcnFollowIconContent'>
                                                                                                <a href='http://www.naturecool.kz/' target='_blank' ><img src='https://ci4.googleusercontent.com/proxy/XGenZrmUcdiVbGsrNYCRgHNYNfacIjhuLbFebzTFb_97r7SkYv7ogFxlEPf2hCuN5Kk9p8x-3_ifj6nSGicK0tVj4vtdS4rtGr6b05PDLfKpkMu-ZN-ze73H72HWQg=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-48.png' style='display:block' height='24' width='24' class='CToWUd'></a>
                                                                                            </td>


                                                                                        </tr>
                                                                                    </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                    </td>
                                                                </tr>
                                                            </tbody></table>






                                                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='display:inline'>
                                                                <tbody><tr>
                                                                    <td valign='top' style='padding-right:10px;padding-bottom:9px' class='m_-3358751476074059544mcnFollowContentItemContainer'>
                                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnFollowContentItem'>
                                                                            <tbody><tr>
                                                                                <td align='left' valign='middle' style='padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px'>
                                                                                    <table align='left' border='0' cellpadding='0' cellspacing='0' width=''>
                                                                                        <tbody><tr>

                                                                                            <td align='center' valign='middle' width='24' class='m_-3358751476074059544mcnFollowIconContent'>
                                                                                                <a href='https://vk.com/boschhomekazakhstan' target='_blank' ><img src='https://ci5.googleusercontent.com/proxy/nb6PbvXX9ugF7YseTh9QeX-lf91mxa09flbPm9IcBjIEtJ0TOAr04SSga1w1DTWB5wPx1mPmAPt8OyOEMUPdqXU_I7XGep69bZZA1UdzKYFWyzwtqmDTRpeyxqw=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-vk-48.png' style='display:block' height='24' width='24' class='CToWUd'></a>
                                                                                            </td>


                                                                                        </tr>
                                                                                    </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                    </td>
                                                                </tr>
                                                            </tbody></table>






                                                            <table align='left' border='0' cellpadding='0' cellspacing='0' style='display:inline'>
                                                                <tbody><tr>
                                                                    <td valign='top' style='padding-right:0;padding-bottom:9px' class='m_-3358751476074059544mcnFollowContentItemContainer'>
                                                                        <table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnFollowContentItem'>
                                                                            <tbody><tr>
                                                                                <td align='left' valign='middle' style='padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px'>
                                                                                    <table align='left' border='0' cellpadding='0' cellspacing='0' width=''>
                                                                                        <tbody><tr>

                                                                                            <td align='center' valign='middle' width='24' class='m_-3358751476074059544mcnFollowIconContent'>
                                                                                                <a href='mailto:support@naturecool.kz' target='_blank'><img src='https://ci5.googleusercontent.com/proxy/7qzpyVB6GsqI5yyevmVjGxT5eaoFOIhp5YUoxjUOyOGmq4G4GtelUrXlriffPbBB6IELkO_hU8xqN33CegBw2Edkn6SMFI76PRbVjeNB0UwdjNg4r3Y9r1ubmWo1oNsjk2vqbL5O5ZZD=s0-d-e1-ft#https://cdn-images.mailchimp.com/icons/social-block-v2/color-forwardtofriend-48.png' style='display:block' height='24' width='24' class='CToWUd'></a>
                                                                                            </td>


                                                                                        </tr>
                                                                                    </tbody></table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                    </td>
                                                                </tr>
                                                            </tbody></table>




                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </td>
                            </tr>
                        </tbody></table>

                    </td>
                </tr>
            </tbody>
        </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnDividerBlock' style='min-width:100%'>
        <tbody class='m_-3358751476074059544mcnDividerBlockOuter'>
            <tr>
                <td class='m_-3358751476074059544mcnDividerBlockInner' style='min-width:100%;padding:10px 18px 25px'>
                    <table class='m_-3358751476074059544mcnDividerContent' border='0' cellpadding='0' cellspacing='0' width='100%' style='min-width:100%;border-top:2px solid #eeeeee'>
                        <tbody><tr>
                            <td>
                                <span></span>
                            </td>
                        </tr>
                    </tbody></table>

                </td>
            </tr>
        </tbody>
    </table><table border='0' cellpadding='0' cellspacing='0' width='100%' class='m_-3358751476074059544mcnTextBlock' style='min-width:100%'>
    <tbody class='m_-3358751476074059544mcnTextBlockOuter'>
        <tr>
            <td valign='top' class='m_-3358751476074059544mcnTextBlockInner' style='padding-top:9px'>



                <table align='left' border='0' cellpadding='0' cellspacing='0' style='max-width:100%;min-width:100%' width='100%' class='m_-3358751476074059544mcnTextContentContainer'>
                    <tbody><tr>

                        <td valign='top' class='m_-3358751476074059544mcnTextContent' style='padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px'>

                            <em>2017 © ТОО 'BSH Home Appliances (БСХ Хоум Аплайансэс)'<em>. Все права защищены</em><br>
                            <br>
                            <strong>При регистрации вы указали адрес электронной почты:</strong><br>
                            <a href='$email' target='_blank'>$email</a><br>
                            <br>
                        </td>
                    </tr>
                </tbody></table>
                

                
            </td>
        </tr>
    </tbody>
</table></td>
</tr>
</tbody></table>
</body>
</html>";
		// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = "To: $email";
$headers[] = "From:<bosсh@naturecool.kz>";
$headers[] = "Cc: bosсh@naturecool.kz";
$headers[] = "Bcc: bosсh@naturecool.kz";

mail($to, $subject, $message, implode("\r\n", $headers));
/*Отправка на email*/

} else {
  echo "Ошибка сохранения<br/>";

  $result->errorInfo();
}


} catch (PDOException $e) {
	
    echo 'Подключение не удалось: ' . $e->getMessage();

}
