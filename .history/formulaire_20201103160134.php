<?php
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// 寄件人。出于安全原因，越来越多的主机要求它是您的主机名/域名上的地址。
// 例如，如果您将此脚本放在“ test-site.com”站点上，则将电子邮件@ test-site.com作为发件人（例如contact@test-site.com）
//如果不更改此变量，则可能不会收到表格。
$email_expediteur = '1097457668@qq.com';
$nom_expediteur = 'Contact claire.com';
 
//收件人是您的电子邮件地址。要同时发送给多个人，请用分号隔开
$destinataire = '1097457668@qq.com';
 
//复制？（将副本发送给访客）
$copie = 'oui';
 
// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
//表单的操作（如果您的页面的URL中包含参数）
//如果此页面是index.php？page =联系人，则将index.php？page =联系人
//否则，留空
$form_action = '';
 
// Messages de confirmation du mail邮件确认消息
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
 
// Message d'erreur du formulaire表单错误消息
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";
 
/*
	********************************************************************************************
	FIN DE LA CONFIGURATION 配置结束
	********************************************************************************************
*/
 
/*
 * cette fonction sert à nettoyer et enregistrer un texte 此功能用于清理和保存文本
 */
function Rec($text)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}
 
	$text = nl2br($text);//nl2br() 函数在字符串中的每个新行（\n）之前插入 HTML 换行符（<br> 或 <br />）。
	return $text;
};
 
/*
 * Cette fonction sert à vérifier la syntaxe d'un email 此功能用于检查电子邮件的语法
 */
function IsEmail($email)
{
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}
 
// formulaire envoyé, on récupère tous les champs.发送表格，我们得到所有字段
$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
 
// On va vérifier les variables et l'email ...我们将检查变量和电子邮件...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré如果电子邮件不正确，则该电子邮件为空!正确的话等于输入的电子邮件
$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin 如有必要，可在错误的情况下填写表格
 
if (isset($_POST['envoi']))
{
	if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
	{
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'From:'.$nom_expediteur.' <'.$email_expediteur.'>' . "\r\n" .
				'Reply-To:'.$email. "\r\n" .
				'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
				'Content-Disposition: inline'. "\r\n" .
				'Content-Transfer-Encoding: 7bit'." \r\n" .
				'X-Mailer:PHP/'.phpversion();
 
		// envoyer une copie au visiteur ?将副本发送给访问者？
		if ($copie == 'oui')
		{
			$cible = $destinataire.';'.$email;
		}
		else
		{
			$cible = $destinataire;
		};
 
		// Remplacement de certains caractères spéciaux 替换一些特殊字符
		$caracteres_speciaux     = array('&#039;', '&#8217;', '&quot;', '<br>', '<br />', '&lt;', '&gt;', '&amp;', '…',   '&rsquo;', '&lsquo;');
		$caracteres_remplacement = array("'",      "'",        '"',      '',    '',       '<',    '>',    '&',     '...', '>>',      '<<'     );
 
		$objet = html_entity_decode($objet);
		$objet = str_replace($caracteres_speciaux, $caracteres_remplacement, $objet);
 
		$message = html_entity_decode($message);
		$message = str_replace($caracteres_speciaux, $caracteres_remplacement, $message);
 
		// Envoi du mail 发送电子邮件
		$cible = str_replace(',', ';', $cible); // antibug : j'ai vu plein de forums où ce script était mis, les gens ne font pas attention à ce détail parfois我看到了很多放置此脚本的论坛，人们有时并不关注此细节  
		$ num_emails = 0 ; 
		$num_emails = 0;
		$tmp = explode(';', $cible);
		foreach($tmp as $email_destinataire)
		{
			if (mail($email_destinataire, $objet, $message, $headers))
				$num_emails++;
		}
 
		if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
		{
			echo '<p>'.$message_envoye.'</p>';
		}
		else
		{
			echo '<p>'.$message_non_envoye.'</p>';
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...3个（或多个）变量之一为空...
		echo '<p>'.$message_formulaire_invalide.'</p>';
		$err_formulaire = true;
	};
}; // fin du if (!isset($_POST['envoi']))   if (!isset($_POST['envoi']))的结尾
 
if (($err_formulaire) || (!isset($_POST['envoi'])))
{
	// afficher le formulaire 显示表格  这里是为了一旦有表格向
	echo '
	<form id="contact" method="post" action="'.$form_action.'">
	<fieldset><legend>Vos coordonnées</legend>
		<p><label for="nom">Nom :</label><input type="text" id="nom" name="nom" value="'.stripslashes($nom).'" /></p>
		<p><label for="email">Email :</label><input type="text" id="email" name="email" value="'.stripslashes($email).'" /></p>
	</fieldset>
 
	<fieldset><legend>Votre message :</legend>
		<p><label for="objet">Objet :</label><input type="text" id="objet" name="objet" value="'.stripslashes($objet).'" /></p>
		<p><label for="message">Message :</label><textarea id="message" name="message" cols="30" rows="8">'.stripslashes($message).'</textarea></p>
	</fieldset>
 
	<div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer le formulaire !" /></div>
	</form>';
};
?>