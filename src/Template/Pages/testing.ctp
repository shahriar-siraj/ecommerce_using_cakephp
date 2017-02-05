
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
                        <td bgcolor="#ffffff" style="padding: 25px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                     <td style="padding: 20px 0 20px 0; color: #000000; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center; font-weight: normal; margin: 0px auto;" align="center" colspan="5">
                                        <h1 style="margin-bottom: 20px; padding-bottom: 20px; text-align: center; margin: 0px auto;">Contractors</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold;" align="left" colspan="1">
                                        <h2 style="margin-top: 5px; font-weight: 100;">Total</h2>
                                        <?= $count_inductions; ?><br />
                                    </td>
                                    <td style="padding: 0px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold;" align="left" colspan="2">
                                        <h2 style="margin-top: 5px; font-weight: 100;">Past 7 days</h2>
                                        <?= $count_inductions_past_7_days; ?><br />
                                    </td>
                                    <td style="padding: 0px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold;" align="left" colspan="2">
                                        <h2 style="margin-top: 5px; font-weight: 100;">Yesterday</h2>
                                        <?= $count_inductions_since_yesterday; ?><br />
                                    </td>
                                </tr>
                                <tr>
                                     <td style="padding: 20px 0 20px 0; color: #000000; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center; font-weight: normal; margin: 0px auto;" align="center" colspan="5">
                                        <h1 style="margin-bottom: 20px; padding-bottom: 20px; text-align: center; margin: 0px auto;">Contracts</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold;" align="left" colspan="1">
                                        <h2 style="margin-top: 5px; font-weight: 100;">Total</h2>
                                        <?= $count_leads; ?><br />
                                    </td>
                                    <td style="padding: 0px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold;" align="left" colspan="2">
                                        <h2 style="margin-top: 5px; font-weight: 100;">Past 7 days</h2>
                                        <?= $count_leads_past_7_days; ?><br />
                                    </td>
                                    <td style="padding: 0px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold;" align="left" colspan="2">
                                        <h2 style="margin-top: 5px; font-weight: 100;">Yesterday</h2>
                                        <?= $count_leads_past_yesterday; ?><br />
                                    </td>
                                </tr>
                                <tr>
                                     <td style="padding: 20px 0 20px 0; color: #000000; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center; font-weight: normal; margin: 0px auto;" align="center" colspan="5">
                                        <h1 style="margin-bottom: 20px; padding-bottom: 20px; text-align: center; margin: 0px auto;">Unique Visitors</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold;" align="left" colspan="1">
                                        <h2 style="margin-top: 5px; font-weight: 100;">Last 30 days</h2>
                                        <?= $this->Number->format($statistics_month_ago->getTotalsForAllResults()['ga:visitors']) ?><br />
                                    </td>
                                    <td style="padding: 0px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold;" align="left" colspan="2">
                                        <h2 style="margin-top: 5px; font-weight: 100;">Previous 30 days</h2>
                                         <?= $this->Number->format($statistics_previous_30->getTotalsForAllResults()['ga:visitors']) ?><br />
                                    </td>
                                </tr>
                                <tr>
                                     <td style="padding: 20px 0 20px 0; color: #000000; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center; font-weight: normal; margin: 0px auto;" align="center" colspan="5">
                                        <h1 style="margin-bottom: 20px; padding-bottom: 20px; text-align: center; margin: 0px auto;">Total Visits</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 0px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold;" align="left" colspan="1">
                                        <h2 style="margin-top: 5px; font-weight: 100;">Last 30 days</h2>
                                        <?= $this->Number->format($statistics_month_ago->getTotalsForAllResults()['ga:visits']) ?><br />
                                    </td>
                                    <td style="padding: 0px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 13px; line-height: 20px; text-align: left; font-weight: bold;" align="left" colspan="2">
                                        <h2 style="margin-top: 5px; font-weight: 100;">Previous 30 days</h2>
                                        <?= $this->Number->format($statistics_previous_30->getTotalsForAllResults()['ga:visits']) ?><br />
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