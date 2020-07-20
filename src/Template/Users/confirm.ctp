<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?=$this->Html->css('confirm.css')?>

<div class = "large-4 medium-8 columns content" style = "margin-top: 40px;">
	<fieldset>
		<legend class = "fundoInvisivel fonte"><?=__('Cadastro Concluído')?></legend>
		<p>
			<?=__('Seu cadastro foi concluído com sucesso!<br>
				Informações ou dúvidas podem ser esclarecidas por meio do link direto de nosso WhatsApp no canto direito inferior da tela')?>
		</p>
		<img src="\cakePHP\webroot\img\confirm.png" style="margin-left: 30px; height: 200px;">
	</fieldset>
</div>

<!-- Start Suiteshare -->
<script>
	(function (s,u,i,t,e) {
		var share = s.createElement('script');
		share.async = true;
		share.id = 'suiteshare';
		share.src = 'https://static.suiteshare.com/widgets.js';
		share.setAttribute('init',i);
		s.head.appendChild(share);
	})( document, 'script', 'd630fbb033d21053a27290e34d632a37e7062bb7');
</script>