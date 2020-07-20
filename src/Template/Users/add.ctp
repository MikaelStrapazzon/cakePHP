<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?=$this->Html->css('add.css')?>

<div class = "form large-4 medium-8 columns content" style = "margin-top: 40px;">
	<?=$this->Form->create($user)?>
	<fieldset>
		<legend class="fundoInvisivel"><?=__('Cadastro de Pessoa')?></legend>
		<?php
			$this->Form->setTemplates(['dateWidget' => '{{day}}{{month}}{{year}}']);

			echo $this->Form->control('name', ['label' => 'Nome']);
			echo $this->Form->control('email', ['error' => 'Formato de email inválido']);
			echo $this->Form->control('rg', ['label' => 'Registro Geral (RG)']);
			echo $this->Form->control('cpf', ['label' => 'CPF']);
			echo $this->Form->control('data_birth', ['label' => 'Data de Nascimento', 'minYear' => 1910, 'maxYear' => 2020, 'error' => "Data inválida"]);
			echo $this->Form->control('telephone', ['label' => 'Telefone']);
		?>
	</fieldset>
	<?=$this->Form->button(__('Cadastrar'))?>
	<?=$this->Form->end()?>
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
<!-- End Suiteshare -->