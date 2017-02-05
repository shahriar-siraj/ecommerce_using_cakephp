<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EveryTrade</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;" bgcolor="#f2f2f2">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="570">
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="left">
                                        <?= $this->Html->image('everytrade_email_head.jpg', [
                                            'fullBase' => true,
                                            'width'  => '570',
                                            'height' => '294',
                                            'alt' => 'EveryTrade Header',
                                            'url' => ['controller' => 'pages', 'action' => 'home', '_full' => true]
                                        ]) ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;" align="center">
                                        <?= $this->Html->image('thank_you_interest.jpg', [
                                             'fullBase' => true,
                                            'width'  => '267',
                                            'height' => '180',
                                            'alt' => 'Every Trade',
                                            'style' => 'display: block; text-align: center; margin: 0px auto;'
                                        ]) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 55px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center; font-weight: bold; margin: 0px auto;" align="center">
                                        The following comments has been posted. This comment needs your approval to be visible on the article. <br /><br />

                                        <strong>Full Name :</strong> <br />
                                        <?= $full_name; ?><br /><br />

                                        <strong>Email :</strong> <br />
                                        <?= $email; ?><br /><br />

                                        <strong>Website :</strong> <br />
                                        <?= $website; ?><br /><br />

                                        <strong>Article title :</strong> <br />
                                        <?= $article_title; ?><br /><br />

                                        <strong>Comment :</strong> <br />
                                        <?= $content; ?><br /><br />

                                        <p style="background: #00ccff;border-width: 1px 1px 2px 5px;border-style: solid;border-color: #00ccff;border-radius: 3px;background-color: #00ccff;padding: 10px !important;border-left-color: #00ccff;">
                                            <?= $this->Html->link(
                                                'Approve Comment',
                                                ['_full' => true, 'controller' => 'blog', 'action' => 'validation_comment', 'validation_key' => $validation_key],
                                                ['style' => 'text-decoration:none;color:#fff;padding:0 5px;text-transform:uppercase;']
                                            ) ?>
                                        </p>

                                        <br />Thank you and have a lovely day,
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#000000" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="100%" align="center">
                                        Phone. 1300 180 088 <br />
                                        Office 12/116-118 McCredie Rd, Guildford West NSW 2161 <br /><br />
                                        <a href="http://www.everytradelabourhire.com.au" style="color: #ffffff;"><font color="#ffffff">http://www.everytradelabourhire.com.au</font></a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>