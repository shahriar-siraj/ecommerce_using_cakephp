<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>IN A BIT Email</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">	
		<tr>
			<td style="padding: 10px 0 30px 0;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="570">
					<tr>
						<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td align="center" bgcolor="#000000" style="padding-top: 20px; padding-bottom: 20px;">
                                        <?= $this->Html->image('website/in-a-bit-logo.png', [
                                            'fullBase' => true,
                                            'width'  => '196',
                                            'height' => '82',
                                            'alt' => 'IN A BIT Header',
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
									<td style="padding: 55px 0 30px 0; color: #666666; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px; text-align: center; font-weight: bold; margin: 0px auto;" align="center">
										You have a New Contact from your website.<br /><br />

										  + + + + + + + + + + + + +<br /><br />

										  Name : <?php echo $name; ?><br />
										  Phone : <?php echo $phone; ?> <br />
										  Email : <?php echo $email; ?> <br />
										  Enquiry : <br /><?php echo $message; ?><br /><br />

										  + + + + + + + + + + + + +<br /><br />

										  This is an automatically generated email from the website.
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